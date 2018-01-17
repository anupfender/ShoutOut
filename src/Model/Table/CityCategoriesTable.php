<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CityCategories Model
 *
 * @property \App\Model\Table\CitiesTable|\Cake\ORM\Association\BelongsTo $Cities
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\CityCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\CityCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CityCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CityCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CityCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CityCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CityCategory findOrCreate($search, callable $callback = null, $options = [])
 */
class CityCategoriesTable extends Table
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

        $this->setTable('city_categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id'
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id'
        ]);
         $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id'
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
            ->scalar('category_id')
            ->requirePresence('category_id', 'create')
            ->notEmpty('category_id');

		$validator
            ->scalar('heading')
            ->requirePresence('heading', 'create')
            ->notEmpty('heading');

        $validator
            ->scalar('image')
            ->allowEmpty('image');

        $validator
            ->scalar('short_description')
            ->allowEmpty('short_description');

        $validator
            ->integer('status')
            ->allowEmpty('status');

        $validator
            ->integer('display_order')
            ->allowEmpty('display_order');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}
