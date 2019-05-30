<?php $this->setSiteTitle("Accepted Providers"); ?>
<?php $this->start('body'); ?>
<div id="title" class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:2rem;padding-top:5rem;text-shadow: 3px 4px 5px #000;"><?=$this->request->service ?></div>
<div class = "card border-primary mb-3" style="max-width: 30rem; margin:auto;">

	<table class="table table-hover">
	<thead>
		<?php foreach($this->providerslist as $provider): ?>
			<tr>
				<td>
		   			<a href="<?=PROOT?>accounts/details/<?=$provider->id?>"><?= $provider->username; ?></a>
				</td>
				<td>
				<?php if($this->request->confirmProviderId == 0):?>
					<a class="btn btn-outline-primary" href="<?=PROOT?>requests/confirm/<?=$this->request->id?>/<?=$provider->id?>" > Confirm </a>
				<?php endif; ?>
				<?php if((($this->request->confirmProviderId != $provider->id) && ($this->request->confirmProviderId != 0)) ):?>
					<button class="btn btn-primary" disabled > Not selected </button>
				<?php endif; ?>
				<?php if($this->request->completed == 1 && $this->request->confirmProviderId == $provider->id):?>
					<button  class="btn btn-primary"disabled > Finished </button>
				<?php endif; ?>
				<?php if($this->request->confirmProviderId == $provider->id):?>
					<?php if($this->request->completed == 0): ?>
						<a class="btn btn-outline-primary" href="<?=PROOT?>requests/cancelConfirm/<?=$this->request->id?>/<?=$provider->id?>" > Cancel Confirmation </a>
					<?php endif;?><?php endif;?>
				</td>
			</tr>
		<?php endforeach; ?>
	</thead>
</table>
<?php $this->end(); ?>






