<?php
namespace App\Model\Table;

use App\Model\Entity\Company;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Companies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Activities
 * @property \Cake\ORM\Association\HasMany $ActivityTypes
 * @property \Cake\ORM\Association\HasMany $ClientServices
 * @property \Cake\ORM\Association\HasMany $Clients
 * @property \Cake\ORM\Association\HasMany $Services
 * @property \Cake\ORM\Association\HasMany $Users
 */
class CompaniesTable extends Table
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

        $this->table('companies');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Activities', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('ActivityTypes', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('ClientServices', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Clients', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Services', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'company_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

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
        //$rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
