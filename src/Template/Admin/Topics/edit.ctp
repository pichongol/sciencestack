
<? echo $this->Form->create($topic); ?>
  <? echo $this->Form->input('id', ['type' => 'hidden']); ?>
  <div class="form-group">
    <? echo $this->Form->input('name', ['class' => 'form-control']); ?>
  </div>
  <div class="form-group">
    <? echo $this->Form->label('text', 'Description'); ?>
    <? echo $this->Form->textarea('text', ['class' => 'form-control']); ?>
  </div>
  <div class="form-group">
    <? echo $this->Form->select('category', $categoryOptions); ?>
  </div>

  <div class="form-group">
    <? echo $this->Form->input('search-parent-topic', ['class' => 'form-control']); ?>
  </div>

  <button type="submit" class="btn btn-default">Edit Topic</button>

<?= $this->Form->end(); ?>
