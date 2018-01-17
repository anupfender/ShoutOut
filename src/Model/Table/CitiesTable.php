<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cities Model
 *
 * @property \App\Model\Table\CityCategoriesTable|\Cake\ORM\Association\HasMany $CityCategories
 * @property \App\Model\Table\ItemListingsTable|\Cake\ORM\Association\HasMany $ItemListings
 * @property \App\Model\Table\SponsersTable|\Cake\ORM\Association\HasMany $Sponsers
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\City get($primaryKey, $options = [])
 * @method \App\Model\Entity\City newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\City[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\City|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\City patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\City[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\City findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CitiesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('cities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CityCategories', [
            'foreignKey' => 'city_id'
        ]);
        $this->hasMany('ItemListings', [
            'foreignKey' => 'city_id'
        ]);
        $this->hasMany('Sponsers', [
            'foreignKey' => 'city_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'city_id'
        ]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('state')
            ->allowEmpty('state');

        $validator
            ->scalar('full_state')
            ->allowEmpty('full_state');

        return $validator;
    }
}
