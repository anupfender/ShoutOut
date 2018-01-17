<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CityCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CityCategoriesTable Test Case
 */
class CityCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CityCategoriesTable
     */
    public $CityCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.city_categories',
        'app.cities',
        'app.item_listings',
        'app.categories',
        'app.listing_types',
        'app.items',
        'app.item_metas',
        'app.sponsers',
        'app.users',
        'app.roles',
        'app.genders',
        'app.statuses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CityCategories') ? [] : ['className' => CityCategoriesTable::class];
        $this->CityCategories = TableRegistry::get('CityCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CityCategories);

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
