<?php if(currentUser() && currentUser()->userType == 'Provider'): ?>
<div class = "col-md-12 text-center">
<a href="<?=PROOT?>requests/select" class="btn btn-default"> Show Customer Requests </a>
</div>
<?php endif ?>