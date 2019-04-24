
<?php $this->setSiteTitle("Advertisements"); ?>
<?php $this->start('body'); ?>
<div class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:2rem;padding-top:3rem;">My Advertisements</div>
<div class="col-10" style="margin:auto;">
	<?php foreach($this->alladds as $advertisements): ?>
		<?php foreach($advertisements as $advertisement): ?>
			<div class="card border-primary mb-3" style="">
				<div class="card-body">
					<h4><?= $advertisement->topic ?></h4>
					<p class="card-text"><strong>Description : </strong><?= $advertisement->description ?></p>
					<p class="card-text"><strong>Area : </strong><?= $advertisement->area ?></p>
					<p class="card-text"><strong>Type : </strong><?= $advertisement->type ?></p>
					<a href="<?=PROOT?>advertisements/details/<?=$advertisement->type?>/<?=$advertisement->id?>" class="card-link"> Details </a>
					<a href="<?=PROOT?>advertisements/edit/<?=$advertisement->type?>/<?=$advertisement->id?>" class="card-link"> Edit </a>
					<a href="<?=PROOT?>advertisements/delete/<?=$advertisement->type?>/<?=$advertisement->id?>" class="card-link" onclick="if(!confirm('Are you sure you want to delete this?')){return false;}"></i> Delete </a>
					<a href="<?=PROOT?>advertisements/showAccept/<?=$advertisement->id ?>/<?=$advertisement->type?>" class="card-link"> Show Acceptences </a>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endforeach; ?>
</div>
<?php $this->end(); ?>

