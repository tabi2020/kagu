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

   public function search($param1 = null,$param2 = null,$param3 = null,$param4 = null)
    {
      $SerchTypeID = $this -> _checkFirstParam($param1);

      if ($SerchTypeID==1)
      {
        //カテゴリ検索
        $categoryID = $this -> _getCategoryId($param2);
        $childcategoryID = $this ->  getChildCategoryId($param2);

      }elseif ($SerchTypeID==2){
        //ブランド検索
        $brandID = $this -> _getBrandId($param2);
        $categoryID = $this -> _getCategoryId($param3);
        $childcategoryID = $this -> _getChildCategoryId($param4);
      }
        $colorID = $this->request->query('p_cid');
        $lowprice = $this->request->query('p_pris');
        $highprice = $this->request->query('p_prie');

        //where句の作成
        $conditions = $this -> _createCondition($categoryID,$childcategoryID,$brandID,$colorID,$lowprice,$highprice);

        $goods = TableRegistry::get('goods');

        $query = $goods->find('all',array(
                        'conditions' => $conditions))
                        ->hydrate(true)
                        ->join([
                            'table' => 'goods_details',
                            'alias' => 'details',
                            'type' => 'Inner',
                            'conditions' => 'details.id = goods.id',
                        ])->select([
                            "id" => "goods.id"
                            , "name" => "goods.good_name"
                        ]);


        echo $query;
        $this->set('recode',$query );

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
    カテゴリ名からID値を返す
  */
   public function _getCategoryId($categoryname)
   {
      switch ( mb_strtolower($categoryname))
      {
        //カテゴリ
         case 'sofa':
          return 1;
          break;
        case 'light':
          return 2;
          break;
        default:
          return 0;
      }
    }

    /*
      小カテゴリ名からID値を返す
    */
    public function _getChildCategoryId($childcategoryname)
    {
       switch ( mb_strtolower($childcategoryname))
       {
         //小カテゴリ
          case 'single':
          return 1;
           break;
         case 'double':
         return 2;
           break;
         default:
           return 0;
       }
     }

     public function _createCondition($categoryID , $childcategoryID , $brandID , $colorID = null ,$lowprice = null ,$highprice = null )
     {
        $conditions = array();
        if ($categoryID != 0){
          $conditions['goods.category_id'] = $categoryID;
        }

        if ($childcategoryID != 0){
          $conditions['goods.category_child_id'] = $childcategoryID;
        }

        if ($brandID != 0){
          $conditions['goods.brand_id'] = $brandID;
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
