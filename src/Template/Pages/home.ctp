<?php use Cake\I18n\I18n; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iGenda - <?= __('The Simplest and Easy CRM in the World') ?></title>

    

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?= $this->Url->build('/') ?>assets/css/bootstrap.min.css">
    
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="<?= $this->Url->build('/') ?>assets/css/main.css">

    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="<?= $this->Url->build('/') ?>assets/css/responsive.css">

    <!--Icon Fonts-->
    <link rel="stylesheet" media="screen" href="<?= $this->Url->build('/') ?>assets/fonts/font-awesome/font-awesome.min.css" />


    <!-- Extras -->
    <link rel="stylesheet" type="text/css" href="<?= $this->Url->build('/') ?>assets/extras/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= $this->Url->build('/') ?>assets/extras/lightbox.css">


    <!-- jQuery Load -->
    <script src="<?= $this->Url->build('/') ?>assets/js/jquery-min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

<body data-spy="scroll" data-offset="20" data-target="#navbar">
<!-- Nav Menu Section -->
<div class="logo-menu">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" data-spy="affix" data-offset-top="50">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header col-md-3">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
        <span class="sr-only"><?= __('Toggle navigation') ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#home"><i class="fa fa-book"></i> iGenda</a>
    </div>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav col-md-9 pull-right">
        <li class="active"><a href="#hero-area"><i class="fa fa-home"></i> <?= __('Home') ?></a></li>
        <li><a href="#features"><i class="fa fa-magic"></i> <?= __('Features') ?></a></li>
        <li><a href="#screenshots"><i class="fa fa-desktop"></i> <?= __('Screenshots') ?></a></li>
        <!--<li><a href="#clients"><i class="fa fa-puzzle-piece"></i> <?= __('Clients') ?></a></li>-->
        <li><a href="#about"><i class="fa fa-info"></i> <?= __('About') ?></a></li>
        <li><a href="#contact"><i class="fa fa-envelope"></i> <?= __('Contact') ?></a></li>
        <li>
            <?php if (I18n::locale() == 'pt_BR'): ?>
                <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'changeLanguage', 'en']) ?>"><i class="fa fa-flag"></i>
                    EN-US
                </a>
            <?php else :?>
                <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'changeLanguage', 'br']) ?>"><i class="fa fa-flag"></i>
                    PT-BR
                </a>
            <?php endif; ?>
            
        </li>
        </ul>
    </div>
  </div>
</nav>
</div>
<!-- Nav Menu Section End -->

<!-- Hero Area Section -->

<section id="hero-area">
<div class="container">
<div class="row">
<div class="col-md-12">
    <h1 class="title">iGenda</h1>
    <h2 class="subtitle"><?= __('The simplest way to manage clients, activities and deals.') ?></h2>

    <img class="col-md-6 col-sm-6 col-xs-12 animated fadeInLeft" src="<?= $this->Url->build('/') ?>assets/img/hero/<?= __('home-en.png') ?>" alt="iGenda">

    <div class="col-md-6 col-sm-6 col-xs-12 animated fadeInRight delay-0-5">
    <p><?= __('The iGenda is a CRM who came to make your life easier. It does not have features that you do not use and is super fast and easy. Register now for free or see some screenshots to see how iGenda can really change the way you work.') ?></p>
    <a href="#screenshots" class="btn btn-common btn-lg"><?= __('Some Screenshots') ?></a>
    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>" class="btn btn-primary btn-lg"><?= __('Sign Up Now') ?></a>
    </div>

</div>

</div>
</div>
</section>

<!-- Hero Area Section End-->



<!-- Service Section -->

<section id="features">
<div class="container text-center">
<div class="row">
<h1 class="title"><?= __('Features') ?></h1>
<h2 class="subtitle"><?= __('Why choose US?') ?></h2>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="service-item">
<img src="<?= $this->Url->build('/') ?>assets/img/features/1.png" alt="">
<h3><?= __('Easy to Use') ?></h3>
<p><?= __('Only the features that you really need.') ?></p>
</div>
</div>


