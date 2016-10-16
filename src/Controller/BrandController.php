<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Event\Event;

class BrandController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->goods = TableRegistry::get('goods');
        $this->good_details = TableRegistry::get('good_details');
        $this->goodsreviews = TableRegistry::get('goods_reviews');
    }


   public function good($param1 = null,$param2 = null)
    {



      //レビュ−順を作成
      $subquery = $this->goodsreviews->find('all');
      $subquery->select(['SCORE' => $subquery->func()->avg('score'),
                          'good_id' => 'good_id'
                      ])
              ->group('good_id');


      $query = $this->goods->find('all')
                    ->join([
                        'table' => 'categories',
                        'type' => 'INNER',
                        'conditions' => 'goods.category_id = categories.id'
                        ])
                    ->join([
                        'table' => 'category_children',
                        'type' => 'INNER',
                        'conditions' => 'goods.category_child_id = category_children.id'
                      ])
                    ->join([
                        'table' => 'brands',
                        'type' => 'INNER',
                        'conditions' => 'goods.brand_id = brands.id'
                      ])
                    ->join([
                        'Review' => [
                            'table' => $subquery,
                            'type' => 'LEFT',
                            'conditions' => 'goods.id = Review.good_id'
                            ]
                        ])
                     ->select(['goods.id', 'goods.good_name','goods.price','goods.pricetype','goods.price_sale','goods.size_w','goods.size_h','goods.size_l','goods.page_url', 'brands.brand_name','brands.brand_name_en' , 'brands.brand_search','categories.category_name','categories.category_search','category_children.category_child_name' ,'category_children.category_child_search', 'Review.SCORE'])
                     ->where(['goods.id' => $param2])
                     ->first();


      $queryDetails = $this->good_details->find('all')
                     ->contain('Colors')
                     ->contain('GoodDetailsFiles')
                     ->where(['good_details.good_id' => $param2]);

      $this -> _createDescription($query);

      $this->set('goodsID',$param2);
      $this->set('recode',$query);
      $this->set('recodeDetails',$queryDetails);


  }

     public function _createDescription($query){

        $mebelTitle = $query->good_name." | ".$query->brands['brand_name']."(".$query->brands['brand_name_en'].")の".$query->category_children['category_child_name'].$query->categories['category_name']."の情報 :Mebel(メーベル)";
        $mebelKeywords =  $query->good_name.$query->brands['brand_name'].$query->brands['brand_name_en'].",通販,比較,mebel,メーベル,インテリア,家具";
        $mebelDescription =  "【Mebel】".$query->brands['brand_name']."(".$query->brands['brand_name_en'].")の".$query->category_children['category_child_name'].$query->categories['category_name']."の家具情報です。";
        $this->set('mebelTitle',$mebelTitle);
        $this->set('mebelKeywords',$mebelKeywords);
        $this->set('mebelDescription',$mebelDescription);

      }
}
