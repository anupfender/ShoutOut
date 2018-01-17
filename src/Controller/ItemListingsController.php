<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItemListings Controller
 *
 * @property \App\Model\Table\ItemListingsTable $ItemListings
 *
 * @method \App\Model\Entity\ItemListing[] paginate($object = null, array $settings = [])
 */
class ItemListingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($listing_type_id=null)
    {
        if(!empty($listing_type_id)):
            $this->paginate = [
            'conditions' => [
                'listing_type_id' => $listing_type_id,
                'sponsered' =>0
            ],
            'contain' => ['Items']
            ];

             $itemListings = $this->paginate($this->ItemListings);
            $this->set(compact('itemListings'));
            $this->set('_serialize', ['itemListings']);

        else:
            $this->paginate = [
                'contain' => ['Cities', 'CityCategories', 'ListingTypes', 'Items']
            ];
            $itemListings = $this->paginate($this->ItemListings);
            $this->set(compact('itemListings'));
            $this->set('_serialize', ['itemListings']);
        endif;
    }

    /**
     * View method
     *
     * @param string|null $id Item Listing id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itemListing = $this->ItemListings->get($id, [
            'contain' => ['Cities', 'CityCategories', 'ListingTypes', 'Items']
        ]);

        $this->set('itemListing', $itemListing);
        $this->set('_serialize', ['itemListing']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itemListing = $this->ItemListings->newEntity();
        if ($this->request->is('post')) {
            $itemListing = $this->ItemListings->patchEntity($itemListing, $this->request->getData());
            if ($this->ItemListings->save($itemListing)) {
                $this->Flash->success(__('The item listing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item listing could not be saved. Please, try again.'));
        }
        $cities = $this->ItemListings->Cities->find('list', ['limit' => 200]);
        $cityCategories = $this->ItemListings->CityCategories->find('list', ['limit' => 200]);
        $listingTypes = $this->ItemListings->ListingTypes->find('list', ['limit' => 200]);
        $items = $this->ItemListings->Items->find('list', ['limit' => 200]);
        $this->set(compact('itemListing', 'cities', 'cityCategories', 'listingTypes', 'items'));
        $this->set('_serialize', ['itemListing']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Listing id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itemListing = $this->ItemListings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemListing = $this->ItemListings->patchEntity($itemListing, $this->request->getData());
            if ($this->ItemListings->save($itemListing)) {
                $this->Flash->success(__('The item listing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item listing could not be saved. Please, try again.'));
        }
        $cities = $this->ItemListings->Cities->find('list', ['limit' => 200]);
        $cityCategories = $this->ItemListings->CityCategories->find('list', ['limit' => 200]);
        $listingTypes = $this->ItemListings->ListingTypes->find('list', ['limit' => 200]);
        $items = $this->ItemListings->Items->find('list', ['limit' => 200]);
        $this->set(compact('itemListing', 'cities', 'cityCategories', 'listingTypes', 'items'));
        $this->set('_serialize', ['itemListing']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Listing id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itemListing = $this->ItemListings->get($id);
        if ($this->ItemListings->delete($itemListing)) {
            $this->Flash->success(__('The item listing has been deleted.'));
        } else {
            $this->Flash->error(__('The item listing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
