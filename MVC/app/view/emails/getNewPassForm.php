<?php $this->setSiteTitle( 'Forget Password'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<form class="form" action='<?=PROOT?>emails/getNewPassword/<?=$this->id?>' method="post">

<p>Type Your new Password here. We will send you a form to fill out</p>

<p style = "color:red;">Type Your Email here. We will send you a form to fill out</p>


	<div class="form-group col">
		<?= input_block('text','New Password','pass','',['class'=>'form-control'],['class'=>'form-group']) ?>
		<ul class="list-group" id="result"></ul>

		<div class="text-center">
            <input type="submit" class="btn btn-xs btn-primary" value="Set Password" >
        </div>

	</div>



<a href="<?=PROOT?>" class="btn btn-xs btn-default" > Back to Boardingvibes </a>
</form>

<?php $this->end(); ?>
