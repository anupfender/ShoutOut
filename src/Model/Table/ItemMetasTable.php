<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemMetas Model
 *
 * @property \App\Model\Table\ItemsTable|\Cake\ORM\Association\BelongsTo $Items
 * @property |\Cake\ORM\Association\BelongsTo $Metas
 *
 * @method \App\Model\Entity\ItemMeta get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItemMeta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItemMeta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItemMeta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItemMeta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItemMeta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItemMeta findOrCreate($search, callable $callback = null, $options = [])
 */
class ItemMetasTable extends Table
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

        $this->setTable('item_metas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Items', [
            'foreignKey' => 'item_id'
        ]);
        $this->belongsTo('Metas', [
            'foreignKey' => 'meta_id'
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
            ->scalar('meta_value')
            ->allowEmpty('meta_value');

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
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        $rules->add($rules->existsIn(['meta_id'], 'Metas'));

        return $rules;
    }
}
