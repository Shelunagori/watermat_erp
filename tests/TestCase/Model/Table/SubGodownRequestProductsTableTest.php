<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubGodownRequestProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubGodownRequestProductsTable Test Case
 */
class SubGodownRequestProductsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubGodownRequestProductsTable
     */
    public $SubGodownRequestProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SubGodownRequestProducts',
        'app.SubGodownRequests',
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
        $config = TableRegistry::getTableLocator()->exists('SubGodownRequestProducts') ? [] : ['className' => SubGodownRequestProductsTable::class];
        $this->SubGodownRequestProducts = TableRegistry::getTableLocator()->get('SubGodownRequestProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SubGodownRequestProducts);

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
