<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VehicleMastersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VehicleMastersTable Test Case
 */
class VehicleMastersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VehicleMastersTable
     */
    public $VehicleMasters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.VehicleMasters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('VehicleMasters') ? [] : ['className' => VehicleMastersTable::class];
        $this->VehicleMasters = TableRegistry::getTableLocator()->get('VehicleMasters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VehicleMasters);

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
}
