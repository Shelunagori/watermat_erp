<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GlowSignBoards Controller
 *
 * @property \App\Model\Table\GlowSignBoardsTable $GlowSignBoards
 *
 * @method \App\Model\Entity\GlowSignBoard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GlowSignBoardsController extends AppController
{
    

    /**
     * View method
     *
     * @param string|null $id Glow Sign Board id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function glowReport($village_work_id,$work_schedule_id)
    {
        $glow = $this->GlowSignBoards->find()->where(['village_work_id'=>$village_work_id])->first();
        $this->set('glow', $glow);
    }

    
}
