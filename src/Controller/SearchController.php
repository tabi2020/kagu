<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Event\Event;


/*
  検索結果を表示
  パターン1 カテゴリ検索
    /search/category/...
  パターン2 カテゴリ検索(子カテまで指定)
    /search/category/.../...
  パターン3 ブランド検索
  /search/brand/...
  パターン4 ブランド、カテゴリ検索
  /search/brand/.../...
  パターン5 ブランド、カテゴリ検索(子カテまで指定)
  /search/brand/.../.../...
  パターン6 カラー検索や値段検索
  /search/?...

 */
class SearchController extends AppController
{

    public $helpers = [
        'Paginator' => ['templates' => 'paginator-templates']
    ];

    public $paginate = [
      'fields' => ['goods.id', 'goods.good_name','goods.price','goods.pricetype','goods.price_sale', 'brands.brand_name','brands.brand_name_en' , 'categorys.category_name','category_children.category_child_name' , 'Review.SCORE', 'good_details_files.file_name'],
        'limit' => 1,
        'order' => [
            'Review.SCORE' => 'desc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->goods = TableRegistry::get('goods');
        $this->goodsreviews = TableRegistry::get('goods_reviews');
    }


   public function search($param1 = null,$param2 = null,$param3 = null,$param4 = null)
    {
      $SerchTypeID = $this -> _checkFirstParam($param1);

      if ($SerchTypeID==1)
      {
        //カテゴリ検索
        $this->set('title', $param2);
        $getCategoryArray = $this -> _getCategoryId($param2,$param3);
        $categoryID =$getCategoryArray[0];
        $childcategoryID =$getCategoryArray[1];

      }elseif ($SerchTypeID==2){
        //ブランド検索
        $this->set('title', $param2);
        $brandID = $this -> _getBrandId($param2);
        $getCategoryArray = $this -> _getCategoryId($param3,$param4);
        $categoryID =$getCategoryArray[0];
        $childcategoryID =$getCategoryArray[1];
      }else{
        $brandID = 0;
        $categoryID = 0;
        $childcategoryID = 0;
      }
        $colorID = $this->request->query('p_cid');
        $lowprice = $this->request->query('p_pris');
        $highprice = $this->request->query('p_prie');

        //where句の作成
        $conditions = $this -> _createCondition($categoryID,$childcategoryID,$brandID,$colorID,$lowprice,$highprice);

        //レビュ−順を作成
        $subquery = $this->goodsreviews->find('all');
        $subquery->select(['SCORE' => $subquery->func()->avg('score'),
                            'good_id' => 'good_id'
                        ])
                ->group('good_id');

        $query = $this->goods->find('all', [
            'conditions' => $conditions
        ])
        ->hydrate(true)
        ->join([
            'Review' => [
                'table' => $subquery,
                'type' => 'LEFT',
                'conditions' => 'goods.id = Review.good_id'
                ]
            ])
        ->join([
            'table' => 'brands',
            'type' => 'INNER',
            'conditions' => 'goods.brand_id = brands.id'
            ])
        ->join([
            'table' => 'good_details',
            'type' => 'INNER',
            'conditions' => 'goods.id = good_details.good_id'
            ])
        ->join([
            'table' => 'colors',
            'type' => 'INNER',
            'conditions' => 'good_details.color_id = colors.id'
            ])
       ->join([
            'table' => 'categorys',
            'type' => 'INNER',
            'conditions' => 'goods.category_id = categorys.id'
            ])
       ->join([
            'table' => 'category_children',
            'type' => 'INNER',
            'conditions' => 'goods.category_child_id = category_children.id'
            ])
       ->join([
            'table' => 'good_details_files',
            'type' => 'INNER',
            'conditions' => 'good_details.id = good_details_files.good_detail_id'
            ]);

 //       echo $query;
        $this->set('recode',$this-> paginate($query));

  }

   public function _checkFirstParam($param1)
   {
    switch ( mb_strtolower($param1)) {
      //カテゴリ検索
      case 'category':
        return 1;
        break;
      //ブランド検索
      case 'brand':
        return 2;
        break;
      default:
        return 0;
    }
   }

  /*
    カテゴリ名、子カテゴリ名からID値を返す
  */
   public function _getCategoryId($categoryname,$childcategoryname)
   {
      $categoryID = 0;
      $childCategoryID = 0;
      switch ( mb_strtolower($categoryname))
      {
        //カテゴリ
        case 'sofa':
          $categoryID = 1;
           switch ( mb_strtolower($childcategoryname))
           {
              case 'single':
                $childCategoryID = 1;
                break;
             case 'double':
               $childCategoryID = 2;
               break;
             default:
           }
          break;
        case 'light':
          $categoryID = 2;
          break;
        default:
      }
      return Array($categoryID,$childCategoryID);
    }

     public function _createCondition($categoryID , $childcategoryID , $brandID , $colorID = null ,$lowprice = null ,$highprice = null )
     {
        $conditions = array();

        $conditions['goods.showwebflag'] = 1;
        $conditions['good_details_files.main_flag'] = 1;

        if ($categoryID != 0){
          $conditions['goods.category_id'] = $categoryID;
        }

        if ($childcategoryID != 0){
          $conditions['goods.category_child_id'] = $childcategoryID;
        }

        if ($brandID != 0){
          $conditions['goods.brand_id'] = $brandID;
        }

        if (!is_null($colorID)){
          $conditions['goods.color_id'] = $colorID;
        }

        if (!is_null($lowprice)){
          $conditions['goods.price >='] = $lowprice;
        }

        if (!is_null($highprice)){
          $conditions['goods.price <='] = $highprice;
        }

        return $conditions;

      }

}
