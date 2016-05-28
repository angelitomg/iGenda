<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DealService Entity.
 */
class DealService extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'id' => false,
        '*' => true
    ];
}
