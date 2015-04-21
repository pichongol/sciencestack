<?php
namespace App\Controller\Admin;

use App\Controller\AdminController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Topic;

class TopicsController extends AdminController {

	public function initialize(){
    	$this->loadComponent('RequestHandler');
    	$this->layout = "admin";
    	$this->set("title","Admin");
	}

	public function index() {
		$Topics = TableRegistry::get("Topics");
		$query = $Topics->find();
		$query->contain(['ChildTopics', 'ParentTopics']);

		$topics = $query->toArray();

		$this->set("topics", $topics);
    }

	public function add() {
		$Topics = TableRegistry::get("Topics");

		if($this->request->data){
			$topic = new Topic($this->request->data);
			$Topics->save($topic);
		}

		$topic = new Topic();
		$Categories = TableRegistry::get("Categories");
		$query = $Categories->find()->all();

		$options = [];
		$categories = $query->toArray();
		foreach($categories as $category){
			$options[$category->id] = $category->name;
		}

		$this->set("topic", $topic);
		$this->set("categoryOptions", $options);
    }

	public function edit($id) {
		$Topics = TableRegistry::get("Topics");

		if($this->request->data){
			$topic = new Topic($this->request->data);
			$Topics->save($topic);
		}

		$topic = $Topics->find()->where(['id' => $id])->first();

		$Categories = TableRegistry::get("Categories");
		$query = $Categories->find()->all();

		$options = [];
		$categories = $query->toArray();
		foreach($categories as $category){
			$options[$category->id] = $category->name;
		}

		$this->set("topic", $topic);
		$this->set("categoryOptions", $options);
    }

	public function delete($id) {
		$Topics = TableRegistry::get("Topics");
		$topicId = $this->request->params['pass'][0];

		if($topicId){
			$topic = $Topics->find()->where(['id' => $topicId])->first();
			$Topics->delete($topic);
		}

        return $this->redirect("/admin/topics");
    }

	public function search() {
		$Topics = TableRegistry::get("Topics");
		$term = $this->request->query['term'];

		if($term){
			$query = $Topics->find()->select(['id', 'name'])->where(['name LIKE ' => "%$term%"]);
			$topics = $query->toArray();
		}

		$this->set('data', $topics);
    	$this->set('_serialize', 'data');
    }
}

?>