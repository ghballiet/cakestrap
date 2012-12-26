<div class="page-header">
  <h1>Please sign in to continue.</h1>
</div>

<?= $this->Form->create('User') ?>
<?= $this->Form->input('username', array('autofocus'=>true)) ?>
<?= $this->Form->input('password') ?>
<?= $this->Form->end('Login') ?>
