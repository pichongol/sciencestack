<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class AdminController extends AppController {

	public function initialize(){
		$this->set("title", "ScienceStack Admin");
		$this->layout = 'admin';
	}
}

?>