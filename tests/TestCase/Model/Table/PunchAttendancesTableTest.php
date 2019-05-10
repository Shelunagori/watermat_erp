<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PunchAttendancesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PunchAttendancesTable Test Case
 */
class PunchAttendancesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PunchAttendancesTable
     */
    public $PunchAttendances;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PunchAttendances',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PunchAttendances') ? [] : ['className' => PunchAttendancesTable::class];
        $this->PunchAttendances = TableRegistry::getTableLocator()->get('PunchAttendances', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PunchAttendances);

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
