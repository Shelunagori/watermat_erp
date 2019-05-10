<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VillageWorksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VillageWorksTable Test Case
 */
class VillageWorksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VillageWorksTable
     */
    public $VillageWorks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.VillageWorks',
        'app.Villages',
        'app.WorkSchedules',
        'app.Civils',
        'app.Commissionings',
        'app.GlowSignBoards',
        'app.Installations',
        'app.PlantReceives',
        'app.Shelters',
        'app.SiteSelections',
        'app.WorkScheduleRowForms',
        'app.WorkVerifications'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('VillageWorks') ? [] : ['className' => VillageWorksTable::class];
        $this->VillageWorks = TableRegistry::getTableLocator()->get('VillageWorks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VillageWorks);

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
