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


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class SearchController extends AppController
{

   public function search($param1 = null,$param2 = null,$param3 = null)
    {
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

   public function test()
    {
    $this->autoRender = false;        
    $str = $this->request->data('text1');
    echo "$str";
    }

}
