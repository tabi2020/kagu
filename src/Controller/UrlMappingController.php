<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UrlMapping Controller
 *
 * @property \App\Model\Table\UrlMappingTable $UrlMapping
 */
class UrlMappingController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Layers', 'Retruns', 'Types']
        ];
        $urlMapping = $this->paginate($this->UrlMapping);

        $this->set(compact('urlMapping'));
        $this->set('_serialize', ['urlMapping']);
    }

    /**
     * View method
     *
     * @param string|null $id Url Mapping id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $urlMapping = $this->UrlMapping->get($id, [
            'contain' => ['Layers', 'Retruns', 'Types']
        ]);

        $this->set('urlMapping', $urlMapping);
        $this->set('_serialize', ['urlMapping']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $urlMapping = $this->UrlMapping->newEntity();
        if ($this->request->is('post')) {
            $urlMapping = $this->UrlMapping->patchEntity($urlMapping, $this->request->data);
            if ($this->UrlMapping->save($urlMapping)) {
                $this->Flash->success(__('The url mapping has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The url mapping could not be saved. Please, try again.'));
            }
        }
        $layers = $this->UrlMapping->Layers->find('list', ['limit' => 200]);
        $retruns = $this->UrlMapping->Retruns->find('list', ['limit' => 200]);
        $types = $this->UrlMapping->Types->find('list', ['limit' => 200]);
        $this->set(compact('urlMapping', 'layers', 'retruns', 'types'));
        $this->set('_serialize', ['urlMapping']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Url Mapping id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $urlMapping = $this->UrlMapping->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $urlMapping = $this->UrlMapping->patchEntity($urlMapping, $this->request->data);
            if ($this->UrlMapping->save($urlMapping)) {
                $this->Flash->success(__('The url mapping has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The url mapping could not be saved. Please, try again.'));
            }
        }
        $layers = $this->UrlMapping->Layers->find('list', ['limit' => 200]);
        $retruns = $this->UrlMapping->Retruns->find('list', ['limit' => 200]);
        $types = $this->UrlMapping->Types->find('list', ['limit' => 200]);
        $this->set(compact('urlMapping', 'layers', 'retruns', 'types'));
        $this->set('_serialize', ['urlMapping']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Url Mapping id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $urlMapping = $this->UrlMapping->get($id);
        if ($this->UrlMapping->delete($urlMapping)) {
            $this->Flash->success(__('The url mapping has been deleted.'));
        } else {
            $this->Flash->error(__('The url mapping could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
