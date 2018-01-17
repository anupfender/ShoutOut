<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemListings Model
 *
 * @property \App\Model\Table\CitiesTable|\Cake\ORM\Association\BelongsTo $Cities
 * @property \App\Model\Table\CityCategoriesTable|\Cake\ORM\Association\BelongsTo $CityCategories
 * @property \App\Model\Table\ListingTypesTable|\Cake\ORM\Association\BelongsTo $ListingTypes
 * @property \App\Model\Table\ItemsTable|\Cake\ORM\Association\BelongsTo $Items
 *
 * @method \App\Model\Entity\ItemListing get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItemListing newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItemListing[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItemListing|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItemListing patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItemListing[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItemListing findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemListingsTable extends Table
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

        $this->setTable('item_listings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id'
        ]);
        $this->belongsTo('CityCategories', [
            'foreignKey' => 'city_category_id'
        ]);
        $this->belongsTo('ListingTypes', [
            'foreignKey' => 'listing_type_id'
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id'
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
            ->integer('display_order')
            ->allowEmpty('display_order');

        $validator
            ->dateTime('last_modified')
            ->allowEmpty('last_modified');

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
        $rules->add($rules->existsIn(['city_category_id'], 'CityCategories'));
        $rules->add($rules->existsIn(['listing_type_id'], 'ListingTypes'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));

        return $rules;
    }
}
