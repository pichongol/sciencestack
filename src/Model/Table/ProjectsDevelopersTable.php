<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ProjectsDevelopersTable extends Table {

    public function initialize(array $config) {
		$this->addBehavior('Timestamp');

		$this->belongsTo('Developers');
		$this->belongsTo('Projects');
    }

    public function getDevelopersInSameProject($projectId, $developerId){
		$query = $this->find()->where(['project_id' => $projectId, 'developer_id !=' => $developerId]);
		$query->contain(['Developers']);
		return $query->toArray();
    }
}

?>
