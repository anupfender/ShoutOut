<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ListingTypes Model
 *
 * @property \App\Model\Table\ItemListingsTable|\Cake\ORM\Association\HasMany $ItemListings
 *
 * @method \App\Model\Entity\ListingType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ListingType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ListingType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ListingType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ListingType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ListingType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ListingType findOrCreate($search, callable $callback = null, $options = [])
 */
class ListingTypesTable extends Table
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

        $this->setTable('listing_types');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('ItemListings', [
            'foreignKey' => 'listing_type_id'
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
            ->scalar('listing_type')
            ->allowEmpty('listing_type');

        $validator
            ->scalar('title')
            ->allowEmpty('title');

        return $validator;
    }
}
