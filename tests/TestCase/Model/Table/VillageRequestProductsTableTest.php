<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VillageRequestProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VillageRequestProductsTable Test Case
 */
class VillageRequestProductsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VillageRequestProductsTable
     */
    public $VillageRequestProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.VillageRequestProducts',
        'app.VillageRequests',
        'app.Products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('VillageRequestProducts') ? [] : ['className' => VillageRequestProductsTable::class];
        $this->VillageRequestProducts = TableRegistry::getTableLocator()->get('VillageRequestProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VillageRequestProducts);

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