<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="service-item">
<img src="<?= $this->Url->build('/') ?>assets/img/features/2.png" alt="">
<h3><?= __('Anywhere, Anytime') ?></h3>
<p><?= __('iGenda lives in the cloud, so this is available 24/7.') ?></p>
</div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="service-item">
<img src="<?= $this->Url->build('/') ?>assets/img/features/3.png" alt="">
<h3><?= __('Free Trial') ?></h3>
<p><?= __('Test iGenda for free and see if it meets your expectations.') ?></p>
</div>
</div>

</div>
</div>
</section>
<!-- Service Section End -->



<!-- Portfolio Section -->

<section id="screenshots">
<div class="container">
<div class="row">
<h1 class="title"><?= __('Screenshots') ?></h1>
<h2 class="subtitle"><?= __('See how easy it is to do anything') ?></h2>

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
<div class="screenshots-item wow fadeInLeft" data-wow-delay=".7s">
<a href="#"><img class="img-responsive" width="360" height="200" src="<?= $this->Url->build('/') ?>assets/img/screenshots/<?= __('screen2-en.png') ?>" alt=""></a>
<div class="overlay">
<div class="icons">
<a data-lightbox="image1" href="<?= $this->Url->build('/') ?>assets/img/screenshots/<?= __('screen2-en.png') ?>" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
</div>
</div>
</div>
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
<div class="screenshots-item wow fadeInLeft" data-wow-delay=".9s">
<a href="#"><img class="img-responsive" width="360" height="200" src="<?= $this->Url->build('/') ?>assets/img/screenshots/<?= __('screen3-en.png') ?>" alt=""></a>
<div class="overlay">
<div class="icons">
<a data-lightbox="image1" href="<?= $this->Url->build('/') ?>assets/img/screenshots/<?= __('screen3-en.png') ?>" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
</div>
</div>
</div>
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
<div class="screenshots-item wow fadeInLeft" data-wow-delay=".5s">
<a href="#"><img class="img-responsive" width="360" height="200" src="<?= $this->Url->build('/') ?>assets/img/screenshots/<?= __('screen1-en.png') ?>" alt=""></a>
<div class="overlay">
<div class="icons">
<a data-lightbox="image1" href="<?= $this->Url->build('/') ?>assets/img/screenshots/<?= __('screen1-en.png') ?>" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
</div>
</div>
</div>
</div>

<!--
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInRight" data-wow-delay="1.1s">
<div class="screenshots-item">
<a href="#"><img src="<?= $this->Url->build('/') ?>assets/img/screenshots/img4.jpg" alt=""></a>
<div class="overlay">
<div class="icons">
<a data-lightbox="image1" href="<?= $this->Url->build('/') ?>assets/img/screenshots/img4.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
</div>
</div>
</div>
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInRight" data-wow-delay="1.3s">
<div class="screenshots-item">
<a href="#"><img src="<?= $this->Url->build('/') ?>assets/img/screenshots/img5.jpg" alt=""></a>
<div class="overlay">
<div class="icons">
<a data-lightbox="image1" href="<?= $this->Url->build('/') ?>assets/img/screenshots/img5.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
</div>
</div>
</div>
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInRight" data-wow-delay="1.5s">
<div class="screenshots-item">
<a href="#"><img src="<?= $this->Url->build('/') ?>assets/img/screenshots/img6.jpg" alt=""></a>
<div class="overlay">
<div class="icons">
<a data-lightbox="image1" href="<?= $this->Url->build('/') ?>assets/img/screenshots/img6.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
</div>
</div>
</div>
</div>
-->
  
</div>
</div>
</section>
<!-- Portfolio Section End -->


<!-- Client Section -->
<!--
<section id="clients">
<div class="container">
<div class="row">

<h1 class="title">Clients</h1>
<h2 class="subtitle">Lorem Ipsum is simply dummy text</h2>

<div class="wow fadeInDown">
<img class="col-md-3 col-md-3 col-sm-3 col-xs-12" src="<?= $this->Url->build('/') ?>assets/img/clients/img1.png" alt="client-1">

<img class="col-md-3 col-md-3 col-sm-3 col-xs-12" src="<?= $this->Url->build('/') ?>assets/img/clients/img2.png" alt="client-2">

<img class="col-md-3 col-md-3 col-sm-3 col-xs-12" src="<?= $this->Url->build('/') ?>assets/img/clients/img3.png" alt="client-3">

<img class="col-md-3 col-md-3 col-sm-3 col-xs-12" src="<?= $this->Url->build('/') ?>assets/img/clients/img4.png" alt="client-4">

