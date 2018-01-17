<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Metas Model
 *
 * @property \App\Model\Table\ItemMetasTable|\Cake\ORM\Association\HasMany $ItemMetas
 *
 * @method \App\Model\Entity\Meta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Meta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Meta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Meta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Meta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Meta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Meta findOrCreate($search, callable $callback = null, $options = [])
 */
class MetasTable extends Table
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

        $this->setTable('metas');
        $this->setDisplayField('meta_name');
        $this->setPrimaryKey('id');

        $this->hasMany('ItemMetas', [
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
            ->scalar('meta_name')
            ->allowEmpty('meta_name');

        return $validator;
    }
}
