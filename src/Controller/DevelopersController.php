<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Model\Entity\Developer;

class DevelopersController extends AppController {
    public $helpers = array('Time');

	public function initialize(){
    	$this->loadComponent('RequestHandler');
    	$this->set("title","Developers");
	}

	public function index() {
		$Developers = TableRegistry::get("Developers");
		$query = $Developers->find();

		$developers = $query->toArray();

		$this->set("developers", $developers);
    }

	public function view($id) {
		$Developers = TableRegistry::get("Developers");
		$ProjectsDevelopers = TableRegistry::get("ProjectsDevelopers");

		$query = $Developers->find()->where(['id' => $id]);
		$query->contain(['Projects']);
		$developer = $query->first();

		foreach ($developer->projects as &$project) {
			$project->developers = $ProjectsDevelopers->getDevelopersInSameProject($project->id, $id);
		}

		$countries = getCountries();
		$roles = getRoles();

		$this->set("countries", $countries);
		$this->set("roles", $roles);
		$this->set("developer", $developer);
    }
}

?>