</div>
</div>
</div>
</section>
-->
<!-- Client Section End -->



<!-- About Section -->

<section id="about">
<div class="container">
<div class="row">
<h1 class="title"><?= __('About') ?></h1>
<h2 class="subtitle"><?= __('') ?></h2>

<div class="col-md-12 col-sm-12 text-center">
    <p><?= __('iGenda is a CRM that aims to facilitate management of clients, activities, deals and much more.  Through a simple and intuitive interface, the user has full control over everything that is happening.
') ?>
    <br>
    <p><?= __('Moreover, thanks to its responsive design you can access the iGenda anytime, anywhere and on any device, causing the iGenda stay with you throughout your day.') ?>
    <br>
    <p><?= __('With your multiuser support, you can create multiple users and set custom permissions to each user, thus ensuring greater security and control.') ?>
</div>
<!--
<img class="col-md-4 col-md-4 col-sm-12 col-xs-12" src="<?= $this->Url->build('/') ?>assets/img/about/graph.png" alt="">
-->
</div>
</div>
</section>
<!-- About Section End -->



<!-- Conatct Section -->
<section id="contact">
<div class="container text-center">
<div class="row">
<h1 class="title"><?= __('Contact us') ?></h1>

<h2 class="subtitle"><?= __('Any question? Send us a message') ?></h2>


<form role="form" class="contact-form" method="post">
<div class="col-md-6 wow fadeInLeft" data-wow-delay=".5s">
<div class="form-group">
<div class="controls">
<input type="text" class="form-control" placeholder="<?= __('Name') ?>" name="name">
</div>
</div>
<div class="form-group">
<div class="controls">
<input type="email" class="form-control email" placeholder="<?= __('Email') ?>" name="email">
</div>
</div>
<div class="form-group">
<div class="controls">
<input type="text" class="form-control requiredField" placeholder="<?= __('Subject') ?>" name="subject">
</div>
</div>

<div class="form-group">

<div class="controls">
<textarea rows="7" class="form-control" placeholder="<?= __('Message') ?>" name="message"></textarea>
</div>
</div>
<button type="submit" id="submit" class="btn btn-lg btn-common"><?= __('Send') ?></button><div id="success" style="color:#34495e;"></div>

</div>
</form>

<div class="col-md-6 wow fadeInRight">
<div class="social-links">
<a class="social" href="https://www.facebook.com/amglabs" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
<a class="social" href="https://twitter.com/amglabsnet" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
<!--
<a class="social" href="#" target="_blank"><i class="fa fa-google-plus fa-2x"></i></a>
<a class="social" href="#" target="_blank"><i class="fa fa-linkedin fa-2x"></i></a>
-->
</div>
<div class="contact-info">
<!--<p><i class="fa fa-map-marker"></i> Seattle, WA 00000, USA</p>-->
 <p><i class="fa fa-envelope"></i> alo@amglabs.net</p>
</div>

<p>
    <?= __('If you are in any doubt or difficulty regarding iGenda, send us a message. We will contact you as soon as possible.') ?>
</p>

</div>

</div>
</div>
</section>

<!-- Conatct Section End-->


<div id="copyright">
<div class="container">
<div class="col-md-10"><p>© iGenda <?= date('Y') ?> <?= __('All right reserved.') ?> <?= __('Developed by <a target="_blank" href="http://amglabs.net/en">AMG Labs</a>') ?></p></div>
<div class="col-md-2">
    <span class="to-top pull-right"><a href="#hero-area"><i class="fa fa-angle-up fa-2x"></i></a></span>
    </div>
</div>
</div>
<!-- Copyright Section End-->

    <!-- Bootstrap JS -->
    <script src="<?= $this->Url->build('/') ?>assets/js/bootstrap.min.js"></script>

        <!-- Smooth Scroll -->
                <!-- Smooth Scroll -->
    <script src="<?= $this->Url->build('/') ?>assets/js/smooth-scroll.js"></script>
    <script src="<?= $this->Url->build('/') ?>assets/js/lightbox.min.js"></script>

    <!-- All JS plugin Triggers -->
    <script src="<?= $this->Url->build('/') ?>assets/js/main.js"></script>



</body>
</html>