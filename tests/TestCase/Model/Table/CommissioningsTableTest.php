<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommissioningsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommissioningsTable Test Case
 */
class CommissioningsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CommissioningsTable
     */
    public $Commissionings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Commissionings',
        'app.VillageWorks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Commissionings') ? [] : ['className' => CommissioningsTable::class];
        $this->Commissionings = TableRegistry::getTableLocator()->get('Commissionings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Commissionings);

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
