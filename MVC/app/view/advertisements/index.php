
<?php $this->setSiteTitle("Advertisements"); ?>
<?php $this->start('body'); ?>
<!-- <h1 class ="text-center red"> My Advertisements </h1> -->
<div class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:2rem;padding-top:3rem;">My Advertisements</div>
<div class = "card border-primary mb-3" style="max-width: 80rem; margin:auto;">
	<table class="table table-hover">
		<thead>
			<tr class="table-light">
			<th scope="col">Topic</th>
			<th scope="col">Description</th>
			<th scope="col">Location</th>
			<th scope="col">Type</th>
			<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($this->alladds as $advertisements): ?>
			<?php foreach($advertisements as $advertisement): ?>
				<tr>
					<th scope="row">
						<a href="<?=PROOT?>advertisements/details/<?=$advertisement->type?>/<?=$advertisement->id?>" class="card-link"><?= $advertisement->topic ?></a>
					</th>
					<td><?= $advertisement->description; ?></td>
					<td><?= $advertisement->area; ?></td>
					<td><?= $advertisement->type;?></td>
					<td>
						<a href="<?=PROOT?>advertisements/edit/<?=$advertisement->type?>/<?=$advertisement->id?>" class="card-link"> Edit </a>
						<a href="<?=PROOT?>advertisements/showAccept/<?=$advertisement->id ?>/<?=$advertisement->type?>" class="card-link"> Show Acceptences </a>
						<a href="<?=PROOT?>advertisements/delete/<?=$advertisement->type?>/<?=$advertisement->id?>" class="card-link" onclick="if(!confirm('Are you sure you want to delete this?')){return false;}"></i> Delete </a>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php $this->end(); ?>

