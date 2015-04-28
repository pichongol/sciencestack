<script>
var relatedProjects = [];
var roles = <?=json_encode($roles);?>
</script>

<? //print_r($developer); exit; ?>

<? echo $this->Form->create($developer, ['enctype' => 'multipart/form-data']); ?>
  <? echo $this->Form->input('id', ['type' => 'hidden']); ?>
  <div class="form-group">
    <? echo $this->Form->input('first_name', ['class' => 'form-control']); ?>
  </div>
  <hr />
  <div class="form-group">
    <? echo $this->Form->input('last_name', ['class' => 'form-control']); ?>
  </div>
  <hr />

  <div class="form-group">
    <? echo $this->Form->label('submittedfile', 'Image'); ?>
    <? echo $this->Form->file('submittedfile'); ?>
    <img src="/img/developers/<?=$developer->id?>.jpg" />
  </div>
  <hr />

  <div class="form-group">
    <? echo $this->Form->label('biography', 'Biography'); ?>
    <? echo $this->Form->textarea('biography', ['class' => 'form-control']); ?>
  </div>
  <hr />

  <div class="form-group">
    <?
    echo $this->Form->label('gender', 'Gender');
    $options = ['M' => 'Male', 'F' => 'Female'];
    echo $this->Form->select('gender', $options, ['class' => 'form-control', 'empty' => true]);
    ?>
  </div>
  <hr />

  <div class="form-group">
    <? echo $this->Form->input('born_date', ['class' => 'form-control', 'empty' => true, 'default' => '', 'minYear' => 1300, 'maxYear' => date('Y')]); ?>
  </div>
  <hr />

  <div class="form-group">
    <? echo $this->Form->input('died_date', ['class' => 'form-control', 'empty' => true, 'default' => '', 'minYear' => 1300, 'maxYear' => date('Y')]); ?>
  </div>
  <hr />

  <div class="form-group">
    <? echo $this->Form->label('born_country', 'Born Country'); ?>
    <? echo $this->Form->select('born_country', $countries, ['class' => 'form-control', 'empty' => true]); ?>
  </div>
  <hr />

  <div class="form-group search-related-project-form-group">
    <? echo $this->Form->input('search-related-project', ['class' => 'form-control']); ?>
  </div>

  <div id="related-projects-list"></div>

  <div id="related-projects-inputs">
  <? 
  $i=0;
  foreach($developer['projects'] as $t){
    echo $this->Form->input('projects.'.$i.'.id', ['type'=>'hidden']);
    echo '<script>relatedProjects.push({id:'.$t["id"].',label:"'.$t['name'].'", start_date:"'.$this->Time->format($t['_joinData']->start_date, 'Y/M/d').'", end_date:"'.$this->Time->format($t['_joinData']->end_date, 'Y/M/d').'", rol_id:"'.$t['_joinData']->rol_id.'", finished_year:"'.$t['_joinData']->finished_year.'"});</script>';
    $i++;
  } 
  ?>
  </div>

  <div style="clear:both"></div>

  <hr />
  <button type="submit" class="btn btn-default">Edit Developer</button>

<?= $this->Form->end(); ?>
