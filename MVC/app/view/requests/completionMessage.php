<?php $this->setSiteTitle( 'Request Completed'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "alert alert-primary" style="max-width: 30rem; margin:auto; top:5rem;">
    <button type="button" class="close" onclick="window.history.back();" ?>&times;</button>
	<div class="card-body">
        <p class="mb-0"> Your completion has been inform to <?= $this->servicer->username ?> <br>
        <a class="alert-link" href="<?=PROOT?>register/confirmed/<?= $this->servicer->id ?>/<?= $this->request->id ?>"> Rate servicer </a>
        </p>
	</div>
</div>
<p>  </p>

<?php $this->end(); ?>