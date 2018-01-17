<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\GendersTable|\Cake\ORM\Association\BelongsTo $Genders
 * @property \App\Model\Table\CitiesTable|\Cake\ORM\Association\BelongsTo $Cities
 * @property \App\Model\Table\StatusesTable|\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\SponsersTable|\Cake\ORM\Association\HasMany $Sponsers
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
{

    protected function _setPassword($password)
    {
         $hasher = new DefaultPasswordHasher();
         return $hasher->hash($value);
    }
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id'
        ]);
        $this->belongsTo('Genders', [
            'foreignKey' => 'gender_id'
        ]);
        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id'
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id'
        ]);
        $this->hasMany('Sponsers', [
            'foreignKey' => 'user_id'
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
            ->scalar('role_id')
            ->requirePresence('role_id', 'create')
            ->notEmpty('role_id');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
             ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'Email should be unique']);

        $validator
			->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('first_name')
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->scalar('last_name')
            ->allowEmpty('last_name');

        $validator
            ->date('dob')
            ->allowEmpty('dob');

        $validator
            ->scalar('address1')
            ->allowEmpty('address1');

        $validator
            ->scalar('address2')
            ->allowEmpty('address2');

        $validator
            ->scalar('zip')
            ->requirePresence('zip', 'create')
            ->notEmpty('zip');

		 $validator
            ->scalar('city_id')
            ->requirePresence('city_id', 'create')
            ->notEmpty('city_id');

         $validator
            ->scalar('gender_id')
            ->requirePresence('gender_id', 'create')
            ->notEmpty('gender_id');

        $validator
            ->scalar('user_current_location')
            ->allowEmpty('user_current_location');

        $validator
            ->dateTime('created_date')
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
        $rules->add($rules->isUnique(['email']), 'Email should be unique');
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        $rules->add($rules->existsIn(['gender_id'], 'Genders'));
        $rules->add($rules->existsIn(['city_id'], 'Cities'));
        $rules->add($rules->existsIn(['status_id'], 'Statuses'));

        return $rules;
    }


}
