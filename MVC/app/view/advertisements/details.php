<?php $this->setSiteTitle($this->advertisement->topic) ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>

<div class="card border-primary mb-3" style="max-width: 30rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center;padding-top: 5px;padding-bottom: 5px;">
		Details
	</div>
	
	<div class="card-body" style="background-color:#fdfdfe">
		<h4><?=$this->advertisement->topic?></h4>
		<table class="table table-hover">
			<thead>
				<tr>
				<td><strong>  Service Type :</strong></td>
				<td><?=$this->advertisement->type?></td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Description :</strong></td>
				<td><?=$this->advertisement->description?></td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Location :</strong></td>
				<td><?=$this->advertisement->area?></td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Delivery :</strong></td>
				<td><?=$this->advertisement->delivery?></td>
				</tr>
			</thead>
			<thead>
				<tr>
				<td><strong>  Schedule :</strong></td>
				<td><?=$this->advertisement->schedule?></td>
				</tr>
			</thead>
			<?php switch($this->advertisement->type):
				case 'Cleaning':?>
					<!-- fields unique for cleaning -->
					<?php break;
				case 'Catering':?>
					<thead>
						<tr>
						<td><strong>  Capacity :</strong></td>
						<td><?=$this->advertisement->capacity?></td>
						</tr>
					</thead>
					<thead>
						<tr>
						<td><strong>  Menu :</strong></td>
						<td><?=$this->advertisement->menu?></td>
						</tr>
					</thead>
					<?php break;
				case 'Laundering':?>
					<thead>
						<tr>
						<td><strong>  Capacity :</strong></td>
						<td><?=$this->advertisement->capacity?></td>
						</tr>
					</thead>
					<?php break;
			endswitch?>
		</table>
		<div class = "form-group text-right">
			<a onclick="window.history.back();" class="btn btn-default"> Back </a>
		</div>
	</div>
</div>

<?php $this->end(); ?>