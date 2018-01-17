<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sponsers Model
 *
 * @property \App\Model\Table\CitiesTable|\Cake\ORM\Association\BelongsTo $Cities
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ItemsTable|\Cake\ORM\Association\HasMany $Items
 *
 * @method \App\Model\Entity\Sponser get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sponser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sponser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sponser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sponser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sponser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sponser findOrCreate($search, callable $callback = null, $options = [])
 */
class SponsersTable extends Table
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

        $this->setTable('sponsers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'sponser_id'
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
            ->scalar('city_id')
            ->requirePresence('city_id', 'create')
            ->notEmpty('city_id');
         $validator
            ->scalar('user_id')
            ->requirePresence('user_id', 'create')
            ->notEmpty('user_id');   
        $validator
            ->scalar('bussiness_name')
            ->requirePresence('bussiness_name', 'create')
            ->notEmpty('bussiness_name');

        $validator
            ->scalar('logo')
            ->allowEmpty('logo');

        $validator
            ->date('created_date')
            ->allowEmpty('created_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['city_id'], 'Cities'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
