<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dashboards Controller
 *
 *
 * @method \App\Model\Entity\Dashboard[] paginate($object = null, array $settings = [])
 */
class DashboardsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $reset = $this->request->query('reset');
		if($reset == "yes") {
			$this->request->session()->write('Config.city_id', 0);
		}
		if($this->request->Session()->read('Config.city_id') > 0)
			return $this->redirect(['controller' => 'cities', 'action' => 'view', $this->request->Session()->read('Config.city_id')]);


        $this->set(compact('dashboards'));
        $this->set('_serialize', ['dashboards']);
    }



    /**
     * View method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dashboard = $this->Dashboards->get($id, [
            'contain' => []
        ]);

        $this->set('dashboard', $dashboard);
        $this->set('_serialize', ['dashboard']);
    }



    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dashboard = $this->Dashboards->newEntity();
        if ($this->request->is('post')) {
            $dashboard = $this->Dashboards->patchEntity($dashboard, $this->request->getData());
            if ($this->Dashboards->save($dashboard)) {
                $this->Flash->success(__('The dashboard has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dashboard could not be saved. Please, try again.'));
        }
        $this->set(compact('dashboard'));
        $this->set('_serialize', ['dashboard']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dashboard = $this->Dashboards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dashboard = $this->Dashboards->patchEntity($dashboard, $this->request->getData());
            if ($this->Dashboards->save($dashboard)) {
                $this->Flash->success(__('The dashboard has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dashboard could not be saved. Please, try again.'));
        }
        $this->set(compact('dashboard'));
        $this->set('_serialize', ['dashboard']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dashboard = $this->Dashboards->get($id);
        if ($this->Dashboards->delete($dashboard)) {
            $this->Flash->success(__('The dashboard has been deleted.'));
        } else {
            $this->Flash->error(__('The dashboard could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
