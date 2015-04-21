<?php
namespace App\Controller\Admin;

use App\Controller\AdminController;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Category;

class CategoriesController extends AdminController {

	public function index() {
		$Categories = TableRegistry::get("Categories");
		$categories = $Categories->find();

		$this->set("categories", $categories);
    }

	public function add() {
		$Categories = TableRegistry::get("Categories");

		if($this->request->data){
			$category = new Category($this->request->data);
			$Categories->save($category);
		}

		$category = new Category();
		$this->set("category", $category);
    }

	public function edit($id) {
		$Categories = TableRegistry::get("Categories");

		if($this->request->data){
			$category = new Category($this->request->data);
			$Categories->save($category);
		}

		$category = $Categories->find()->where(['id' => $id])->first();
		$this->set("category", $category);
    }

	public function delete($id) {
		$Categories = TableRegistry::get("Categories");
		$categoryId = $this->request->params['pass'][0];

		if($categoryId){
			$category = $Categories->find()->where(['id' => $categoryId])->first();
			$Categories->delete($category);
		}

        return $this->redirect("/admin/categories");
    }
}

?>