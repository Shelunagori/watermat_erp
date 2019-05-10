<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OmScheduleMastersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OmScheduleMastersTable Test Case
 */
class OmScheduleMastersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OmScheduleMastersTable
     */
    public $OmScheduleMasters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OmScheduleMasters',
        'app.Villages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OmScheduleMasters') ? [] : ['className' => OmScheduleMastersTable::class];
        $this->OmScheduleMasters = TableRegistry::getTableLocator()->get('OmScheduleMasters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OmScheduleMasters);

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
