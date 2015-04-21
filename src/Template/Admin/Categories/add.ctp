
<? echo $this->Form->create($category); ?>
  <div class="form-group">
    <? echo $this->Form->input('name', ['class' => 'form-control']); ?>
  </div>
  <div class="form-group">
    <? echo $this->Form->label('description', 'Description'); ?>
    <? echo $this->Form->textarea('description', ['class' => 'form-control']); ?>
  </div>

  <button type="submit" class="btn btn-default">Add Category</button>

<?= $this->Form->end(); ?>

