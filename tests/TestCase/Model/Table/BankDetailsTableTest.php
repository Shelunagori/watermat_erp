<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BankDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BankDetailsTable Test Case
 */
class BankDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BankDetailsTable
     */
    public $BankDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.BankDetails',
        'app.Employees',
        'app.Vendors',
        'app.Banks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BankDetails') ? [] : ['className' => BankDetailsTable::class];
        $this->BankDetails = TableRegistry::getTableLocator()->get('BankDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BankDetails);

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

    /**
     * Test beforeMarshal method
     *
     * @return void
     */
    public function testBeforeMarshal()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test beforeSave method
     *
     * @return void
     */
    public function testBeforeSave()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
