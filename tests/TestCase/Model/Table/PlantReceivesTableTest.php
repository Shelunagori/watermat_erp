<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlantReceivesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlantReceivesTable Test Case
 */
class PlantReceivesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PlantReceivesTable
     */
    public $PlantReceives;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PlantReceives',
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
        $config = TableRegistry::getTableLocator()->exists('PlantReceives') ? [] : ['className' => PlantReceivesTable::class];
        $this->PlantReceives = TableRegistry::getTableLocator()->get('PlantReceives', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PlantReceives);

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
