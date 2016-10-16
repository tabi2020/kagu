<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class AppController extends Controller
{

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this -> _getBrandInfo();
        $this -> _getCategoryInfo();
        $this -> _getColorInfo();
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
            $this->viewBuilder()->theme('Sp');
        }
    }

    public function _getBrandInfo()
    {
        $this->brands = TableRegistry::get('brands');
        $querybrand = $this->brands->find('all')
                    ->order(['id' => 'ASC']);
        $this->set('appBrand',$querybrand);
    }

    public function _getCategoryInfo()
    {
        $this->categorys = TableRegistry::get('categories');
        $querycategory = $this->categorys->find('all')

/*                        ->join([
                          'table' => 'category_children',
                          'type' => 'INNER',
                          'conditions' => 'categorys.id = category_children.category_id'
                          ])
  */
                        ->contain('CategoryChildren')
//                        ->order(['categorys.id' => 'ASC', 'category_children.id' => 'ASC' ]);
                        ->order(['categories.id' => 'ASC' ]);

        $this->set('appCategoryquerys',$querycategory);
    }


    public function _getColorInfo()
    {
        $this->colors = TableRegistry::get('colors');
        $querycolors = $this->colors->find('all')
                    ->order(['id' => 'ASC']);
        $this->set('appColor',$querycolors);
    }


}
