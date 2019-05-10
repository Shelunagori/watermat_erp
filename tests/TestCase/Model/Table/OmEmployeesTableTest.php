<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OmEmployeesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OmEmployeesTable Test Case
 */
class OmEmployeesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OmEmployeesTable
     */
    public $OmEmployees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OmEmployees',
        'app.Villages',
        'app.Technicians',
        'app.Managers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OmEmployees') ? [] : ['className' => OmEmployeesTable::class];
        $this->OmEmployees = TableRegistry::getTableLocator()->get('OmEmployees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OmEmployees);

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
