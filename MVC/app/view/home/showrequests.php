<?php if(currentUser() && currentUser()->userType == 'Provider'): ?>
<div>
<a href="<?=PROOT?>requests/select" class="btn btn-default"> Show Requests </a>
</div>
<?php endif ?>