<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CategoryChildren Controller
 *
 * @property \App\Model\Table\CategoryChildrenTable $CategoryChildren
 */
class CategoryChildrenController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $categoryChildren = $this->paginate($this->CategoryChildren);

        $this->set(compact('categoryChildren'));
        $this->set('_serialize', ['categoryChildren']);
    }

    /**
     * View method
     *
     * @param string|null $id Category Child id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoryChild = $this->CategoryChildren->get($id, [
            'contain' => ['Categories', 'Goods']
        ]);

        $this->set('categoryChild', $categoryChild);
        $this->set('_serialize', ['categoryChild']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoryChild = $this->CategoryChildren->newEntity();
        if ($this->request->is('post')) {
            $categoryChild = $this->CategoryChildren->patchEntity($categoryChild, $this->request->data);
            if ($this->CategoryChildren->save($categoryChild)) {
                $this->Flash->success(__('The category child has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The category child could not be saved. Please, try again.'));
            }
        }
        $categories = $this->CategoryChildren->Categories->find('list', ['limit' => 200]);
        $this->set(compact('categoryChild', 'categories'));
        $this->set('_serialize', ['categoryChild']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Category Child id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoryChild = $this->CategoryChildren->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoryChild = $this->CategoryChildren->patchEntity($categoryChild, $this->request->data);
            if ($this->CategoryChildren->save($categoryChild)) {
                $this->Flash->success(__('The category child has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The category child could not be saved. Please, try again.'));
            }
        }
        $categories = $this->CategoryChildren->Categories->find('list', ['limit' => 200]);
        $this->set(compact('categoryChild', 'categories'));
        $this->set('_serialize', ['categoryChild']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Category Child id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoryChild = $this->CategoryChildren->get($id);
        if ($this->CategoryChildren->delete($categoryChild)) {
            $this->Flash->success(__('The category child has been deleted.'));
        } else {
            $this->Flash->error(__('The category child could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
