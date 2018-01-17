<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 * @property \App\Model\Table\ItemListingsTable|\Cake\ORM\Association\HasMany $ItemListings
 * @property \App\Model\Table\ItemMetasTable|\Cake\ORM\Association\HasMany $ItemMetas
 *
 * @method \App\Model\Entity\Item get($primaryKey, $options = [])
 * @method \App\Model\Entity\Item newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Item[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Item|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Item[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Item findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemsTable extends Table
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

        $this->setTable('items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('ItemListings', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('ItemMetas', [
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
            ->scalar('heading')
            ->requirePresence('heading', 'create')
            ->notEmpty('heading');

        $validator
            ->integer('sponsered')
            ->allowEmpty('sponsered');

        $validator
            ->scalar('poster_image')
            ->allowEmpty('poster_image');

        $validator
            ->scalar('keywords')
            ->requirePresence('keywords', 'create')
            ->notEmpty('keywords');

        $validator
            ->scalar('location')
            ->allowEmpty('location');

        $validator
            ->scalar('tab')
            ->allowEmpty('tab');

        $validator
            ->scalar('zip')
            ->requirePresence('zip', 'create')
            ->notEmpty('zip');

        $validator
            ->scalar('lat')
            ->allowEmpty('lat');

        $validator
            ->scalar('longt')
            ->allowEmpty('longt');

        $validator
            ->scalar('rating')
            ->allowEmpty('rating');

        return $validator;
    }
}
