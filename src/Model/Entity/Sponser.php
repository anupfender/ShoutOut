<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sponser Entity
 *
 * @property int $id
 * @property int $city_id
 * @property int $user_id
 * @property string $bussiness_name
 * @property string $logo
 * @property \Cake\I18n\FrozenDate $created_date
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Item[] $items
 */
class Sponser extends Entity
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
        'user_id' => true,
        'bussiness_name' => true,
        'logo' => true,
        'created_date' => true,
        'city' => true,
        'user' => true,
        'items' => true
    ];
}
