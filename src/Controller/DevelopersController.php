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

		$query = $Developers->find()->where(['id' => $id]);
		$query->contain(['Topics']);
		$developer = $query->first();

		$this->set("developer", $developer);
    }
}

?>