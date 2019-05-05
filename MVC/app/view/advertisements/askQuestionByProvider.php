<?php $this->setSiteTitle('Message'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "card border-primary mb-3" style="max-width: 30rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center"> Ask Doubts </div>
	<div class="card-body">
		<form class="form" action=<?=$this->postAction?> method="post">
 			<?= input_block('text','Type your message','chat','',['class'=>'form-control'],['class'=>'form-group']) ?>
			<?php if(currentUser()->userType == "Provider"): ?>
				<?= input_block('text','To','to','',['class'=>'form-control'],['class'=>'form-group']) ?>
			<?php endif; ?>
			<div class="form-group" style="text-align: center;">
				<?= submitBlock('Send',['class'=>'btn btn-primary']) ?>
			</div>
			<div class = "form-group text-right">
				<a onclick="window.history.back();" class="btn btn-default"> Cancel </a>
			</div>
	</div>
</div>

<?php $this->end(); ?>