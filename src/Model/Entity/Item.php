<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property string $heading
 * @property int $sponsered
 * @property string $poster_image
 * @property string $keywords
 * @property string $location
 * @property string $tab
 * @property string $zip
 * @property string $lat
 * @property string $longt
 * @property string $rating
 *
 * @property \App\Model\Entity\ItemListing[] $item_listings
 * @property \App\Model\Entity\ItemMeta[] $item_metas
 */
class Item extends Entity
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
        'heading' => true,
        'sponsered' => true,
        'poster_image' => true,
        'keywords' => true,
        'location' => true,
        'tab' => true,
        'zip' => true,
        'lat' => true,
        'longt' => true,
        'rating' => true,
        'item_listings' => true,
        'item_metas' => true
    ];
}
