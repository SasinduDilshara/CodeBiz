<?php $this->setSiteTitle('Messages'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<?php foreach($this->messages as $message): ?>

<p> <?= $message ?> </p>
<?php endforeach; ?>

<?php $this->end() ?>