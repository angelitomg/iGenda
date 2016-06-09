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

    const ACTIVITY_STATUS_CANCELED = 5;
    const ACTIVITY_STATUS_PENDING = 10;
    const ACTIVITY_STATUS_IN_PROGRESS = 20;
    const ACTIVITY_STATUS_WAITING = 30;
    const ACTIVITY_STATUS_COMPLETE = 40;

    protected $statusList = [
        self::ACTIVITY_STATUS_CANCELED => 'Canceled', 
        self::ACTIVITY_STATUS_PENDING => 'Pending', 
        self::ACTIVITY_STATUS_IN_PROGRESS => 'In Progress',
        self::ACTIVITY_STATUS_WAITING => 'Waiting',
        self::ACTIVITY_STATUS_COMPLETE => 'Complete'
    ];

    public function getStatusList(){
        $status = [];
        foreach ($this->statusList as $type => $message){
            $status[$type] = __($message);
        }
        return $status;
    }

    public function getStatus($status){
        $statusName = (isset($this->statusList[$status])) ? __($this->statusList[$status]) : '';
        $css_class = '';
        if ($status == 5) $css_class = 'text-red';
        if ($status == 10) $css_class = 'text-yellow';
        if ($status == 20) $css_class = 'text-light-blue';
        if ($status == 30) $css_class = 'text-red';
        if ($status == 40) $css_class = 'text-green';
        return "<span class='{$css_class}'>{$statusName}</span>";
    }

    public function getActivityColor($status) {
        if ($status == 5) return '#dd4b39';
        if ($status == 10) return '#f39c12';
        if ($status == 20) return '#3c8dbc';
        if ($status == 30) return '#dd4b39';
        if ($status == 40) return '#00a65a';
    }

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
