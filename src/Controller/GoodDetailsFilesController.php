<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GoodDetailsFiles Controller
 *
 * @property \App\Model\Table\GoodDetailsFilesTable $GoodDetailsFiles
 */
class GoodDetailsFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['GoodDetails']
        ];
        $goodDetailsFiles = $this->paginate($this->GoodDetailsFiles);

        $this->set(compact('goodDetailsFiles'));
        $this->set('_serialize', ['goodDetailsFiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Good Details File id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $goodDetailsFile = $this->GoodDetailsFiles->get($id, [
            'contain' => ['GoodDetails']
        ]);

        $this->set('goodDetailsFile', $goodDetailsFile);
        $this->set('_serialize', ['goodDetailsFile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $goodDetailsFile = $this->GoodDetailsFiles->newEntity();
        if ($this->request->is('post')) {
            $goodDetailsFile = $this->GoodDetailsFiles->patchEntity($goodDetailsFile, $this->request->data);
            if ($this->GoodDetailsFiles->save($goodDetailsFile)) {
                $this->Flash->success(__('The good details file has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The good details file could not be saved. Please, try again.'));
            }
        }
        $goodDetails = $this->GoodDetailsFiles->GoodDetails->find('list', ['limit' => 200]);
        $this->set(compact('goodDetailsFile', 'goodDetails'));
        $this->set('_serialize', ['goodDetailsFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Good Details File id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $goodDetailsFile = $this->GoodDetailsFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $goodDetailsFile = $this->GoodDetailsFiles->patchEntity($goodDetailsFile, $this->request->data);
            if ($this->GoodDetailsFiles->save($goodDetailsFile)) {
                $this->Flash->success(__('The good details file has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The good details file could not be saved. Please, try again.'));
            }
        }
        $goodDetails = $this->GoodDetailsFiles->GoodDetails->find('list', ['limit' => 200]);
        $this->set(compact('goodDetailsFile', 'goodDetails'));
        $this->set('_serialize', ['goodDetailsFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Good Details File id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $goodDetailsFile = $this->GoodDetailsFiles->get($id);
        if ($this->GoodDetailsFiles->delete($goodDetailsFile)) {
            $this->Flash->success(__('The good details file has been deleted.'));
        } else {
            $this->Flash->error(__('The good details file could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
