<div class="page-header">
  <h1>Create an Account</h1>
</div>

<?= $this->Form->create('User') ?>
<?= $this->Form->input('first_name', array('autofocus'=>'true')); ?>
<?= $this->Form->input('last_name') ?>
<?= $this->Form->input('email') ?>
<?= $this->Form->input('username') ?>
<?= $this->Form->input('password') ?>
<?= $this->Form->end(__('Submit')) ?>
