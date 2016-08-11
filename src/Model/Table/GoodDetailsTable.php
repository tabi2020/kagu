<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GoodDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Goods
 * @property \Cake\ORM\Association\BelongsTo $Colors
 *
 * @method \App\Model\Entity\GoodDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\GoodDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GoodDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GoodDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GoodDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GoodDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GoodDetail findOrCreate($search, callable $callback = null)
 */
class GoodDetailsTable extends Table
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

        $this->table('good_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Goods', [
            'foreignKey' => 'id'
        ]);
        $this->hasOne('Colors', [
            'foreignKey' => 'id'
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
        $rules->add($rules->existsIn(['goods_id'], 'Goods'));
        $rules->add($rules->existsIn(['color_id'], 'Colors'));
        return $rules;
    }
}
