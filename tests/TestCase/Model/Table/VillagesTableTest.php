<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VillagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VillagesTable Test Case
 */
class VillagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VillagesTable
     */
    public $Villages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Villages',
        'app.Projects',
        'app.Divisions',
        'app.DoVillages',
        'app.EmployeeVillages',
        'app.VendorVillages',
        'app.VillageWorks',
        'app.DoPosts',
        'app.ApiVersions',
        'app.States'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Villages') ? [] : ['className' => VillagesTable::class];
        $this->Villages = TableRegistry::getTableLocator()->get('Villages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Villages);

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
