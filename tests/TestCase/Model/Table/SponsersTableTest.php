<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SponsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SponsersTable Test Case
 */
class SponsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SponsersTable
     */
    public $Sponsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sponsers',
        'app.cities',
        'app.users',
        'app.roles',
        'app.genders',
        'app.statuses',
        'app.items',
        'app.item_listings',
        'app.item_metas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sponsers') ? [] : ['className' => SponsersTable::class];
        $this->Sponsers = TableRegistry::get('Sponsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sponsers);

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
