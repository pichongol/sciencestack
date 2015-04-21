
<? echo $this->Form->create($category); ?>
  <? echo $this->Form->input('id', ['type' => 'hidden']); ?>
  <div class="form-group">
    <? echo $this->Form->input('name', ['class' => 'form-control']); ?>
  </div>
  <div class="form-group">
    <? echo $this->Form->label('description', 'Description'); ?>
    <? echo $this->Form->textarea('description', ['class' => 'form-control']); ?>
  </div>

  <button type="submit" class="btn btn-default">Edit Category</button>

<?= $this->Form->end(); ?>

