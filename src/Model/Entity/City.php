<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * City Entity
 *
 * @property int $id
 * @property string $name
 * @property string $state
 * @property string $full_state
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 *
 * @property \App\Model\Entity\CityCategory[] $city_categories
 * @property \App\Model\Entity\ItemListing[] $item_listings
 * @property \App\Model\Entity\Sponser[] $sponsers
 * @property \App\Model\Entity\User[] $users
 */
class City extends Entity
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
        'name' => true,
        'state' => true,
        'full_state' => true,
        'created' => true,
        'updated' => true,
        'city_categories' => true,
        'item_listings' => true,
        'sponsers' => true,
        'users' => true
    ];
}
