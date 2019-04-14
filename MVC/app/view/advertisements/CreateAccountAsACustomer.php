<?php $this->setSiteTitle( 'Create Account'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<p> Your have to create account as a customer </p>

<?php if(!currentUser()): ?>
<a href="<?=PROOT?>register/register/Customer ?>" class="btn btn-xs btn-default"> Register </a>
<?php endif; ?>

<?php $this->end(); ?>