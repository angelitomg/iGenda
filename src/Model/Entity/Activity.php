<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Activity Entity.
 *
 * @property int $id
 * @property int $client_id
 * @property \App\Model\Entity\Client $client
 * @property int $activity_type_id
 * @property \App\Model\Entity\ActivityType $activity_type
 * @property string $description
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property int $status
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property int $company_id
 * @property \App\Model\Entity\Company $company
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Activity extends Entity
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
        'company_id' => false,
        'user_id' => false
    ];
}
