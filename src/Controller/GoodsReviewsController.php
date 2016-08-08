<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GoodsReviews Controller
 *
 * @property \App\Model\Table\GoodsReviewsTable $GoodsReviews
 */
class GoodsReviewsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Goods', 'Members']
        ];
        $goodsReviews = $this->paginate($this->GoodsReviews);

        $this->set(compact('goodsReviews'));
        $this->set('_serialize', ['goodsReviews']);
    }

    /**
     * View method
     *
     * @param string|null $id Goods Review id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $goodsReview = $this->GoodsReviews->get($id, [
            'contain' => ['Goods', 'Members']
        ]);

        $this->set('goodsReview', $goodsReview);
        $this->set('_serialize', ['goodsReview']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $goodsReview = $this->GoodsReviews->newEntity();
        if ($this->request->is('post')) {
            $goodsReview = $this->GoodsReviews->patchEntity($goodsReview, $this->request->data);
            if ($this->GoodsReviews->save($goodsReview)) {
                $this->Flash->success(__('The goods review has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The goods review could not be saved. Please, try again.'));
            }
        }
        $goods = $this->GoodsReviews->Goods->find('list', ['limit' => 200]);
        $members = $this->GoodsReviews->Members->find('list', ['limit' => 200]);
        $this->set(compact('goodsReview', 'goods', 'members'));
        $this->set('_serialize', ['goodsReview']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Goods Review id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $goodsReview = $this->GoodsReviews->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $goodsReview = $this->GoodsReviews->patchEntity($goodsReview, $this->request->data);
            if ($this->GoodsReviews->save($goodsReview)) {
                $this->Flash->success(__('The goods review has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The goods review could not be saved. Please, try again.'));
            }
        }
        $goods = $this->GoodsReviews->Goods->find('list', ['limit' => 200]);
        $members = $this->GoodsReviews->Members->find('list', ['limit' => 200]);
        $this->set(compact('goodsReview', 'goods', 'members'));
        $this->set('_serialize', ['goodsReview']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Goods Review id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $goodsReview = $this->GoodsReviews->get($id);
        if ($this->GoodsReviews->delete($goodsReview)) {
            $this->Flash->success(__('The goods review has been deleted.'));
        } else {
            $this->Flash->error(__('The goods review could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
