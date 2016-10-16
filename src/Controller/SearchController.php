<?php
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
      'fields' => ['goods.id', 'goods.good_name','goods.price','goods.pricetype','goods.price_sale', 'brands.brand_name','brands.brand_name_en' , 'brands.brand_search','categories.category_name','categories.category_search','category_children.category_child_name' ,'category_children.category_child_search', 'Review.SCORE', 'good_details_files.file_name'],
        'limit' => 21,
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
        $this->search_url = TableRegistry::get('search_url');
        $this->colors = TableRegistry::get('colors');
    }


   public function search($param1 = null,$param2 = null,$param3 = null,$param4 = null)
    {
      //パラメーター取得
      $colorID = $this->request->query('p_cid');
      $lowprice = $this->request->query('p_pris');
      $highprice = $this->request->query('p_prie');

      if ($this->request->isMobile() and is_null($param1) and is_null($colorID) and is_null($lowprice) and is_null($highprice)) {
        $this->set('mebelTitle',"ブランド・カテゴリから家具を検索 :Mebel(メーベル)");
        $this->set('mebelKeywords',"nitori,ニトリ,IKEA,イケア,通販,比較,mebel,メーベル,インテリア,家具");
        $this->set('mebelDescription',"ソファやテーブル、照明器具などのインテリアをサイズや価格から検索することができます。");
        $this->render('index');
        return;
      }

      if ((!is_null($colorID) and !ctype_digit($colorID)) or (!is_null($lowprice) and !ctype_digit($lowprice)) or (!is_null($highprice) and !ctype_digit($highprice))){
        $this->redirect('/',301);
        return;
      }


      //検索のタイプ取得
      $SerchTypeID = $this -> _checkFirstParam($param1);


      //URL解析
      $Search = $this->search_url->find('all',[
                        'order' => ['priority' => 'ASC']
                      ])
                      ->hydrate(true)
                      ->orWhere(['url_name' => $param2])
                      ->orWhere(['url_name' => $param3])
                      ->orWhere(['url_name' => $param4]);

      //where句の作成
      $conditions = $this -> _createCondition($Search,$colorID,$lowprice,$highprice);

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
          'table' => 'good_details_files',
          'type' => 'INNER',
          'conditions' => 'good_details.id = good_details_files.good_detail_id'
          ]);

      $this->set('pankuzu',"/search/".$param1);
      $this->set('search',$Search);
      $this->set('recode',$this->paginate($query));
      $this->set('SerchTypeID',$SerchTypeID);

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

     public function _createCondition($search, $colorID = null ,$lowprice = null ,$highprice = null )
     {

        $conditions = array();
        $keyName = array();
        $keyNameEn = array();

        $conditions['goods.showwebflag'] = 1;
        $conditions['good_details_files.main_flag'] = 1;

        foreach ($search as $key) {
            $keyName[$key->priority] = $key->name;
            $keyNameEn[$key->priority] = $key->name_en;

          switch ($key->priotity) {
            case 1:
             $conditions['goods.brand_id'] = $key->retrun_id;
             break;
            case 2:
             $conditions['goods.category_id'] = $key->retrun_id;
              break;
            case 3:
             $conditions['goods.category_child_id'] = $key->retrun_id;
              break;
          }
        }

        if (!is_null($colorID)){
          $conditions['good_details.color_id'] = $colorID;
        }

        if (!is_null($lowprice)){
          $conditions['goods.price >='] = $lowprice;
        }

        if (!is_null($highprice)){
          $conditions['goods.price <='] = $highprice;
        }

        $this -> _createDescription($keyName , $keyNameEn);

        return $conditions;

      }


     public function _createDescription($keyName , $keyNameEn){

        if (isset($keyName[1])){
          //ブランド検索
          $mebelTitle = $keyName[1]." (".$keyNameEn[1].") ";
          $title = $mebelTitle;
          $mebelDescription = $keyName[1]." | ".$keyNameEn[1];
          $mebelKeywords = $keyName[1].",".$keyNameEn[1];
        }

        if (isset($keyName[3])){
          //子カテ検索
          if(!empty($mebelTitle)){
            $mebelTitle = $mebelTitle."の";
            $title = $mebelTitle;
            $mebelDescription = $mebelDescription."の";

            $mebelTitle = $mebelTitle." ".$keyName[3]."/".$keyName[2]." (".$keyNameEn[3]."/".$keyNameEn[2].") ";
            $title = $title." ".$keyName[3]."/".$keyName[2];
            $mebelKeywords = $mebelKeywords.$keyName[3].",".$keyName[2];
            $mebelDescription = $mebelDescription.$keyName[2]." (".$keyNameEn[3]."/".$keyNameEn[2].") ";
          }else{
            $mebelTitle = $keyName[3]."/".$keyName[2]." (".$keyNameEn[3]."/".$keyNameEn[2].") ";
            $title = $keyName[3]."/".$keyName[2];
            $mebelKeywords = $keyName[3].",".$keyName[2];
            $mebelDescription = $keyName[2]." (".$keyNameEn[3]."/".$keyNameEn[2].") ";
          }
        }elseif(isset($keyName[2])){
          //親カテ検索
          if(!empty($mebelTitle)){
            $mebelTitle = $mebelTitle."の";
            $title = $mebelTitle;
            $mebelDescription = $mebelDescription."の";

            $mebelTitle = $mebelTitle." ".$keyName[2]." (".$keyNameEn[2].") ";
            $title = $title." ".$keyName[2];
            $mebelKeywords = $mebelKeywords.$keyName[2].",".$keyNameEn[2];
            $mebelDescription = $mebelDescription." ".$keyName[2]." (".$keyNameEn[2].") ";
          }else{
            $mebelTitle = $keyName[2]." (".$keyNameEn[2].") ";
            $title = $keyName[2];
            $mebelKeywords = $keyName[2].",".$keyNameEn[2];
            $mebelDescription = $keyName[2]." (".$keyNameEn[2].") ";
          }

        }
        if (!is_null($this->request->query('p_cid'))){
          $querycolors = $this->colors->find('all')
                                    ->where(['colors.id' => $this->request->query('p_cid')]);
            foreach ($querycolors as $colorItem) {
                $colorName = $colorItem->color_name;
            }
          if(!empty($mebelTitle)){
            $mebelTitle = $colorName."の".$mebelTitle;
            $mebelKeywords =  $colorName.",".$mebelKeywords.",通販,比較,mebel,メーベル,インテリア,家具";
            $mebelDescription =  $colorName."の".$mebelDescription;
            $title = $colorName."の".$title;
          }else{
            $mebelTitle = $colorName."の家具";
            $mebelKeywords =  $colorName;
            $mebelDescription =  $mebelTitle;
            $title = $mebelTitle;
          }

        }
        $lowprice = $this->request->query('p_pris');
        $highprice = $this->request->query('p_prie');
        if (!is_null($lowprice) and !is_null($highprice)){
          if(!empty($mebelTitle)){
            $mebelTitle = "¥".number_format($lowprice)."~¥".number_format($highprice)."の".$mebelTitle;
            $mebelDescription =  "¥".number_format($lowprice)."~¥".number_format($highprice)."の".$mebelDescription;
            $title = "¥".number_format($lowprice)."~¥".number_format($highprice)."の".$title;
          }else{
            $mebelTitle = "¥".number_format($lowprice)."~¥".number_format($highprice)."の家具";
            $mebelKeywords =  "";
            $mebelDescription =  $mebelTitle;
            $title = $mebelTitle;
          }
        }elseif(!is_null($lowprice)){
          if(!empty($mebelTitle)){
            $mebelTitle = "¥".number_format($lowprice)."以下の".$mebelTitle;
            $mebelDescription =  "¥".number_format($lowprice)."以下の".$mebelDescription;
            $title = "¥".number_format($lowprice)."以下の".$title;
          }else{
            $mebelTitle = "¥".number_format($lowprice)."以下の"."の家具";
            $mebelKeywords =  "";
            $mebelDescription =  $mebelTitle;
            $title = $mebelTitle;
          }
        }elseif(!is_null($highprice)){
          if(!empty($mebelTitle)){
            $mebelTitle = "¥".number_format($highprice)."以上の".$mebelTitle;
            $mebelDescription =  "¥".number_format($highprice)."以上の".$mebelDescription;
            $title = "¥".number_format($highprice)."以上の".$title;
          }else{
            $mebelTitle = "¥".number_format($highprice)."以上の"."の家具";
            $mebelKeywords =  "";
            $mebelDescription =  $mebelTitle;
            $title = $mebelTitle;
          }
        }


        $mebelTitle = $mebelTitle."の検索結果 :Mebel(メーベル)";
        $mebelKeywords =  $mebelKeywords.",通販,比較,mebel,メーベル,インテリア,家具";
        $mebelDescription =  $mebelDescription."の一覧ページです。ソファやテーブル、照明器具などのインテリアをサイズやレビューから検索することができます。";
        $this->set('mebelTitle',$mebelTitle);
        $this->set('title',$title);
        $this->set('mebelKeywords',$mebelKeywords);
        $this->set('mebelDescription',$mebelDescription);

      }
}
