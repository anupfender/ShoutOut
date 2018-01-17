<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cities Controller
 *
 * @property \App\Model\Table\CitiesTable $Cities
 *
 * @method \App\Model\Entity\City[] paginate($object = null, array $settings = [])
 */
class CitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $cities = $this->paginate($this->Cities);

        $this->set(compact('cities'));
        $this->set('_serialize', ['cities']);
    }

    public function getCities()
    {
        if ($this->request->is('ajax')) {
            $term = $this->request->query['term'];
          // $query = $this->Cities->find('all');
            $query = $this->Cities->find('all', array(
                    'conditions' => array(
                            'Cities.name LIKE' => '%' . trim($this->request->query['term']) . '%'
                    )
            ));
            $data = array();
            foreach ($query as $row) {
                // $data[] = $row->id ." ". $row->name;
                $data[] = $row->name;

            }
            echo json_encode($data);
            die;
        }
    }



    public function viewresult()
    {
        // if ($this->request->is('ajax')) {
        //     $term = $this->request->query['term'];

        //     $query = $this->CityCategories->find('all')
        //     ->where(['CityCategories.city_id' => $term])

        // }

        // $query = $this->Cities->find('all')
        // ->where(['Cities.id' => 1])
        // ->contain([
        //     'CityCategories'
        // ]);

        // $city = $this->Cities->find("all", [
        //     'contain' => ['CityCategories']
        // ]);



        // $data = array();
        // foreach ($query as $row) {
        //     array_push($data, $row->city_categories);

        //     //print_r($row->city_categories);
        // }
        // print_r($query);
        die;
    }
    /**
     * View method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('ItemListings');
        $city = $this->Cities->get($id, [
            'contain' => ['CityCategories', 'ItemListings', 'Sponsers', 'Users']
        ]);
		 $itemListings = $this->ItemListings->find('all')
							->where(['ItemListings.city_id'=>$id])
							->contain(['CityCategories', 'ListingTypes', 'Items']);
        $this->set('itemListings', $itemListings);
        $this->set('city', $city);
        $this->set('_serialize', ['city']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $city = $this->Cities->newEntity();
        if ($this->request->is('post')) {
            $city = $this->Cities->patchEntity($city, $this->request->getData());
            if ($this->Cities->save($city)) {
                $this->Flash->success(__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The city could not be saved. Please, try again.'));
        }
        $this->set(compact('city'));
        $this->set('_serialize', ['city']);
    }

    /**
     * Edit method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $city = $this->Cities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $city = $this->Cities->patchEntity($city, $this->request->getData());
            if ($this->Cities->save($city)) {
                $this->Flash->success(__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The city could not be saved. Please, try again.'));
        }
        $this->set(compact('city'));
        $this->set('_serialize', ['city']);
    }

    /**
     * Delete method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $city = $this->Cities->get($id);
        if ($this->Cities->delete($city)) {
            $this->Flash->success(__('The city has been deleted.'));
        } else {
            $this->Flash->error(__('The city could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}