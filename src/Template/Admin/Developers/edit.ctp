
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

  <button type="submit" class="btn btn-default">Edit Developer</button>

<?= $this->Form->end(); ?>
