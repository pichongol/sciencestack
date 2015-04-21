<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ParentTopicsTable extends Table {

    public function initialize(array $config) {
		$this->addBehavior('Timestamp');

		$this->belongsToMany('Topics', [
            'foreignKey' => "parent_topic_id"
        ]);
    }

}

?>
