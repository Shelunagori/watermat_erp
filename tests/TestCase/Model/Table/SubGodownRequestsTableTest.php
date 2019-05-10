<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubGodownRequestsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubGodownRequestsTable Test Case
 */
class SubGodownRequestsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubGodownRequestsTable
     */
    public $SubGodownRequests;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SubGodownRequests',
        'app.Godowns',
        'app.AccountingEntries',
        'app.SubGodownRequestProducts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SubGodownRequests') ? [] : ['className' => SubGodownRequestsTable::class];
        $this->SubGodownRequests = TableRegistry::getTableLocator()->get('SubGodownRequests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SubGodownRequests);

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
