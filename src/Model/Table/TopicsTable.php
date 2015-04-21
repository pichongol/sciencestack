<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class TopicsTable extends Table {

    public function initialize(array $config) {
		$this->addBehavior('Timestamp');

		$this->belongsToMany('ChildTopics', [
			'className' => "Topics",
			'through' => 'TopicsRelationships',
			'targetForeignKey' => 'foreign_topic_id',
            'conditions' => ['type' => 'parent'],
        ]);

		$this->belongsToMany('ParentTopics', [
			'className' => "Topics",
			'through' => 'TopicsRelationships',
			'targetForeignKey' => 'foreign_topic_id',
            'conditions' => ['type' => 'child'],
        ]);
    }

}

?>
