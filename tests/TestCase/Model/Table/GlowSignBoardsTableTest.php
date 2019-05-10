<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GlowSignBoardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GlowSignBoardsTable Test Case
 */
class GlowSignBoardsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GlowSignBoardsTable
     */
    public $GlowSignBoards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.GlowSignBoards'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('GlowSignBoards') ? [] : ['className' => GlowSignBoardsTable::class];
        $this->GlowSignBoards = TableRegistry::getTableLocator()->get('GlowSignBoards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GlowSignBoards);

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
