<script>
var relatedTopics = [];
</script>

<? echo $this->Form->create($developer); ?>
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
    <? echo $this->Form->label('biography', 'Biography'); ?>
    <? echo $this->Form->textarea('biography', ['class' => 'form-control']); ?>
  </div>
  <hr />

  <div class="form-group">
    <? echo $this->Form->input('born_date', ['class' => 'form-control', 'empty' => true, 'default' => '']); ?>
  </div>
  <hr />

  <div class="form-group">
    <? echo $this->Form->input('died_date', ['class' => 'form-control', 'empty' => true, 'default' => '']); ?>
  </div>
  <hr />

  <div class="form-group">
    <? echo $this->Form->label('born_country', 'Born Country'); ?>
    <? echo $this->Form->select('born_country', $countries, ['class' => 'form-control', 'empty' => true]); ?>
  </div>
  <hr />

  <div class="form-group search-related-topic-form-group">
    <? echo $this->Form->input('search-related-topic', ['class' => 'form-control']); ?>
  </div>

  <div id="related-topics-list"></div>

  <div id="related-topics-inputs">
  <? 
  $i=0;
  foreach($developer['topics'] as $t){
    echo $this->Form->input('topics.'.$i.'.id', ['type'=>'hidden']);
    echo '<script>relatedTopics.push({id:'.$t["id"].',label:"'.$t['name'].'", start_date:"'.$this->Time->format($t['_joinData']->start_date, 'Y/M/d').'", end_date:"'.$this->Time->format($t['_joinData']->end_date, 'Y/M/d').'"});</script>';
    $i++;
  } 
  ?>
  </div>

  <div style="clear:both"></div>

  <hr />
  <button type="submit" class="btn btn-default">Edit Developer</button>

<?= $this->Form->end(); ?>
