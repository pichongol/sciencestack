<?php
namespace App\Controller\Admin;

use App\Controller\AdminController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Developer;

class DevelopersController extends AdminController {

	public function initialize(){
    	$this->loadComponent('RequestHandler');
    	$this->layout = "admin";
    	$this->set("title","Admin");
	}

	public function index() {
		$Developers = TableRegistry::get("Developers");
		$query = $Developers->find();

		$developers = $query->toArray();

		$this->set("developers", $developers);
    }

	public function add() {
		$Developers = TableRegistry::get("Developers");

		if($this->request->data){
			$developer = $Developers->newEntity($this->request->data);
			$Developers->save($developer);
		}

		$developer = new Developer();
		$countries = getCountries();

		$this->set("countries", $countries);
		$this->set("developer", $developer);
        //return $this->redirect("/admin/developers/edit/");
    }

	public function edit($id) {
		$Developers = TableRegistry::get("Developers");

		if($this->request->data){
			$developer = $Developers->newEntity($this->request->data(), [
				'associated' => [
			   	]
			]);

			$Developers->save($developer);
		}

		$countries = getCountries();

		$query = $Developers->find()->where(['id' => $id]);
		$developer = $query->first();

		$this->set("countries", $countries);
		$this->set("developer", $developer);
    }

	public function delete($id) {
		$Developers = TableRegistry::get("Developers");

		if($id){
			$developer = $Developers->find()->where(['id' => $id])->first();
			$Developers->delete($developer);
		}

        return $this->redirect("/admin/developers");
    }
}

?>