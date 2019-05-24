<?php $this->setSiteTitle('Send Notification'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "card border-primary mb-3" style="max-width: 30rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center"> Send Notification </div>
	<div class="card-body">
		<form class="form" action=<?=$this->postAction?> method="post">
 			<?= input_block('text','Type your message','message','',['class'=>'form-control'],['class'=>'form-group']) ?>

				<?= input_block('text','To','username','',['class'=>'form-control'],['class'=>'form-group']) ?>
			
			<div class="form-group" style="text-align: center;">
				<?= submitBlock('Send Message',['class'=>'btn btn-primary']) ?>
			</div>
			<div class = "form-group text-right">
				<a href="<?=PROOT?>" class="btn btn-default"> Cancel </a>
			</div>
	</div>
</div>

<?php $this->end(); ?>