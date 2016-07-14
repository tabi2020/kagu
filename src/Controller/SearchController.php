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

  public function getSearchType($brandID = null,$categoryID = null,$childcategoryID = null,$colorID = null)
  {
    if ($brandID == null or $brandID == 0 ){


    }

  }

   public function search($param1 = null,$param2 = null,$param3 = null,$param4 = null)
    {
      $SerchTypeID = checkFirstParam($param1);
      if ($SerchTypeID==1)
      {
        //カテゴリ検索
        $categoryID = getCategoryId($param2);
        $childcategoryID = getChildCategoryId($param2);

      }elseif ($SerchTypeID==2){
        //ブランド検索
        $brandID = getBrandId($param2);
        $categoryID = getCategoryId($param3);
        $childcategoryID = getChildCategoryId($param4);
      }
        $colorID = $this->request->data('p_cid');

        $goods = TableRegistry::get('goods');

        $query = $goods->find()
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


        if ($param3 == null ){
            echo 'param3 null';
        }else{
            echo $param3;
        }
  }

   public function checkFirstParam($param1)
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
   public function getCategoryId($categoryname)
   {
      switch ( mb_strtolower($categoryname))
      {
        //カテゴリ
         case 'sofa':
          $returnValue[] = 1;
          break;
        case 'light':
          $returnValue[] = 2;
          break;
        default:
          return 0;
      }
    }

    /*
      小カテゴリ名からID値を返す
    */
    public function getChildCategoryId($childcategoryname)
    {
       switch ( mb_strtolower($childcategoryname))
       {
         //小カテゴリ
          case 'single':
           $returnValue[] = 1;
           break;
         case 'double':
           $returnValue[] = 2;
           break;
         default:
           return 0;
       }
     }

   public function test()
    {
    $this->autoRender = false;
    $str = $this->request->data('text1');
    echo "$str";
    }

}
