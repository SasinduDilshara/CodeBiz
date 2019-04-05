<?php if(currentUser()->userType == 'Customer' || currentUser()->userType == 'Provider'): ?>
<div class = "col-md-12 text-center">
<a href="<?=PROOT?>messages/show" class="btn btn-default"> Show Messages </a>
</div>
<?php endif ?>