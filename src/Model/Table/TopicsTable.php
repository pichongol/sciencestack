<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class TopicsTable extends Table {

    public function initialize(array $config) {
		$this->addBehavior('Timestamp');

		$this->belongsToMany('ChildTopics', [
			'className' => "Topics",
			'through' => 'TopicsRelationships',
			'foreignKey' => 'parent_topic_id',
			'targetForeignKey' => 'child_topic_id',
        ]);

		$this->belongsToMany('ParentTopics', [
			'className' => "Topics",
			'through' => 'TopicsRelationships',
			'foreignKey' => 'child_topic_id',
			'targetForeignKey' => 'parent_topic_id',
        ]);
    }

}

?>
