<?php $this->setSiteTitle('Messages'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<?php foreach($this->messages as $message): ?>

<p> <?= $message ?> </p>
<?php endforeach; ?>

<a href="<?=PROOT?>messages/clear" class="btn btn-xs btn-default" > Delete Notifications </a>

<?php $this->end() ?>