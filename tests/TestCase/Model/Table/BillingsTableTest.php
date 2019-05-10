<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BillingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BillingsTable Test Case
 */
class BillingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BillingsTable
     */
    public $Billings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Billings',
        'app.VillageWorks',
        'app.BillingQuestions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Billings') ? [] : ['className' => BillingsTable::class];
        $this->Billings = TableRegistry::getTableLocator()->get('Billings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Billings);

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
