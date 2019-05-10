<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VillageRequestsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VillageRequestsTable Test Case
 */
class VillageRequestsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VillageRequestsTable
     */
    public $VillageRequests;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.VillageRequests',
        'app.Villages',
        'app.Technicians',
        'app.Managers',
        'app.OmSchedules',
        'app.AccountingEntries',
        'app.VillageRequestProducts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('VillageRequests') ? [] : ['className' => VillageRequestsTable::class];
        $this->VillageRequests = TableRegistry::getTableLocator()->get('VillageRequests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VillageRequests);

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
