<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ProjectsRelationshipsTable extends Table {

    public function initialize(array $config) {
		$this->addBehavior('Timestamp');
    }

}

?>
