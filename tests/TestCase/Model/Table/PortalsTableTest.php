<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PortalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PortalsTable Test Case
 */
class PortalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PortalsTable
     */
    public $Portals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Portals',
        'app.UserRights'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Portals') ? [] : ['className' => PortalsTable::class];
        $this->Portals = TableRegistry::getTableLocator()->get('Portals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Portals);

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
