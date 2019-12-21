

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">


        <title><?= $this->siteTitle() ?></title>


        <link rel="stylesheet" type="text/css" href="<?=PROOT?>css/bootstrap.min.css" />
        <!-- <link rel="stylesheet" type="text/css" href="<?=PROOT?>css/style1.css" /> -->
<!-- 		<script type="text/javascript" src="<?=PROOT?>js/jssor.slider-27.5.0.min"></script> -->
             <script src="<?=PROOT?>js/jQuery-2.2.4.min.js"></script>
     <script src="<?=PROOT?>js/bootstrap.min.js"></script>
     <style>
     body, html {
       height: 100%;
       margin: 0;
       font: 400 15px/1.8 "Lato", sans-serif;
       color: #777;
     }

     .bgimg-1, .bgimg-2, .bgimg-3 {
       position: relative;
       opacity: 1;
       background-attachment: fixed;
       background-position: center;
       background-repeat: no-repeat;
       background-size: cover;

     }
     .bgimg-1 {
       background-image: url("img/food1.jpg");
       min-height: 600px;
     }

     .bgimg-2 {
       background-image: url("img/Background.jpg");
       min-height: 250px;
     }

     .bgimg-3 {
       background-image: url("img/cosy2.jpg");
       min-height: 650px;
     }

     .caption {
       position: absolute;
       left: 0;
       top: 50%;
       width: 100%;
       text-align: center;
       color: #111;
       font-size: 35px;
     }

     .caption span.border {
       background-color: #3371cd;
       color: #fff;
       padding: 18px;
       font-size: 25px;
       color:#111;
       letter-spacing: 10px;



     }

     h3 {
       letter-spacing: 5px;
       text-transform: uppercase;
       font: 30px "Lato", sans-serif;
       color: #000;
     }

     /* Turn off parallax scrolling for tablets and phones */
     @media only screen and (max-device-width: 1024px) {
       .bgimg-1, .bgimg-2, .bgimg-3 {
         background-attachment: scroll;
       }
     }
     </style>
    </head>
    <body>


        <!-- <ul class="cb-slideshow">
            <li><span>Image 01</span><div><h3>cleaning</h3></div></li>
            <li><span>Image 02</span><div><h3>laundry</h3></div></li>
            <li><span>Image 03</span><div><h3>catering</h3></div></li>
            <li><span>Image 04</span><div><h3>request</h3></div></li>
            <li><span>Image 05</span><div><h3>chat</h3></div></li>
            <li><span>Image 06</span><div><h3>enjoy</h3></div></li>
        </ul> -->
        <?php include 'main_menu_3.php' ?>
    <?php if(currentUser()) include 'notificationbar.php' ?>
    <!-- <div class="container-fluid" style="min-height:cal(100% - 125px);"> <-->


       <div class="bgimg-2">
           <?= $this->content('body'); ?>
       </div>
       <div class="bgimg-2">
         <div class="caption">

         </div>
       </div>
       <div style="color: #ffffff;background-color:#002851;text-align:center;padding:50px 80px;text-align: justify;">
         <h3 class="text-white" style="text-align:center;">Your ideal boarding life is only a few taps away!</h3>
         <p font-size:40px>Are you craving for home-made food?   Wish your laundry would wash themselves?    Wouldn’t it be grand if there was someone to make your boarding place look less messy?    We’ve got the best solution right here within these fancy pages!</p>
       </div>

       <div class="bgimg-1">
         <div class="caption">
         <span class="text-white" >CATERING | LAUNDRY | CLEANING</span>
         </div>
       </div>

       <div style="color: #ffffff;background-color:#002851;text-align:center;padding:50px 80px;text-align: justify;">
         <h3 class="text-white" style="text-align:center;">ABOUT US</h3>
         <p>We are a group of four students from Department of computer Science and Engineering of University of Moratuwa. Our aim is to help find catering, cleaning and laundry services for people living in boarding places from their own neighborhood.</p>
       </div>

       <div class="bgimg-3">
         <div class="caption">
         <span class="border" style=font-size:25px;">For a homely boarding life</span>
         </div>
       </div>

    </body>
</html>
