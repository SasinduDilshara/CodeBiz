
<?php $this->start('body'); ?>
<h1 class ="text-center red"> Welcome you </h1>

<?= input_block('text', 'Favourote Color:', 'favourite_color', 'red', ['class'=>'form-control'],['class'=>'form-group']); ?>

<?= submitBlock("Save",['class'=> 'btn btn-primary'],["class"=>'text-right']); ?>

<?php $this->end(); ?>