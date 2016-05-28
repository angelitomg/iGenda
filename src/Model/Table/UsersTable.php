<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Network\Request;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Companies
 * @property \Cake\ORM\Association\HasMany $Activities
 * @property \Cake\ORM\Association\HasMany $ActivityTypes
 * @property \Cake\ORM\Association\HasMany $ClientServices
 * @property \Cake\ORM\Association\HasMany $Clients
 * @property \Cake\ORM\Association\HasMany $Companies
 * @property \Cake\ORM\Association\HasMany $Services
 * @property \Cake\ORM\Association\HasMany $UserPermissions
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Activities', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('ActivityTypes', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('ClientServices', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Clients', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Companies', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Services', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsToMany('Permissions', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'permission_id',
            'joinTable' => 'users_permissions',
            'dependent' => true
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

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('password', 'create')
            ->allowEmpty('password', 'update');

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
        $rules->add($rules->isUnique(['email']));
        //$rules->add($rules->existsIn(['company_id'], 'Companies'));
        return $rules;
    }

    /**
     * Before save method
     *
     */
    public function beforeSave($event, $entity, $options){
        
        //$entity->company_id = get_company_id();    

    }

}