<?php $this->setSiteTitle($this->request->service); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="card border-primary mb-3" style="max-width: 40rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center"> Details </div>
	<div class="card-body" style="background-color:#fdfdfe">
		<h4><?= $this->request->service; ?></h4>
		<table class="table table-hover">
			<thead>
			<tr>
				<td><strong> Customer :</strong></td>
				<td><?=$this->request->customer?></td>
				</tr>
				<tr>
				<td><strong>  Description :</strong></td>
				<td><?=$this->request->description?></td>
				</tr>
				<tr>
				<td><strong>  Location :</strong></td>
				<td><?=$this->request->area?></td>
				</tr>
			</thead>
		</table>
		<div class = "form-group text-right">
			<a onclick="window.history.back();" class="btn btn-default"> Back </a>
		</div>
	</div>
</div>

<?php $this->end(); ?>