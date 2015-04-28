  <script>
  var parentProjects = [];
  var childProjects = [];
  </script>

<? echo $this->Form->create($project); ?>
  <? echo $this->Form->input('id', ['type' => 'hidden']); ?>
  <div class="form-group">
    <? echo $this->Form->input('name', ['class' => 'form-control']); ?>
  </div>
  <hr />
  <div class="form-group">
    <? echo $this->Form->label('text', 'Description'); ?>
    <? echo $this->Form->textarea('text', ['class' => 'form-control']); ?>
  </div>
  <hr />
  <div class="form-group">
    <? echo $this->Form->label('text', 'Category'); ?>
    <? echo $this->Form->select('category', $categoryOptions, ['class' => 'form-control']); ?>
  </div>
  <hr />
  <div class="form-group">
    <? echo $this->Form->input('development_start_date', ['class' => 'form-control', 'empty' => true, 'default' => '']); ?>
  </div>
  <hr />

  <div class="form-group">
    <? echo $this->Form->input('development_end_date', ['class' => 'form-control', 'empty' => true, 'default' => '']); ?>
  </div>
  <hr />

  <div class="form-group search-parent-project-form-group">
    <? echo $this->Form->input('search-parent-project', ['class' => 'form-control']); ?>
  </div>

  <div id="parent-projects-list"></div>

  <div id="parent-projects-inputs">
  <? 
  $i=0;
  foreach($project['parent_projects'] as $pt){ 
    echo $this->Form->input('parent_projects.'.$i.'.id', ['type'=>'hidden']);
    echo '<script>parentProjects.push({id:'.$pt["id"].',label:"'.$pt['name'].'"});</script>';
    $i++;
  } 
  ?>
  </div>

  <div style="clear:both"></div>
  <hr />

  <div class="form-group search-child-project-form-group">
    <? echo $this->Form->input('search-child-project', ['class' => 'form-control']); ?>
  </div>

  <div id="child-projects-list"></div>

  <div id="child-projects-inputs">
  <? 
  $i=0;
  foreach($project['child_projects'] as $ct){ 
    echo $this->Form->input('child_projects.'.$i.'.id', ['type'=>'hidden']);
    echo '<script>childProjects.push({id:'.$ct["id"].',label:"'.$ct['name'].'"});</script>';
    $i++;
  } 
  ?>
  </div>

  <div style="clear:both"></div>

  <hr />
  <button type="submit" class="btn btn-default">Edit Project</button>

<?= $this->Form->end(); ?>
