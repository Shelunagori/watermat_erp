<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CivilsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CivilsTable Test Case
 */
class CivilsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CivilsTable
     */
    public $Civils;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Civils'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Civils') ? [] : ['className' => CivilsTable::class];
        $this->Civils = TableRegistry::getTableLocator()->get('Civils', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Civils);

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
}
