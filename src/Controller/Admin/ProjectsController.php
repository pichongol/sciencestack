<?php
namespace App\Controller\Admin;

use App\Controller\AdminController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Project;

class ProjectsController extends AdminController {

	public function initialize(){
    	$this->loadComponent('RequestHandler');
    	$this->layout = "admin";
    	$this->set("title","Admin");
	}

	public function index() {
		$Projects = TableRegistry::get("Projects");
		$query = $Projects->find();
		$query->contain(['ChildProjects', 'ParentProjects']);

		$projects = $query->toArray();

		$this->set("projects", $projects);
    }

	public function add() {
		$Projects = TableRegistry::get("Projects");

		if($this->request->data){
			$project = $Projects->newEntity($this->request->data);
			$projects->save($Project);
		}

		$project = new Project();
		$Categories = TableRegistry::get("Categories");
		$query = $Categories->find()->all();

		$options = [];
		$categories = $query->toArray();
		foreach($categories as $category){
			$options[$category->id] = $category->name;
		}

		$this->set("project", $project);
		$this->set("categoryOptions", $options);
    }

	public function edit($id) {
		$Projects = TableRegistry::get("Projects");
		$ProjectsRelationships = TableRegistry::get("ProjectsRelationships");

		if($this->request->data){

			$ProjectsRelationships->deleteAll([
			    'child_Project_id' => $id,
			    'OR' => [['parent_project_id' => $id]],
			]);

			$project = $Projects->newEntity($this->request->data(), [
				'associated' => [
			        'ParentProjects',
			        'ChildProjects'
			   	]
			]);

			$Projects->save($project);
		}

		$query = $Projects->find()->where(['id' => $id]);
		$query->contain(['ChildProjects', 'ParentProjects']);
		$project = $query->first();

		$Categories = TableRegistry::get("Categories");
		$query = $Categories->find()->all();

		$options = [];
		$categories = $query->toArray();
		foreach($categories as $category){
			$options[$category->id] = $category->name;
		}

		$this->set("project", $project);
		$this->set("categoryOptions", $options);
    }

	public function delete($id) {
		$Projects = TableRegistry::get("Projects");

		if($id){
			$project = $Projects->find()->where(['id' => $id])->first();
			$Projects->delete($project);
		}

        return $this->redirect("/admin/projects");
    }

	public function search() {
		$Projects = TableRegistry::get("Projects");
		$term = $this->request->query['term'];

		if($term){
			$query = $Projects->find()->select(['id', 'name'])->where(['name LIKE ' => "%$term%"]);
			$projects = $query->toArray();
		}

		$output = [];
		foreach ($projects as $value) {
			$output[] = array("label" => $value->name, "value" => $value->id);
		}

		$this->set('data', $output);
    	$this->set('_serialize', 'data');
    }
}

?>