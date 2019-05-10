<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MlaConstituenciesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MlaConstituenciesTable Test Case
 */
class MlaConstituenciesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MlaConstituenciesTable
     */
    public $MlaConstituencies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MlaConstituencies',
        'app.Projects',
        'app.Divisions',
        'app.SiteSelections'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MlaConstituencies') ? [] : ['className' => MlaConstituenciesTable::class];
        $this->MlaConstituencies = TableRegistry::getTableLocator()->get('MlaConstituencies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MlaConstituencies);

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
