
<? echo $this->Form->create($topic); ?>
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
    <label for="image">Image</label>
    <input type="file" id="image">
    <p class="help-block"></p>
  </div>

  <button type="submit" class="btn btn-default">Add Topic</button>

<?= $this->Form->end(); ?>

