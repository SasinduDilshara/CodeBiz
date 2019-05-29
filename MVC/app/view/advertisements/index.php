
<?php $this->setSiteTitle("Advertisements"); ?>
<?php $this->start('body'); ?>
<div id="title" class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:3rem;padding-top:5rem;text-shadow: 3px 4px 5px #000;">Advertisements</div>
<div class="col" style="display: flex;flex-wrap: wrap;margin:auto;top:3rem;max-width:95%">
	<div class="form-group row">
	<?php $x=0 ?>
	<?php foreach($this->alladds as $advertisements): ?>

		<?php foreach($advertisements as $advertisement): ?>
			<?php $x = $x+1; ?>
			<div class="card border-primary mb-3" style="max-width:690px;margin:12px;width:100%">
				<div class="card-body">
				<div class="d-flex">
					<div class="p-2">
					<?php if($advertisement->type=="Cleaning"): ?>
						<div style="background: url(<?=PROOT?>img/upload/<?= $advertisement->photolink ?>) 50% 50% no-repeat, url(<?=PROOT?>img/cleaning.jpg);
							background-size: cover;
							width: 200px;
							height: 200px;
							margin: auto;
							border-radius: 50%;
							border-style: outset;"></div>
					<?php elseif($advertisement->type=="Catering"): ?>
						<div style="background: url(<?=PROOT?>img/upload/<?= $advertisement->photolink ?>) 50% 50% no-repeat, url(<?=PROOT?>img/cooking.jpg);
							background-size: cover;
							width: 200px;
							height: 200px;
							margin: auto;
							border-radius: 50%;
							border-style: outset;"></div>
					<?php elseif($advertisement->type=="Laundering"): ?>
						<div style="background: url(<?=PROOT?>img/upload/<?= $advertisement->photolink ?>) 50% 50% no-repeat, url(<?=PROOT?>img/laundry.jpg);
							background-size: cover;
							width: 200px;
							height: 200px;
							margin: auto;
							border-radius: 50%;
							border-style: outset;"></div>
					<?php endif; ?>
					</div>
					<div class="align-self-start">
					<a href="<?=PROOT?>advertisements/details/<?=$advertisement->type?>/<?=$advertisement->id?>"><h4><?= $advertisement->topic ?></h4></a>
					<p class="card-text"><h5><?= $advertisement->description ?></h5></p>
					<p class="card-text"><strong>Type : </strong><?= $advertisement->type ?></p>
					<p class="card-text"><strong>Area : </strong><?= $advertisement->area ?></p>
				</div>
				</div>
				<div class="d-flex">
				<div class="p-2">
					<form action="<?=PROOT?>advertisements/upload/<?=$advertisement->type?>/<?=$advertisement->id?>" method="POST" enctype="multipart/form-data">
						<div class="input-group mb-3" style="width:280px;">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="file" name="file">
								<label class="custom-file-label" for="file">Change Photo</label>
							</div>
							<div class="input-group-append">
								<button type="submit" name="submit" class="input-group-text">Upload</button>
							</div>
						</div>
					</form>
				</div>
					<div class="p-2">
						<a href="<?=PROOT?>advertisements/edit/<?=$advertisement->type?>/<?=$advertisement->id?>" class="btn btn-outline-secondary"> Edit </a>
					</div>
					<div class="mr-auto p-2">
						<a href="<?=PROOT?>advertisements/showAccept/<?=$advertisement->id ?>/<?=$advertisement->type?>" class="btn btn-outline-primary"> Show Acceptences </a>
					</div>
					<div class="p-2">
						<a href="<?=PROOT?>advertisements/delete/<?=$advertisement->type?>/<?=$advertisement->id?>" class="btn btn-outline-danger" onclick="if(!confirm('Are you sure you want to delete this?')){return false;}"></i> Delete </a>
					</div>
				</div>
				
				</div>
			</div>
		<?php endforeach; ?>
	<?php endforeach; ?>
	</div>
</div>
<?php if($x==0): ?>
	<script type="text/javascript">document.getElementById("title").style.display = "none";</script>
	<div class = "alert alert-primary" style="max-width: 30rem; margin:auto; top:5rem;">
    	<button type="button" class="close" onclick="window.history.back();" ?>&times;</button>
		<div class="card-body">
        	<p class="mb-0"> No Advertisements yet </p>
		</div>
	</div>
<?php endif; ?>
<?php $this->end(); ?>

