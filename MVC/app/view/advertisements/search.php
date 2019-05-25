<?php $this->setSiteTitle("Search results"); ?>
<?php $this->start('body'); ?>
<div style="text-align:center;padding:5rem 0rem 1rem 0rem">
    <div class="navbar navbar-expand-sm navbar-light" style="display:inline-block;background-color:rgba(0,0,0,0.8);padding:8px;">
    <!-- <h3 class="text-center"> Register  </h3> -->
        <form class="form-inline my-2 my-lg-0"action="search" method="GET">
        <ul class="navbar-nav mr-auto">
                <li class="nav-item col bg-light" style="padding:12px;">
                    <div class="input-select">
                        <select data-trigger="" class="custom-select"name="type" required>
                            <option disabled selected value>I'm looking for</option>
                            <option value="Laundering" checked> Laundering</option>
                            <option value="Catering"> Catering</option>
                            <option value="Cleaning"> Cleaning</option>
                        </select>
                    </div>
                </li>
                <li class="nav-item bg-light" style="padding:12px;">
                    <input type="text" name="area" id="area" class="form-control" value="" placeholder="I live in">
                </li>
                <li class="nav-item col bg-light" style="padding:12px;">
                    <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Search" >
                </li>
            </ul>
        </form>
    </div>
</div>

<?php if(sizeof($this->advertisements)===0):
	echo '<div class="text-center text-white text-uppercase" style="font-family:Sans-serif;font-size:2rem;padding:5rem 1rem;">No Results</div>';
else: ?>
<div class = "card border-primary mb-3" style="max-width: 80rem; margin:auto;">
	<table class="table table-hover">
		<thead>
			<tr class="table-light">
			<th scope="col">Topic</th>
			<th scope="col">Description</th>
			<th scope="col">Details</th>
			<th scope="col">Location</th>
			<th scope="col">Type</th>
			<?php if(currentUser()): ?>
			<th scope="col">Provider</th>
			<th scope="col"></th>
			<?php endif; ?>
			<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($this->advertisements as $advertisement): ?>
				<?php if(currentUser()): ?>
				<?php $customer = currentUser()->findById((int)($advertisement->user_id)) ?>
				<?php endif; ?>
				<?php if(!currentUser() || $customer->username != currentUser()->username): ?>
				<tr>
					<th scope="row">
						<a href="<?=PROOT?>advertisements/details/<?=$advertisement->type?>/<?=$advertisement->id?>"><?= $advertisement->topic; ?></a></th>
					<td><?= $advertisement->description; ?></td>

											<!-- gghg -->
				<?php if(!currentUser()): ?>
					<td><a href="<?=PROOT?>accounts/details/<?=$advertisement->user_id?>">Provider Details</a></td>
					<?php endif; ?>
				
					<!-- hjhj -->

					<td><?= $advertisement->area; ?></td>
					<td><?= $advertisement->type;?></td>
					<?php if(currentUser()): ?>
					<td><a href="<?=PROOT?>accounts/details/<?=$advertisement->user_id?>"><?php if(currentUser()): ?><?= $customer->username; ?><?php endif; ?></a></td>
					<?php endif; ?>
					

					<td>
						<?php if(!currentUser() ):?>
							<a href="<?=PROOT?>register/login" onclick="if(!confirm('Please Register as a Customer')){return false;}"> Requset Service </a>
						<?php elseif(!in_array((string)(currentUser()->id),explode(",",$advertisement->CustomerId)) ):?>
							<a href="<?=PROOT?>advertisements/accept/<?=$advertisement->id?>/<?=$advertisement->user_id?>/<?=$advertisement->type?>" > Request Service </a>
						<?php elseif(in_array((string)(currentUser()->id),explode(",",$advertisement->CustomerId))) :?>
							<a href="<?=PROOT?>advertisements/cancel/<?=$advertisement->id?>/<?=$advertisement->user_id?>/<?=$advertisement->type?>" > Cancel Service </a>
						<?php endif; ?>
					</td>
					<?php if(currentUser()): ?>
					<td>
						<?php if(currentUser() && in_array((string)(currentUser()->id),explode(",",$advertisement->confirmCustomerId))):?>
							<a href="<?=PROOT?>advertisements/showChat/<?=$advertisement->id?>/<?= $advertisement->type?>" > Show Chat </a>
						<?php endif; ?>
					</td>
					<td>
						<?php if(currentUser()):?>
							<?php if(!in_array((string)(currentUser()->id),explode(",",$advertisement->reportedBy))
							):?>
							<a href="<?=PROOT?>advertisements/report/advertisements/<?=$advertisement->id?>/<?=currentUser()->id?>/<?= $advertisement->type?>" onclick="if(!confirm('Are you sure you want to report this advertisement?')){return false;}"> Report This Add </a>
						<?php endif; ?>
						<?php endif; ?>
						<?php if(in_array((string)(currentUser()->id),explode(",",$advertisement->reportedBy))
							):?>
							 Reported 
						<?php endif; ?>
					</td>
					<?php endif; ?>
				</tr>
				<?php endif; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php endif; ?>
<?php $this->end(); ?>