<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DoPostsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DoPostsTable Test Case
 */
class DoPostsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DoPostsTable
     */
    public $DoPosts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DoPosts',
        'app.DepartmentOfficers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DoPosts') ? [] : ['className' => DoPostsTable::class];
        $this->DoPosts = TableRegistry::getTableLocator()->get('DoPosts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DoPosts);

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
