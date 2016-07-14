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
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }


    }


    public function beforeFilter(\Cake\Event\Event $event)
    {
        if ($this->request->isMobile()) {
//            $this->viewBuilder()->theme('Sp');

        $this->viewBuilder()->theme('Sp');
/*
        $this->viewBuilder()->templatePath('sp/' . $this->ViewBuilder()->templatePath());
        $this->viewBuilder()->layout("sp");
*/
/*
        $this->theme = "sp";    // テーマ名を指定
        $this->layout = 'sp';   // レイアウトファイルとして「sp.ctp」を使用する宣言
            $this->theme = 'sp';
            $this->viewPath = 'sp';
*/
        }
    }

    public function getBrandId($brandName)
    {
      switch ( mb_strtolower($brandName))
      {
         //ブランド
        case 'nitori':
          return 1;
          break;
         case 'ikea':
          return 2;
          break;
        case 'noce':
           return 3;
           break;
        default:
          return 0;
      }

    }


}
