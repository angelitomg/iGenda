<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $document1
 * @property string $document2
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $site
 * @property int $user_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Activity[] $activities
 * @property \App\Model\Entity\ActivityType[] $activity_types
 * @property \App\Model\Entity\ClientService[] $client_services
 * @property \App\Model\Entity\Client[] $clients
 * @property \App\Model\Entity\Service[] $services
 */
class Company extends Entity
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
}
