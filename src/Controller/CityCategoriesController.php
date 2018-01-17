<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * CityCategories Controller
 *
 * @property \App\Model\Table\CityCategoriesTable $CityCategories
 *
 * @method \App\Model\Entity\CityCategory[] paginate($object = null, array $settings = [])
 */
class CityCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id=null)
    {
        if(!empty($id)):
        $this->paginate = [
        'conditions' => [
            'city_id' => $id,
            'status_id' => '1',
        ],
        'contain' => ['Cities', 'Categories']
        ];
        else:
        $this->paginate = [
        'contain' => ['Cities', 'Categories']
        ];
        endif;

        $cityCategories = $this->paginate($this->CityCategories);

        $this->set(compact('cityCategories'));
        $this->set('_serialize', ['cityCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id City Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cityCategory = $this->CityCategories->get($id, [
            'contain' => ['Cities', 'Categories']
        ]);

        $this->set('cityCategory', $cityCategory);
        $this->set('_serialize', ['cityCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cityCategory = $this->CityCategories->newEntity();
        if ($this->request->is('post')) {
            $cityCategory = $this->CityCategories->patchEntity($cityCategory, $this->request->getData());
            if ($this->CityCategories->save($cityCategory)) {
                $this->Flash->success(__('The city category has been saved.'));

                return $this->redirect(['controller'=>'cities', 'action' => 'view', $this->request->session()->read('Config.city_id')]);
            }
            $this->Flash->error(__('The city category could not be saved. Please, try again.'));
        }
        $cities = $this->CityCategories->Cities->find('list', ['limit' => 200]);
        $categories = $this->CityCategories->Categories->find('list', ['limit' => 200]);
        $statuses = $this->CityCategories->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('cityCategory', 'cities', 'categories', 'statuses'));
        $this->set('_serialize', ['cityCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id City Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cityCategory = $this->CityCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cityCategory = $this->CityCategories->patchEntity($cityCategory, $this->request->getData());
            if ($this->CityCategories->save($cityCategory)) {
                $this->Flash->success(__('The city category has been saved.'));

                return $this->redirect(['controller' => 'CityCategories', 'action' => 'view', $id]);
            }
            $this->Flash->error(__('The city category could not be saved. Please, try again.'));
        }
        $cities = $this->CityCategories->Cities->find('list', ['limit' => 200]);
        $categories = $this->CityCategories->Categories->find('list', ['limit' => 200]);
        $statuses = $this->CityCategories->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('cityCategory', 'cities', 'categories', 'statuses'));
        $this->set('_serialize', ['cityCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id City Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cityCategory = $this->CityCategories->get($id);
        if ($this->CityCategories->delete($cityCategory)) {
            $this->Flash->success(__('The city category has been deleted.'));
        } else {
            $this->Flash->error(__('The city category could not be deleted. Please, try again.'));
        }

         return $this->redirect(['controller'=>'cities', 'action' => 'view', $this->request->session()->read('Config.city_id')]);
    }

    public function getCategorydata($city_id=null,$id=null){
        if($this->request->params['_ext'] == 'json') {
            $conn = ConnectionManager::get('default');
            $categories = $conn->execute("SELECT * FROM (
            SELECT '' AS item_id, city_id, city_category_id, listing_type_id, listing_type, title AS heading FROM item_listings il
            LEFT JOIN listing_types lt
            ON il.listing_type_id=lt.id WHERE city_id=".$city_id."  AND city_category_id=".$id."  AND listing_type_id <> '4'
            GROUP BY il.listing_type_id ) AS a
            UNION
            SELECT item_id, city_id, city_category_id, listing_type_id, (SELECT listing_type FROM listing_types lt WHERE lt.id=il.listing_type_id) listing_type, heading
            FROM item_listings il  LEFT JOIN items i
            ON il.item_id=i.id  WHERE il.listing_type_id=4 AND city_id=".$city_id."  AND city_category_id=".$id."");

            $categories_listing = $categories ->fetchAll('assoc');
            $this->set('category_listing', $categories_listing);
            $this->set('_serialize', ['category_listing']);
        }
    }

    public function getCityName($city_name=null){
        // $term = $this->request->query['city_name'];

        $query = $this->CityCategories->find('all')
        ->where(['Cities.name' => $city_name])
        ->contain([
            'Cities'
        ]);
        $city_id;
        foreach ($query as $row) {
            $city_id = $row->city_id;
        }
        if(!empty($city_id)){
            $this->request->session()->write('Config.city_id', $city_id);
            $this->set('city_id', $city_id);
            $this->set('_serialize', ['city_id']);
        }
    }

    public function viewresult()
    {
        $this->autoRender = false ;
        if ($this->request->is('ajax')) {
            $term = $this->request->query['term'];

            $query = $this->CityCategories->find('all')
            ->where(['Cities.name' => $term])
            ->contain([
                'Cities'
            ]);

            $data = array();
            $city_id;
            foreach ($query as $row) {
                $city_id = $row->city_id;
                array_push($data, $row->city_id);
            }
        }
        if(!empty($city_id)){
            $this->request->session()->write('Config.city_id', $city_id);
             $this->request->session()->write('Config.city_name', $term);
            echo true;
        }else{
           echo false;
        }


    }

    public function listing($id=null,$listing_type_id=null)
    {
        if($this->request->params['_ext'] == 'json') {
            $next_month = date('m', strtotime('+1 month'));
            $date = date('m');
            $conn = ConnectionManager::get('default');

            if($listing_type_id ==1){

                $categories = $conn->execute("select  distinct date_format(event_start, '%Y%m') as date from (
                SELECT (SELECT meta_value FROM item_metas im LEFT JOIN metas m ON im.meta_id=m.id 
                WHERE im.item_id=i.id AND m.meta_name='event_start_date') AS event_start
                FROM items i LEFT JOIN item_listings il
                ON i.id=il.item_id WHERE il.listing_type_id=".$listing_type_id." AND il.city_category_id=".$id."
                ) a");

                $categories_listing = $categories ->fetchAll('assoc');
                $item_data = array();
                $i=0;
                $item_listing = array();

                foreach($categories_listing as $p=>$value){
                    if($value['date'] !=null){
                        $year = substr($value['date'], -6,-2);
                        $month = substr($value['date'], -2);
                        $categories = $conn->execute("SELECT il.item_id,i.* FROM items as i 
                         LEFT JOIN item_listings as il ON il.item_id = i.id
                         LEFT JOIN item_metas as im ON i.id = im.item_id
                         LEFT JOIN metas as m ON m.id = im.meta_id WHERE il.listing_type_id=".$listing_type_id." AND il.city_category_id=".$id." AND Month(im.meta_value) = ".$month." And Year(im.meta_value) = ".$year." GROUP BY il.item_id ORDER BY i.sponsered DESC");
                        $item_listing[$month."-".$year]= $categories ->fetchAll('assoc');
                    }
                }

                foreach($item_listing as $p=>$value){
                    if(!empty($value)){
                        $item_data[$i]["Month"] = $p;
                        $j=0;
                        foreach($value as $q){
                            $data =  $conn->execute("SELECT im.meta_value,m.meta_name, Month(im.meta_value) FROM items as i 
                                    LEFT JOIN item_metas as im ON i.id = im.item_id
                                    LEFT JOIN metas as m ON m.id = im.meta_id WHERE i.id=".$q['item_id']);
                            $meta_data = $data ->fetchAll('assoc');
                            $item_data[$i]["item_data"][$j] = array("data"=>array($q),"meta_data"=>array($meta_data));
                            $j++;
                        }
                        $i++;
                    }else{
                        $item_data[$i] = [];
                    }
               }
            }
            if($listing_type_id ==2 || $listing_type_id ==3){
                $categories = $conn->execute("SELECT * FROM item_listings  as il
                LEFT JOIN items as i ON i.id = il.item_id
                WHERE il.listing_type_id=".$listing_type_id." AND il.city_category_id=".$id." ORDER BY i.sponsered DESC");
                $item_data = $categories ->fetchAll('assoc');
            }
            if($listing_type_id ==4){
                $categories = $conn->execute("SELECT * FROM item_listings  as il
                LEFT JOIN items as i ON i.id = il.item_id
                WHERE il.listing_type_id=".$listing_type_id." AND il.city_category_id=".$id);
                $item_data = $categories ->fetchAll('assoc');
            }
          
            $this->set('category_listing', $item_data);
            $this->set('_serialize', ['category_listing']);

        }else{
            $this->loadModel('ListingTypes');
            $this->loadModel('ItemListings');
            $listingTypes = $this->ListingTypes->find('all');
            # get first item of listing type (Default, 01st tab)
            $listing_id = "";
            $listing_title = "";
            foreach ($listingTypes as $listingType):
                $listing_id = $listingType->id;
                $listing_title = $listingType->title;
                break;
            endforeach;

            # Receive listing type from query string (For other tabs)
            if(isset($this->request->params['pass']['1'])) {
                $request_listing_id = $this->request->params['pass']['1'];

                $request_listing_title = $this->ListingTypes->find('all')
                ->where(['id' => $request_listing_id]);
                $request_listing_title = $request_listing_title->toArray();
                if(!empty($request_listing_title)) {
                $listing_title = $request_listing_title[0]->title;
                $listing_id = $request_listing_id;
                }

            }
            $this->set('listingTypes', $listingTypes);
            $this->set("listing_title", $listing_title);
            # Get city id from query string. If empty check session
            # Get city id from query string. If empty check session
            $city_id = $this->request->query('city_id');
            if(empty($city_id))
                $city_id = $this->request->data('city_id');
            if(empty($city_id))
                $city_id = $this->request->Session()->read('Config.city_id');

            # Dont move further untill city is not known
            if(empty($city_id)) {
                return $this->redirect(['controller' => 'dashboards']);
            }

            $this->paginate = [
            'conditions' => [
                'itemListings.city_id' => $city_id,
                 'itemListings.listing_type_id' => $listing_id,
                 'itemListings.city_category_id' => $id,
            ],
            'contain' => ['CityCategories', 'ListingTypes', 'Items']
            ];

            $itemListings = $this->paginate('itemListings');
            //print_r($itemListings); exit;
            $this->set(compact('itemListings'));
            $this->set('_serialize', ['itemListings']);
            $this->set('city_cat_id', $id);
        }
		
	}
}
