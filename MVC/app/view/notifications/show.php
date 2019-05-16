<?php $this->setSiteTitle('Notifications'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> Notification Details </p>

<?php foreach($this->messages as $message): ?>

<p> <?= $message ?> </p>
<?php endforeach; ?>

<a href="<?=PROOT?>notifications/clear" class="btn btn-xs btn-default" > Delete Notifications </a>

<?php $this->end() ?>