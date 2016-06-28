<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Goods Controller
 *
 * @property \App\Model\Table\GoodsTable $Goods
 */
class GoodsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CategoryChildren', 'Brands', 'Materials']
        ];
        $goods = $this->paginate($this->Goods);

        $this->set(compact('goods'));
        $this->set('_serialize', ['goods']);
    }

    /**
     * View method
     *
     * @param string|null $id Good id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $good = $this->Goods->get($id, [
            'contain' => ['CategoryChildren', 'Brands', 'Materials', 'GoodsDetails']
        ]);

        $this->set('good', $good);
        $this->set('_serialize', ['good']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $good = $this->Goods->newEntity();
        if ($this->request->is('post')) {
            $good = $this->Goods->patchEntity($good, $this->request->data);
            if ($this->Goods->save($good)) {
                $this->Flash->success(__('The good has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The good could not be saved. Please, try again.'));
            }
        }
        $categoryChildren = $this->Goods->CategoryChildren->find('list', ['limit' => 200]);
        $brands = $this->Goods->Brands->find('list', ['limit' => 200]);
        $materials = $this->Goods->Materials->find('list', ['limit' => 200]);
        $this->set(compact('good', 'categoryChildren', 'brands', 'materials'));
        $this->set('_serialize', ['good']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Good id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $good = $this->Goods->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $good = $this->Goods->patchEntity($good, $this->request->data);
            if ($this->Goods->save($good)) {
                $this->Flash->success(__('The good has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The good could not be saved. Please, try again.'));
            }
        }
        $categoryChildren = $this->Goods->CategoryChildren->find('list', ['limit' => 200]);
        $brands = $this->Goods->Brands->find('list', ['limit' => 200]);
        $materials = $this->Goods->Materials->find('list', ['limit' => 200]);
        $this->set(compact('good', 'categoryChildren', 'brands', 'materials'));
        $this->set('_serialize', ['good']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Good id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $good = $this->Goods->get($id);
        if ($this->Goods->delete($good)) {
            $this->Flash->success(__('The good has been deleted.'));
        } else {
            $this->Flash->error(__('The good could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
