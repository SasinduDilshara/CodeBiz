<?php $this->setSiteTitle('Select User'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class = "card border-primary mb-3" style="max-width: 30rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center"> Search </div>
	<div class="card-body">
		<form class="form" action=<?=$this->postAction?> method="post">
 			<?= input_block('text','Type the username','username','',['class'=>'form-control'],['class'=>'form-group']) ?>
			<div class="form-group" style="text-align: center;">
				<?= submitBlock('Search',['class'=>'btn btn-primary']) ?>
			</div>
			<div class = "form-group text-right">
				
			</div>
	</div>
</div>

<?php $this->end(); ?>