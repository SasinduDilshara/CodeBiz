<?php $this->setSiteTitle("Accepted Providers"); ?>
<?php $this->start('body'); ?>
<div class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:2rem;padding-top:5rem;"><?=$this->request->service ?></div>
<div class = "card border-primary mb-3" style="max-width: 80rem; margin:auto;">

	<table class="table table-hover">
		<thead>
			<th> Provider</th>
			<th><button type="button" class="close" onclick="location.href='<?=PROOT?>requests'">&times;</button></th>

		</thead>
	<tbody>
		<?php foreach($this->providerslist as $provider): ?>
			<tr>
				<td>
		   			<a href="<?=PROOT?>accounts/details/<?=$provider->id?>"><?= $provider->username; ?></a>
				</td>
				<td>
				<?php if($this->request->confirmProviderId == 0):?>
					<a href="<?=PROOT?>requests/confirm/<?=$this->request->id?>/<?=$provider->id?>" > Confirm </a>
				<?php endif; ?>
				<?php if((($this->request->confirmProviderId != $provider->id) && ($this->request->confirmProviderId != 0)) ):?>
					<a disable > Confirmed </a>
				<?php endif; ?>
				<?php if($this->request->confirmProviderId == $provider->id):?>
					<?php if($this->request->completed == 0): ?>
						<a href="<?=PROOT?>requests/cancelConfirm/<?=$this->request->id?>/<?=$provider->id?>" > Cancel Confirmation </a>
					<?php endif;?><?php endif;?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php $this->end(); ?>






