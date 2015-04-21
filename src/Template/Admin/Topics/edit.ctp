  <script>
  var parentTopics = [];
  var childTopics = [];
  </script>

<? echo $this->Form->create($topic); ?>
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

  <div class="form-group search-parent-topic-form-group">
    <? echo $this->Form->input('search-parent-topic', ['class' => 'form-control']); ?>
  </div>

  <div id="parent-topics-list"></div>

  <div id="parent-topics-inputs">
  <? 
  $i=0;
  foreach($topic['parent_topics'] as $pt){ 
    echo $this->Form->input('parent_topics.'.$i.'.id', ['type'=>'hidden']);
    echo '<script>parentTopics.push({id:'.$pt["id"].',label:"'.$pt['name'].'"});</script>';
    $i++;
  } 
  ?>
  </div>

  <div style="clear:both"></div>
  <hr />

  <div class="form-group search-child-topic-form-group">
    <? echo $this->Form->input('search-child-topic', ['class' => 'form-control']); ?>
  </div>

  <div id="child-topics-list"></div>

  <div id="child-topics-inputs">
  <? 
  $i=0;
  foreach($topic['child_topics'] as $ct){ 
    echo $this->Form->input('child_topics.'.$i.'.id', ['type'=>'hidden']);
    echo '<script>childTopics.push({id:'.$ct["id"].',label:"'.$ct['name'].'"});</script>';
    $i++;
  } 
  ?>
  </div>

  <div style="clear:both"></div>

  <button type="submit" class="btn btn-default">Edit Topic</button>

<?= $this->Form->end(); ?>
