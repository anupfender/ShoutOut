<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemListing Entity
 *
 * @property int $id
 * @property int $city_id
 * @property int $category_id
 * @property int $listing_type_id
 * @property int $item_id
 * @property int $display_order
 * @property \Cake\I18n\FrozenTime $last_modified
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\ListingType $listing_type
 * @property \App\Model\Entity\Item $item
 */
class ItemListing extends Entity
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
        'city_id' => true,
        'category_id' => true,
        'listing_type_id' => true,
        'item_id' => true,
        'display_order' => true,
        'last_modified' => true,
        'city' => true,
        'category' => true,
        'listing_type' => true,
        'item' => true
    ];
}
