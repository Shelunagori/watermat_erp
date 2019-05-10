<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SiteSelectionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SiteSelectionsTable Test Case
 */
class SiteSelectionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SiteSelectionsTable
     */
    public $SiteSelections;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SiteSelections',
        'app.VillageWorks',
        'app.GramPanchayats',
        'app.MlaConstituencies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SiteSelections') ? [] : ['className' => SiteSelectionsTable::class];
        $this->SiteSelections = TableRegistry::getTableLocator()->get('SiteSelections', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SiteSelections);

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
