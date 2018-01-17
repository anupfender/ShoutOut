<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItemMetas Controller
 *
 * @property \App\Model\Table\ItemMetasTable $ItemMetas
 *
 * @method \App\Model\Entity\ItemMeta[] paginate($object = null, array $settings = [])
 */
class ItemMetasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Items']
        ];
        $itemMetas = $this->paginate($this->ItemMetas);

        $this->set(compact('itemMetas'));
        $this->set('_serialize', ['itemMetas']);
    }

    /**
     * View method
     *
     * @param string|null $id Item Meta id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itemMeta = $this->ItemMetas->get($id, [
            'contain' => ['Items']
        ]);

        $this->set('itemMeta', $itemMeta);
        $this->set('_serialize', ['itemMeta']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itemMeta = $this->ItemMetas->newEntity();
        if ($this->request->is('post')) {
            $itemMeta = $this->ItemMetas->patchEntity($itemMeta, $this->request->getData());
            if ($this->ItemMetas->save($itemMeta)) {
                $this->Flash->success(__('The item meta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item meta could not be saved. Please, try again.'));
        }
        $items = $this->ItemMetas->Items->find('list', ['limit' => 200]);
        $this->set(compact('itemMeta', 'items'));
        $this->set('_serialize', ['itemMeta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Meta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itemMeta = $this->ItemMetas->get($id, [
            'contain' => ['Metas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemMeta = $this->ItemMetas->patchEntity($itemMeta, $this->request->getData());
            if ($this->ItemMetas->save($itemMeta)) {
                $this->Flash->success(__('The item meta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item meta could not be saved. Please, try again.'));
        }
        $items = $this->ItemMetas->Items->find('list', ['limit' => 200]);
        $metas = $this->ItemMetas->Metas->find('list', ['limit' => 200]);
        $this->set(compact('itemMeta', 'items', 'metas'));
        $this->set('_serialize', ['itemMeta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Meta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itemMeta = $this->ItemMetas->get($id);
        if ($this->ItemMetas->delete($itemMeta)) {
            $this->Flash->success(__('The item meta has been deleted.'));
        } else {
            $this->Flash->error(__('The item meta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
