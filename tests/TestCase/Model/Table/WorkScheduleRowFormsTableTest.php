<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkScheduleRowFormsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkScheduleRowFormsTable Test Case
 */
class WorkScheduleRowFormsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkScheduleRowFormsTable
     */
    public $WorkScheduleRowForms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.WorkScheduleRowForms',
        'app.VillageWorks',
        'app.WorkScheduleRows'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('WorkScheduleRowForms') ? [] : ['className' => WorkScheduleRowFormsTable::class];
        $this->WorkScheduleRowForms = TableRegistry::getTableLocator()->get('WorkScheduleRowForms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WorkScheduleRowForms);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
