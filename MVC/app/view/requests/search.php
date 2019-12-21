<?php $this->setSiteTitle("Search results"); ?>
<?php $this->start('body'); ?>
<div style="text-align:center;padding:5rem 0rem 1rem 0rem">
    <div class="navbar navbar-expand-sm navbar-light" style="display:inline-block;background-color:rgba(0,0,0,0.8);padding:8px;">
        <form class="form-inline my-2 my-lg-0"action="<?=PROOT?>requests/search" method="GET">
        <ul class="navbar-nav mr-auto">
                <li class="nav-item bg-light" style="padding:6px;">
                    <input type="text" name="area" id="area" class="form-control" value="<?=currentUser()->area ?>">
                </li>
                <li class="nav-item col bg-light" style="padding:6px;">
                    <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Search" >
                </li>
            </ul>
        </form>
    </div>
</div>
<?php if(sizeof($this->requests)===0):
	echo '<div class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:2rem;padding:5rem 1rem;">No Results</div>';
else: ?>
<div class = "card border-primary mb-3" style="max-width: 80rem; margin:auto;">
	<table class="table table-hover">
		<thead>
			<tr class="table-light">
			<th scope="col">Service</th>
			<th scope="col">Location</th>
			<th scope="col">Description</th>
			<th scope="col">Customer</th>
			<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($this->requests as $request): ?>
				<tr>
					<th scope="row">
						<a href="<?=PROOT?>requests/details/<?=$request->id?>"> <?= $request->service; ?></a></th>
					<td><?= $request->area; ?></td>
					<td>
						<?= $request->description; ?>
					</td>
					<td><a href="<?=PROOT?>accounts/details/<?=$request->user_id?>"><?= $request->customer; ?></a></td>
					<td>
						<?php if(!in_array((string)(currentUser()->id),explode(",",$request->providerId))):?>
							<a href="<?=PROOT?>requests/accept/<?=$request->id?>/<?=$request->user_id?>" > Accept </a>
						<?php endif; ?>
						<?php if($request->confirmProviderId == currentUser()->id):?>
							<a href="<?=PROOT?>requests/showChat/<?=$request->id?>" > Show Chat </a>
						<?php elseif(in_array((string)(currentUser()->id),explode(",",$request->providerId)) && $request->completed==0) :?>
							<a href="<?=PROOT?>requests/cancel/<?=$request->id?>/<?=$request->user_id?>" > Cancel </a>
						<?php endif; ?>
					</td>		
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php endif; ?>

<?php $this->end(); ?>