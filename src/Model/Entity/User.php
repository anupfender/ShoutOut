<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;


/**
 * User Entity
 *
 * @property int $id
 * @property int $role_id
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property \Cake\I18n\FrozenDate $dob
 * @property int $gender_id
 * @property string $address1
 * @property string $address2
 * @property string $zip
 * @property int $city_id
 * @property string $user_current_location
 * @property \Cake\I18n\FrozenTime $created_date
 * @property int $status_id
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Gender $gender
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Sponser[] $sponsers
 */
class User extends Entity
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
        'role_id' => true,
        'email' => true,
        'password' => true,
        'first_name' => true,
        'last_name' => true,
        'dob' => true,
        'gender_id' => true,
        'address1' => true,
        'address2' => true,
        'zip' => true,
        'city_id' => true,
        'user_current_location' => true,
        'created_date' => true,
        'status_id' => true,
        'role' => true,
        'gender' => true,
        'city' => true,
        'status' => true,
        'sponsers' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected function _setPassword($password){
        return (new DefaultPasswordHasher)->hash($password);
    }
}
