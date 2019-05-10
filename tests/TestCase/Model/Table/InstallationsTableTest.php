<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstallationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstallationsTable Test Case
 */
class InstallationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InstallationsTable
     */
    public $Installations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Installations',
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
        $config = TableRegistry::getTableLocator()->exists('Installations') ? [] : ['className' => InstallationsTable::class];
        $this->Installations = TableRegistry::getTableLocator()->get('Installations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Installations);

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
