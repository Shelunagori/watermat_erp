<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkScheduleRowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkScheduleRowsTable Test Case
 */
class WorkScheduleRowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkScheduleRowsTable
     */
    public $WorkScheduleRows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.WorkScheduleRows',
        'app.WorkSchedules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('WorkScheduleRows') ? [] : ['className' => WorkScheduleRowsTable::class];
        $this->WorkScheduleRows = TableRegistry::getTableLocator()->get('WorkScheduleRows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WorkScheduleRows);

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
