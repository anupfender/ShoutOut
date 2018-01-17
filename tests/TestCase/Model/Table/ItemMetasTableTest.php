<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemMetasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemMetasTable Test Case
 */
class ItemMetasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItemMetasTable
     */
    public $ItemMetas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.item_metas',
        'app.items',
        'app.sponsers',
        'app.cities',
        'app.city_categories',
        'app.categories',
        'app.item_listings',
        'app.listing_types',
        'app.users',
        'app.roles',
        'app.genders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ItemMetas') ? [] : ['className' => ItemMetasTable::class];
        $this->ItemMetas = TableRegistry::get('ItemMetas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItemMetas);

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
