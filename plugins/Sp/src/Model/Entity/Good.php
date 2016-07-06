<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Good Entity
 *
 * @property int $id
 * @property string $good_name
 * @property int $price
 * @property int $category_child_id
 * @property int $brand_id
 * @property int $material_id
 * @property float $size_w
 * @property float $size_h
 * @property float $size_l
 *
 * @property \App\Model\Entity\CategoryChild $category_child
 * @property \App\Model\Entity\Brand $brand
 * @property \App\Model\Entity\Material $material
 * @property \App\Model\Entity\GoodsDetail[] $goods_details
 */
class Good extends Entity
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
