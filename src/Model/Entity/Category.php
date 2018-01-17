<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 *
 * @property \App\Model\Entity\CityCategory[] $city_categories
 * @property \App\Model\Entity\ItemListing[] $item_listings
 */
class Category extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'slug' => true,
        'name' => true,
        'city_categories' => true,
        'item_listings' => true
    ];
}
