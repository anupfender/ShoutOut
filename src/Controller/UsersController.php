<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

	public function initialize()
    {
        parent::initialize();
		$this->loadComponent('Flash'); // Include the FlashComponent

    }
    public function login()
	{

		if ($this->request->is('post')) {
			// Auth component identify if sent user data belongs to a user
			$user = $this->Auth->identify();
			if ($user) {
				if($user['status_id'] == '0') {
					$this->Flash->error(__('Invalid username or password, try again.'));
					return $this->redirect(['controller' => 'Users', 'action' => 'login']);
				}
				else if($user['role_id'] != "1") {
					$this->Flash->error(__('Not authorized to access'));
					return $this->redirect(['controller' => 'Users', 'action' => 'login']);
				}
				//
				$this->Auth->setUser($user);
				return $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
			}
			else {
				$this->Flash->error(__('Invalid username or password, try again.'));
			}
		}
	}

	public function logout(){
		$this->Flash->success('You successfully have logged out');
		$session = $this->request->session();
		$session->destroy();
		return	$this->redirect($this->Auth->logout());
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Genders', 'Cities', 'Statuses']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }


    public function cityWiseUsers()
    {
        $session = $this->request->session();
        $city_id = $session->read('Config.city_id');
        $this->paginate = [
            'contain' => ['Roles', 'Genders', 'Cities', 'Statuses']
        ];

        if($city_id){
            $conn = ConnectionManager::get('default');
            $cityCategories = $conn->execute('SELECT * FROM city_categories LEFT JOIN cities ON city_categories.city_id = cities.id
                where city_categories.city_id = '.$city_id);
            $cityCategories = $cityCategories ->fetchAll('assoc');

            $this->set(compact('cityCategories'));
            $this->set('_serialize', ['cityCategories']);

            // $cityCategories = $conn->execute('SELECT * FROM users WHERE city_id = '.$city_id);
            // $users = $cityCategories ->fetchAll('assoc');

             $users = $this->Users->find('all', array('conditions' => array('Users.city_id' => $city_id)));

            $users = $this->paginate($users);

            // echo "<pre>";print_r($users);exit;
            $this->set(compact('users'));
            $this->set('_serialize', ['users']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Genders', 'Cities', 'Statuses', 'Sponsers']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
			$post = $this->request->getData();
            $user = $this->Users->patchEntity($user, $post);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $genders = $this->Users->Genders->find('list', ['limit' => 200]);
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $statuses = $this->Users->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'genders', 'cities', 'statuses'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $genders = $this->Users->Genders->find('list', ['limit' => 200]);
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $statuses = $this->Users->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'genders', 'cities', 'statuses'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

	public function noaccess()
	{
		//$this->Auth->logout();
		die("You are not authorised to view this page");
	}


}
