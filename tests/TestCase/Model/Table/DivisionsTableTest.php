<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DivisionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DivisionsTable Test Case
 */
class DivisionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DivisionsTable
     */
    public $Divisions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Divisions',
        'app.Projects',
        'app.Districts',
        'app.Blocks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Divisions') ? [] : ['className' => DivisionsTable::class];
        $this->Divisions = TableRegistry::getTableLocator()->get('Divisions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Divisions);

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
