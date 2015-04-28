<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ProjectsTable extends Table {

    public function initialize(array $config) {
		$this->addBehavior('Timestamp');

		$this->belongsToMany('ChildProjects', [
			'className' => "Projects",
			'through' => 'ProjectsRelationships',
			'foreignKey' => 'parent_project_id',
			'targetForeignKey' => 'child_project_id',
        ]);

		$this->belongsToMany('ParentProjects', [
			'className' => "Projects",
			'through' => 'ProjectsRelationships',
			'foreignKey' => 'child_project_id',
			'targetForeignKey' => 'parent_project_id',
        ]);

		$this->belongsToMany('Developers', [
			'joinTable' => 'projects_developers',
        ]);
    }

}

?>
