<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class DevelopersTable extends Table {

    public function initialize(array $config) {
		$this->addBehavior('Timestamp');

		$this->belongsToMany('Projects', [
			'joinTable' => 'projects_developers',
        ]);
    }

}

?>
