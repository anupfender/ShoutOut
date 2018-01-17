<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CityCategory Entity
 *
 * @property int $id
 * @property int $city_id
 * @property int $category_id
 * @property string $heading
 * @property string $image
 * @property string $short_description
 * @property int $display_order
 *
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Category $category
 */
class CityCategory extends Entity
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
        'heading' => true,
        'image' => true,
        'short_description' => true,
        'status' => true,
        'display_order' => true,
        'city' => true,
        'category' => true
    ];
}
