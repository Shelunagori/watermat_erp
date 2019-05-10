<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OperatorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OperatorsTable Test Case
 */
class OperatorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OperatorsTable
     */
    public $Operators;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Operators',
        'app.Villages',
        'app.IncentivePlans'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Operators') ? [] : ['className' => OperatorsTable::class];
        $this->Operators = TableRegistry::getTableLocator()->get('Operators', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Operators);

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
