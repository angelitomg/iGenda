<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Deal Entity.
 *
 * @property int $id
 * @property int $client_id
 * @property \App\Model\Entity\Client $client
 * @property string $name
 * @property string $description
 * @property float $quantity
 * @property float $price
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property int $status
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property int $company_id
 * @property \App\Model\Entity\Company $company
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Service[] $services
 */
class Deal extends Entity
{

    const DEAL_STATUS_PENDING = 10;
    const DEAL_STATUS_IN_PROGRESS = 20;
    const DEAL_STATUS_WAITING = 30;
    const DEAL_STATUS_COMPLETE = 40;

    protected $statusList = [
        self::DEAL_STATUS_PENDING => 'Pending', 
        self::DEAL_STATUS_IN_PROGRESS => 'In Progress',
        self::DEAL_STATUS_WAITING => 'Waiting',
        self::DEAL_STATUS_COMPLETE => 'Complete'
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
        if ($status > 0  && $status <= 10) $css_class = 'text-yellow';
        if ($status > 10 && $status <= 20) $css_class = 'text-light-blue';
        if ($status > 20 && $status <= 30) $css_class = 'text-red';
        if ($status > 30 && $status <= 40) $css_class = 'text-green';
        return "<span class='{$css_class}'>{$statusName}</span>";
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
