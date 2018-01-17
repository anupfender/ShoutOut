<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
		$this->loadComponent('Flash');
		$this->loadComponent('Auth', [
		'authorize'=> 'Controller',
		'authenticate' => [
			'Form' => [
				// fields used in login form
				'fields' => [
					'username' => 'email',
					'password' => 'password'
				]
			],
			 'Basic' => [
            'fields' => ['username' => 'email', 'password' => 'password'],
            'userModel' => 'Users'
        ],

    ],
		// login Url
		'loginAction' => [
			'controller' => 'Users',
			'action' => 'login'
		],
		// where to be redirected after logout
		'logoutRedirect' => [
			'controller' => 'Users',
			'action' => 'login'//,
			//'home'
		],
		// if unauthorized user go to an unallowed action he will be redirected to this url
		'unauthorizedRedirect' => false,
		'authError' => 'Did you really think you are allowed to see that?',
		]);
		// Allow the display action so our pages controller still works and  user can visit index and view actions.
		$this->Auth->allow(['noaccess']);

    }


	public function isAuthorized($user)
	{
		$this->Flash->error('You aren\'t allowed');
		return false;
	}

	public function beforeFilter(Event $event)
	{
		$this->loadModel('Users');
		if($this->request->params['_ext'] == 'json') {
			if ($this->request->params['action'] != 'login') {
				# Login method for API
					$session = $this->request->session();
					$session->destroy();
					$this->Auth->logout();
					if(empty($this->request->data['email']) || empty($this->request->data['password']) ) {
						throw new NotFoundException(__('Access denied'));
					}
					# Take backup of posted iems
					$posted_data = $this->request->data;

					$this->request->data = array('User' =>
						array('email'=>@$this->request->data['email'], 'password'=> $this->request->data['password'])
					);
					$_SERVER['PHP_AUTH_USER'] = $posted_data['email'];
					$_SERVER['PHP_AUTH_PW'] = $posted_data['password'];
					$user = $this->Auth->identify();
					if($user) {
						if($user['status_id'] == "0") {
							throw new NotFoundException(__('Access denied'));
						}
						$this->Auth->setUser($user);
						$this->request->data = $user; # Re assign
					}
					else {
						throw new NotFoundException(__('Access denied'));
					}

				}

		}
		if(!is_null($this->Auth->user('id'))){
			$this->Auth->allow();
		}
		else {
			$this->Auth->allow(['login', 'logout', 'noaccess']);
		}
		$id = $this->Auth->user('id');
		$this->set('user', $this->Users->findById($id));

	}
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */

    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
        if($this->request->session()->read('Config.city_id') > 0) {
			$this->loadModel('CityCategories');
			$city_id = $this->request->session()->read('Config.city_id');
			$data = $this->CityCategories->find()
						->select(['id', 'category_id', 'heading', 'Categories.name'])
						->where(['status_id'=> '1', 'city_id' => $city_id])
						->contain(['Categories'])
						->order('display_order', 'asc');
			$results = $data->toArray();
			//print_r($results); exit;
			$this->set("navCityCategory", $results);
			$this->set("city_id", $this->request->session()->read('Config.city_id'));
			$this->set("city_name", $this->request->session()->read('Config.city_name'));
		}

    }
}


?>
