<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GoodsReview Entity
 *
 * @property int $id
 * @property int $good_id
 * @property int $score
 * @property string $uid
 * @property int $member_id
 * @property string $ip_address
 * @property string $text
 * @property string $img_url
 *
 * @property \App\Model\Entity\Good $good
 * @property \App\Model\Entity\Member $member
 */
class GoodsReview extends Entity
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
        'id' => false
    ];
}
