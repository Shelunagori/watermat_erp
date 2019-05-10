<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VendorVillagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VendorVillagesTable Test Case
 */
class VendorVillagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VendorVillagesTable
     */
    public $VendorVillages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.VendorVillages',
        'app.Vendors',
        'app.Villages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('VendorVillages') ? [] : ['className' => VendorVillagesTable::class];
        $this->VendorVillages = TableRegistry::getTableLocator()->get('VendorVillages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VendorVillages);

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
