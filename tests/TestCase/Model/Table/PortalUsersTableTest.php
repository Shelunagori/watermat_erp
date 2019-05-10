<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PortalUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PortalUsersTable Test Case
 */
class PortalUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PortalUsersTable
     */
    public $PortalUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PortalUsers',
        'app.Portals',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PortalUsers') ? [] : ['className' => PortalUsersTable::class];
        $this->PortalUsers = TableRegistry::getTableLocator()->get('PortalUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PortalUsers);

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
