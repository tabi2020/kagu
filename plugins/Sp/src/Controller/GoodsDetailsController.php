<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GoodsDetails Controller
 *
 * @property \App\Model\Table\GoodsDetailsTable $GoodsDetails
 */
class GoodsDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Goods', 'Colors']
        ];
        $goodsDetails = $this->paginate($this->GoodsDetails);

        $this->set(compact('goodsDetails'));
        $this->set('_serialize', ['goodsDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Goods Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $goodsDetail = $this->GoodsDetails->get($id, [
            'contain' => ['Goods', 'Colors']
        ]);

        $this->set('goodsDetail', $goodsDetail);
        $this->set('_serialize', ['goodsDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $goodsDetail = $this->GoodsDetails->newEntity();
        if ($this->request->is('post')) {
            $goodsDetail = $this->GoodsDetails->patchEntity($goodsDetail, $this->request->data);
            if ($this->GoodsDetails->save($goodsDetail)) {
                $this->Flash->success(__('The goods detail has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The goods detail could not be saved. Please, try again.'));
            }
        }
        $goods = $this->GoodsDetails->Goods->find('list', ['limit' => 200]);
        $colors = $this->GoodsDetails->Colors->find('list', ['limit' => 200]);
        $this->set(compact('goodsDetail', 'goods', 'colors'));
        $this->set('_serialize', ['goodsDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Goods Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $goodsDetail = $this->GoodsDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $goodsDetail = $this->GoodsDetails->patchEntity($goodsDetail, $this->request->data);
            if ($this->GoodsDetails->save($goodsDetail)) {
                $this->Flash->success(__('The goods detail has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The goods detail could not be saved. Please, try again.'));
            }
        }
        $goods = $this->GoodsDetails->Goods->find('list', ['limit' => 200]);
        $colors = $this->GoodsDetails->Colors->find('list', ['limit' => 200]);
        $this->set(compact('goodsDetail', 'goods', 'colors'));
        $this->set('_serialize', ['goodsDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Goods Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $goodsDetail = $this->GoodsDetails->get($id);
        if ($this->GoodsDetails->delete($goodsDetail)) {
            $this->Flash->success(__('The goods detail has been deleted.'));
        } else {
            $this->Flash->error(__('The goods detail could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
