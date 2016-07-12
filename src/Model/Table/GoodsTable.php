<?php
namespace App\Model\Table;

use App\Model\Entity\Good;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Goods Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CategoryChildren
 * @property \Cake\ORM\Association\BelongsTo $Brands
 * @property \Cake\ORM\Association\BelongsTo $Materials
 * @property \Cake\ORM\Association\HasMany $GoodsDetails
 *
 * @method \App\Model\Entity\Good get($primaryKey, $options = [])
 * @method \App\Model\Entity\Good newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Good[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Good|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Good patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Good[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Good findOrCreate($search, callable $callback = null)
 */
class GoodsTable extends Table
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

        $this->table('goods');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('CategoryChildren', [
            'foreignKey' => 'category_child_id'
        ]);
        $this->belongsTo('Brands', [
            'foreignKey' => 'brand_id'
        ]);
        $this->belongsTo('Materials', [
            'foreignKey' => 'material_id'
        ]);
        $this->hasMany('GoodsDetails', [
            'foreignKey' => 'good_id'
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
            ->allowEmpty('good_name');

        $validator
            ->integer('price')
            ->allowEmpty('price');

        $validator
            ->numeric('size_w')
            ->allowEmpty('size_w');

        $validator
            ->numeric('size_h')
            ->allowEmpty('size_h');

        $validator
            ->numeric('size_l')
            ->allowEmpty('size_l');

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
        $rules->add($rules->existsIn(['category_child_id'], 'CategoryChildren'));
        $rules->add($rules->existsIn(['brand_id'], 'Brands'));
        $rules->add($rules->existsIn(['material_id'], 'Materials'));
        return $rules;
    }
}
