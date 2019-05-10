<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GramPanchayatsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GramPanchayatsTable Test Case
 */
class GramPanchayatsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GramPanchayatsTable
     */
    public $GramPanchayats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.GramPanchayats',
        'app.Divisions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('GramPanchayats') ? [] : ['className' => GramPanchayatsTable::class];
        $this->GramPanchayats = TableRegistry::getTableLocator()->get('GramPanchayats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GramPanchayats);

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

    /**
     * Test beforeMarshal method
     *
     * @return void
     */
    public function testBeforeMarshal()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test beforeSave method
     *
     * @return void
     */
    public function testBeforeSave()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
