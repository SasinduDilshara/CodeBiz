

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Fullscreen Background Image Slideshow with CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
        <meta name="keywords" content="css3, css-only, fullscreen, background, slideshow, images, content" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?=PROOT?>css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?=PROOT?>css/style1.css" />
		<script type="text/javascript" src="<?=PROOT?>js/modernizr.custom.86080.js"></script>
    </head>
    <body id="page">
        <ul class="cb-slideshow">
            <li><span>Image 01</span><div><h3>cleaning</h3></div></li>
            <li><span>Image 02</span><div><h3>laundry</h3></div></li>
            <li><span>Image 03</span><div><h3>catering</h3></div></li>
            <li><span>Image 04</span><div><h3>request</h3></div></li>
            <li><span>Image 05</span><div><h3>chat</h3></div></li>
            <li><span>Image 06</span><div><h3>enjoy</h3></div></li>
        </ul>
        <?php include 'main_menu_3.php' ?>
    <?php if(currentUser()) include 'notificationbar.php' ?>
    <!-- <div class="container-fluid" style="min-height:cal(100% - 125px);"> <-->

       <?= $this->content('body'); ?>
    </body>
</html>