<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OmScheduleFormsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OmScheduleFormsTable Test Case
 */
class OmScheduleFormsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OmScheduleFormsTable
     */
    public $OmScheduleForms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OmScheduleForms',
        'app.OmSchedules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OmScheduleForms') ? [] : ['className' => OmScheduleFormsTable::class];
        $this->OmScheduleForms = TableRegistry::getTableLocator()->get('OmScheduleForms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OmScheduleForms);

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
