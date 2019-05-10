<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SheltersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SheltersTable Test Case
 */
class SheltersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SheltersTable
     */
    public $Shelters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Shelters',
        'app.VillageWorks',
        'app.Verifies',
        'app.CreateLogins',
        'app.EditLogins'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Shelters') ? [] : ['className' => SheltersTable::class];
        $this->Shelters = TableRegistry::getTableLocator()->get('Shelters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Shelters);

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
