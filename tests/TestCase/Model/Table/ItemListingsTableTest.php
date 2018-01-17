<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemListingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemListingsTable Test Case
 */
class ItemListingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItemListingsTable
     */
    public $ItemListings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.item_listings',
        'app.cities',
        'app.city_categories',
        'app.categories',
        'app.sponsers',
        'app.users',
        'app.roles',
        'app.genders',
        'app.items',
        'app.item_metas',
        'app.listing_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ItemListings') ? [] : ['className' => ItemListingsTable::class];
        $this->ItemListings = TableRegistry::get('ItemListings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItemListings);

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
