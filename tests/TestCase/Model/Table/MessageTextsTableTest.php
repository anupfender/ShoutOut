<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MessageTextsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MessageTextsTable Test Case
 */
class MessageTextsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MessageTextsTable
     */
    public $MessageTexts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.message_texts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MessageTexts') ? [] : ['className' => MessageTextsTable::class];
        $this->MessageTexts = TableRegistry::get('MessageTexts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MessageTexts);

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
