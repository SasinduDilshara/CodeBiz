<?php if(currentUser() && currentUser()->userType == 'Provider'): ?>
<div>
<a href="<?=PROOT?>requests/ShowConfirmRequests" class="btn btn-default"> Show Confirm Requests </a>
</div>
<?php endif ;?>