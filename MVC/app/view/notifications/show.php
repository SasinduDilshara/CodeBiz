<?php $x=0;
foreach($this->messages as $message): ?>
    <a href="javascript:void(0)"><?= $message ?></a>
    
    </div>
<?php $x++;
endforeach;
die();