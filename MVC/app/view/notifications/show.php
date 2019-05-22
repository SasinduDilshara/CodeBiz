<?php $this->setSiteTitle('Notifications'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:2rem;padding-top:5rem;">Recent Notifications</div>
<div class = "" style="max-width: 50rem; margin:auto; top:5rem;">
<?php $x=0;
foreach($this->messages as $message): ?>
    <div class="alert alert-dismissible alert-light">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?= $message ?>
    </div>
<?php $x++;
    if($x==15): break; endif;
endforeach; ?>

<a href="<?=PROOT?>notifications/clear" class="btn btn-xs btn-danger" > Delete Notifications </a>
</div>

<?php $this->end() ?>