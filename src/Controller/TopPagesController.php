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
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class TopPagesController extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */

    public function initialize()
    {
        parent::initialize();
        $this->goods = TableRegistry::get('goods');
        $this->goodsreviews = TableRegistry::get('goods_reviews');
    }

    public function index()
    {
        $subquery = $this->goodsreviews->find('all');
        $subquery->select(['SCORE' => $subquery->func()->avg('score'),
                            'good_id' => 'good_id'
                        ])
                ->group('good_id');


        $query = $this->goods->find('all')
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
        ->limit(30)
        ->select(['goods.id','brands.brand_name_en','Review.SCORE'])
        ->order(['Review.SCORE' => 'DESC']);
      /*  
        $query = $this->goods->find('all')
        ->hydrate(true)
        ->join([
            'table' => 'good_details',
            'alias' => 'details',
            'type' => 'Inner',
            'conditions' => 'details.good_id = goods.id',
        ])
        ->join([
            'table' => 'brands',
            'alias' => 'brands',
            'type' => 'Inner',
            'conditions' => 'brands.id = goods.brand_id',
        ])
        ->join([
            'table' => 'colors',
            'alias' => 'colors',
            'type' => 'Inner',
            'conditions' => 'colors.id = details.color_id',
        ]);
*/

//        echo($query);

        $this->set('recode',$query);

    }
}
