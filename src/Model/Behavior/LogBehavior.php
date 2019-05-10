<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;

use Cake\Event\Event;
use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Http\Session;
use Cake\ORM\TableRegistry;

/**
 * Log behavior
 */
class LogBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function beforeFind(Event $event, $query, ArrayObject $options, $primary)
    {
        $schema = $this->getTable()->getAlias();
        $column = $this->getTable()->getSchema()->getColumn('is_deleted');
        if(is_array($column))
            $query->where([$schema.'.is_deleted'=>0]);

        $column2 = $this->getTable()->getSchema()->getColumn('project_id');
        if(is_array($column2))
        {
            $project_id = (new Session())->read('project_id');
            if($project_id)
                $query->where([$schema.'.project_id'=>$project_id]);
        }
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
    	foreach ($data as $field => $value) 
    	{
    		$schema = $this->getTable()->getSchema()->getColumn($field);

    		if($schema['type'] == 'date')
    			$data[$field] ? $data[$field] = date('Y-m-d',strtotime($data[$field])) : '';
    		
    		if($field == 'name')
    			$data['name'] ? $data['name'] = ucwords($data['name']) : '';
    	}
    }

    public function beforeSave(Event $event, $entity, ArrayObject $options)
    {
    	//maintain Logs
	    if(!$entity->isNew())
	    {
            $data = [];
	    	$updated_fields = $entity->getDirty();
	    	foreach ($updated_fields as $key => $updated_field) {
                if($updated_field != 'edited_by' && $updated_field != 'created_on' && $entity->edited_by && !is_array($entity->$updated_field))
    	    	{
                    $old_value = (String)$entity->getOriginal($updated_field);
                    $new_value = (String)$entity->$updated_field;

                    if($old_value != $new_value)
                    {
                        $data[$key]['model'] = $schema = $this->getTable()->getAlias();
                        $data[$key]['updated_field'] = $updated_field;
                        $data[$key]['old_value'] = $old_value;
                        $data[$key]['new_value'] = $new_value;
                        $data[$key]['created_by'] = $entity->edited_by;
                    }
                }
	    	}
    	    if(!empty($data))
            {
                $log = TableRegistry::getTableLocator()->get('Logs');
                $logs = $log->newEntities($data);
                $log->saveMany($logs);
            }
	    }

	    //maintain user
        $id = (new Session())->read('Auth.User.id');
        if($id)
        	$entity->isNew() ? $entity['created_by'] = $id : $entity['edited_by'] = $id;
    }
}
