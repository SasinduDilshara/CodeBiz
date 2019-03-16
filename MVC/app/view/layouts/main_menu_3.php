<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>OOSD MVC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
 --> 

<?php
  $menu = Router::getMenu('menu_acl');
  $currentPage =currentPage();
?>

<nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
    <div class="container">
        <a class="navbar-brand" href="<?= SROOT ?>">
            <?= MENU_BRAND ?></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav nav-tabs">
                <?php foreach ($menu as $key => $value) :
                    $active = ''; ?>
                <?php if (is_array($value)) : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <?= $key ?></a>
                    <div class="dropdown-menu">
                        <?php foreach ($value as $k => $v) :
                            $active = ($v == $currentPage) ? 'active' : '' ?>
                        <?php if ($k == 'separator') : ?>
                        <div class="dropdown-divider"></div>
                        <?php else : ?>
                        <a class="<dropdown-item <?= $active ?>" href="<?= $v ?>">
                            <?= $k ?></a>
                        <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </li>
                <?php else :
                $active = ($value == $currentPage) ? 'active' : '' ?>
                <li class="nav-item"><a class="nav-link <?= $active ?>" href="<?= $value ?>">
                        <?= $key ?></a></li>
                <?php endif ?>
                <?php endforeach ?>
            </ul>

            <span class="navbar-item text-right">
                <?php if (currentUser()) : ?>
                <a href="">Hello
                    <?= currentUser()->fname ?></a>
                <?php endif ?>
            </span>
        </div>
    </div>
</nav> 