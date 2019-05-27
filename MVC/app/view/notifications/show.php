<?php $x=0;
foreach($this->messages as $message): ?>
    <a href="#"><?= $message ?></a>
    
    </div>
<?php $x++;
endforeach;
die();