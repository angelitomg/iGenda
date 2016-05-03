<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $company_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Company[] $companies
 * @property \App\Model\Entity\Activity[] $activities
 * @property \App\Model\Entity\ActivityType[] $activity_types
 * @property \App\Model\Entity\ClientService[] $client_services
 * @property \App\Model\Entity\Client[] $clients
 * @property \App\Model\Entity\Service[] $services
 * @property \App\Model\Entity\UserPermission[] $user_permissions
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    /**
     * Hash user password. If password is empty, keep old password.
     *
     * @param string $password
     * @return mixed
     */
    protected function _setPassword($password)
    {
        return (!empty($password)) ? (new DefaultPasswordHasher)->hash($password) : $this->get('password');
    }

    public function beforeFind(Event $event, Query $query, array $options)
    {
        print_r($event);
        print_r($query);
        print_r($options);
    }

}
