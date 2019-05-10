<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OmSchedulesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OmSchedulesTable Test Case
 */
class OmSchedulesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OmSchedulesTable
     */
    public $OmSchedules;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OmSchedules',
        'app.Villages',
        'app.OmEmployees',
        'app.OmScheduleForms'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OmSchedules') ? [] : ['className' => OmSchedulesTable::class];
        $this->OmSchedules = TableRegistry::getTableLocator()->get('OmSchedules', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OmSchedules);

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
