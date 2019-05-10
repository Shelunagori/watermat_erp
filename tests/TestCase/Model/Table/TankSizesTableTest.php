<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TankSizesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TankSizesTable Test Case
 */
class TankSizesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TankSizesTable
     */
    public $TankSizes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TankSizes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TankSizes') ? [] : ['className' => TankSizesTable::class];
        $this->TankSizes = TableRegistry::getTableLocator()->get('TankSizes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TankSizes);

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
