<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DoVillagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DoVillagesTable Test Case
 */
class DoVillagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DoVillagesTable
     */
    public $DoVillages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DoVillages',
        'app.DepartmentOfficers',
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
        $config = TableRegistry::getTableLocator()->exists('DoVillages') ? [] : ['className' => DoVillagesTable::class];
        $this->DoVillages = TableRegistry::getTableLocator()->get('DoVillages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DoVillages);

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
     * Test beforeSave method
     *
     * @return void
     */
    public function testBeforeSave()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
