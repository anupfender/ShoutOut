<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ListingTypes Controller
 *
 * @property \App\Model\Table\ListingTypesTable $ListingTypes
 *
 * @method \App\Model\Entity\ListingType[] paginate($object = null, array $settings = [])
 */
class ListingTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id=null)
    {
        $listingTypes = $this->paginate($this->ListingTypes);

        $this->set(compact('listingTypes'));
        $this->set('_serialize', ['listingTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Listing Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $listingType = $this->ListingTypes->get($id, [
            'contain' => ['ItemListings']
        ]);

        $this->set('listingType', $listingType);
        $this->set('_serialize', ['listingType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $listingType = $this->ListingTypes->newEntity();
        if ($this->request->is('post')) {
            $listingType = $this->ListingTypes->patchEntity($listingType, $this->request->getData());
            if ($this->ListingTypes->save($listingType)) {
                $this->Flash->success(__('The listing type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The listing type could not be saved. Please, try again.'));
        }
        $this->set(compact('listingType'));
        $this->set('_serialize', ['listingType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Listing Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $listingType = $this->ListingTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $listingType = $this->ListingTypes->patchEntity($listingType, $this->request->getData());
            if ($this->ListingTypes->save($listingType)) {
                $this->Flash->success(__('The listing type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The listing type could not be saved. Please, try again.'));
        }
        $this->set(compact('listingType'));
        $this->set('_serialize', ['listingType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Listing Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $listingType = $this->ListingTypes->get($id);
        if ($this->ListingTypes->delete($listingType)) {
            $this->Flash->success(__('The listing type has been deleted.'));
        } else {
            $this->Flash->error(__('The listing type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
