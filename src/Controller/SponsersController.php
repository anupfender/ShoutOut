<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Datasource\ConnectionManager;

/**
 * Sponsers Controller
 *
 * @property \App\Model\Table\SponsersTable $Sponsers
 *
 * @method \App\Model\Entity\Sponser[] paginate($object = null, array $settings = [])
 */
class SponsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $session = $this->request->session();
        $city_id = $session->read('city_id');
        $this->paginate = [
            'contain' => ['Cities', 'Users']
        ];

        $sponsers = $this->Sponsers->find('all', array('conditions' => array('Sponsers.city_id' => $city_id)));

        //$sponsers = $this->paginate($this->Sponsers);
        $sponsers = $this->paginate($sponsers);


        $this->set(compact('sponsers'));
        $this->set('_serialize', ['sponsers']);

         $conn = ConnectionManager::get('default');
            $cityCategories = $conn->execute('SELECT * FROM city_categories LEFT JOIN cities ON city_categories.city_id = cities.id 
                where city_categories.city_id = '.$city_id);
            $cityCategories = $cityCategories ->fetchAll('assoc');

            $this->set(compact('cityCategories'));
            $this->set('_serialize', ['cityCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Sponser id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sponser = $this->Sponsers->get($id, [
            'contain' => ['Cities', 'Users', 'Items']
        ]);

        $this->set('sponser', $sponser);
        $this->set('_serialize', ['sponser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {

        $sponser = $this->Sponsers->newEntity();
        if ($this->request->is('post')) {
            $sponser = $this->Sponsers->patchEntity($sponser, $this->request->getData());
            if ($this->Sponsers->save($sponser)) {
                $this->Flash->success(__('The sponser has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sponser could not be saved. Please, try again.'));
        }
        $cities = $this->Sponsers->Cities->find('list', ['limit' => 200]);
        $users = $this->Sponsers->Users->find('list', ['limit' => 200,'valueField' => function ($e) {
            return $e->get('first_name'). ' ' . $e->get('last_name');
        }]);
        $this->set('user_id', $id);
        $this->set(compact('sponser', 'cities', 'users'));
        $this->set('_serialize', ['sponser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sponser id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sponser = $this->Sponsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sponser = $this->Sponsers->patchEntity($sponser, $this->request->getData());
            if ($this->Sponsers->save($sponser)) {
                $this->Flash->success(__('The sponser has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sponser could not be saved. Please, try again.'));
        }
        $cities = $this->Sponsers->Cities->find('list', ['limit' => 200]);
        $users = $this->Sponsers->Users->find('list', ['limit' => 200, 'valueField' => function ($e) {
            return $e->get('first_name'). ' ' . $e->get('last_name');
        }]);
        $this->set(compact('sponser', 'cities', 'users'));
        $this->set('_serialize', ['sponser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sponser id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sponser = $this->Sponsers->get($id);
        if ($this->Sponsers->delete($sponser)) {
            $this->Flash->success(__('The sponser has been deleted.'));
        } else {
            $this->Flash->error(__('The sponser could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
