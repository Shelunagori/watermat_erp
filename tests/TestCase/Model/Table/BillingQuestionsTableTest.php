<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BillingQuestionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BillingQuestionsTable Test Case
 */
class BillingQuestionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BillingQuestionsTable
     */
    public $BillingQuestions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.BillingQuestions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BillingQuestions') ? [] : ['className' => BillingQuestionsTable::class];
        $this->BillingQuestions = TableRegistry::getTableLocator()->get('BillingQuestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BillingQuestions);

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
