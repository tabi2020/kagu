<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UrlMapping Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Layers
 * @property \Cake\ORM\Association\BelongsTo $Retruns
 * @property \Cake\ORM\Association\BelongsTo $Types
 *
 * @method \App\Model\Entity\UrlMapping get($primaryKey, $options = [])
 * @method \App\Model\Entity\UrlMapping newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UrlMapping[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UrlMapping|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UrlMapping patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UrlMapping[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UrlMapping findOrCreate($search, callable $callback = null)
 */
class UrlMappingTable extends Table
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

        $this->table('url_mapping');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Layers', [
            'foreignKey' => 'layer_id'
        ]);
        $this->belongsTo('Retruns', [
            'foreignKey' => 'retrun_id'
        ]);
        $this->belongsTo('Types', [
            'foreignKey' => 'type_id'
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
            ->allowEmpty('name');

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
        $rules->add($rules->existsIn(['layer_id'], 'Layers'));
        $rules->add($rules->existsIn(['retrun_id'], 'Retruns'));
        $rules->add($rules->existsIn(['type_id'], 'Types'));
        return $rules;
    }
}
