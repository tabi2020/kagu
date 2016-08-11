<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GoodDetails Controller
 *
 * @property \App\Model\Table\GoodDetailsTable $GoodDetails
 */
class GoodDetailsController extends AppController
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
        $goodDetails = $this->paginate($this->GoodDetails);

        $this->set(compact('goodDetails'));
        $this->set('_serialize', ['goodDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Good Detail id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $goodDetail = $this->GoodDetails->get($id, [
            'contain' => ['Goods', 'Colors']
        ]);

        $this->set('goodDetail', $goodDetail);
        $this->set('_serialize', ['goodDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $goodDetail = $this->GoodDetails->newEntity();
        if ($this->request->is('post')) {
            $goodDetail = $this->GoodDetails->patchEntity($goodDetail, $this->request->data);
            if ($this->GoodDetails->save($goodDetail)) {
                $this->Flash->success(__('The good detail has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The good detail could not be saved. Please, try again.'));
            }
        }
        $goods = $this->GoodDetails->Goods->find('list', ['limit' => 200]);
        $colors = $this->GoodDetails->Colors->find('list', ['limit' => 200]);
        $this->set(compact('goodDetail', 'goods', 'colors'));
        $this->set('_serialize', ['goodDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Good Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $goodDetail = $this->GoodDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $goodDetail = $this->GoodDetails->patchEntity($goodDetail, $this->request->data);
            if ($this->GoodDetails->save($goodDetail)) {
                $this->Flash->success(__('The good detail has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The good detail could not be saved. Please, try again.'));
            }
        }
        $goods = $this->GoodDetails->Goods->find('list', ['limit' => 200]);
        $colors = $this->GoodDetails->Colors->find('list', ['limit' => 200]);
        $this->set(compact('goodDetail', 'goods', 'colors'));
        $this->set('_serialize', ['goodDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Good Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $goodDetail = $this->GoodDetails->get($id);
        if ($this->GoodDetails->delete($goodDetail)) {
            $this->Flash->success(__('The good detail has been deleted.'));
        } else {
            $this->Flash->error(__('The good detail could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
