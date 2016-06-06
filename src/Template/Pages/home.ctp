    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Corporal - Bootstrap Personal & Business Theme</title>

        

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
                            <li><a href="#services"><i class="fa fa-magic"></i> <?= __('Features') ?></a></li>
                            <li><a href="#portfolio"><i class="fa fa-desktop"></i> <?= __('Screenshots') ?></a></li>
                            <!--<li><a href="#clients"><i class="fa fa-puzzle-piece"></i> <?= __('Clients') ?></a></li>-->
                            <li><a href="#about"><i class="fa fa-info"></i> <?= __('About') ?></a></li>
                            <li><a href="#contact"><i class="fa fa-envelope"></i> <?= __('Contact') ?></a></li>
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

        <img class="col-md-6 col-sm-6 col-xs-12 animated fadeInLeft" src="<?= $this->Url->build('/') ?>assets/img/hero/macbook.png" alt="">

        <div class="col-md-6 col-sm-6 col-xs-12 animated fadeInRight delay-0-5">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
        <a href="#" class="btn btn-common btn-lg">Donload Now!</a>
        <a href="#" class="btn btn-primary btn-lg">Sign Up Now For Free</a>
        </div>

</div>

    </div>
</div>
</section>

<!-- Hero Area Section End-->



<!-- Service Section -->

<section id="services">
<div class="container text-center">
<div class="row">
<h1 class="title">What we do</h1>
<h2 class="subtitle">Lorem Ipsum is simply dummy text</h2>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="service-item">
    <img src="<?= $this->Url->build('/') ?>assets/img/services/responsive.png" alt="">
    <h3>Fully Responsive</h3>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
    </div>
    </div>


    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="service-item">
    <img src="<?= $this->Url->build('/') ?>assets/img/services/bs3.png" alt="">
    <h3>Bootstrap 3</h3>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="service-item">
    <img src="<?= $this->Url->build('/') ?>assets/img/services/free.png" alt="">
    <h3>100% Free</h3>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
    </div>
    </div>

</div>
</div>
 </section>
<!-- Service Section End -->



<!-- Portfolio Section -->

    <section id="portfolio">
    <div class="container">
    <div class="row">
    <h1 class="title"><?= __('Screenshots') ?></h1>
    <h2 class="subtitle"><?= __('See how easy it is to do anything') ?></h2>



    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="portfolio-item wow fadeInLeft" data-wow-delay=".5s">
    <a href="#"><img src="<?= $this->Url->build('/') ?>assets/img/portfolio/img1.jpg" alt=""></a>
    <div class="overlay">
    <div class="icons">
    <a data-lightbox="image1" href="<?= $this->Url->build('/') ?>assets/img/portfolio/img1.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
    </div>
    </div>
    </div>
    </div>


    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="portfolio-item wow fadeInLeft" data-wow-delay=".7s">
    <a href="#"><img src="<?= $this->Url->build('/') ?>assets/img/portfolio/img2.jpg" alt=""></a>
    <div class="overlay">
    <div class="icons">
    <a data-lightbox="image1" href="<?= $this->Url->build('/') ?>assets/img/portfolio/img2.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
    </div>
    </div>
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="portfolio-item wow fadeInLeft" data-wow-delay=".9s">
    <a href="#"><img src="<?= $this->Url->build('/') ?>assets/img/portfolio/img3.jpg" alt=""></a>
    <div class="overlay">
    <div class="icons">
    <a data-lightbox="image1" href="<?= $this->Url->build('/') ?>assets/img/portfolio/img3.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
    </div>
    </div>
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInRight" data-wow-delay="1.1s">
    <div class="portfolio-item">
    <a href="#"><img src="<?= $this->Url->build('/') ?>assets/img/portfolio/img4.jpg" alt=""></a>
    <div class="overlay">
    <div class="icons">
    <a data-lightbox="image1" href="<?= $this->Url->build('/') ?>assets/img/portfolio/img4.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
    </div>
    </div>
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInRight" data-wow-delay="1.3s">
    <div class="portfolio-item">
    <a href="#"><img src="<?= $this->Url->build('/') ?>assets/img/portfolio/img5.jpg" alt=""></a>
    <div class="overlay">
    <div class="icons">
    <a data-lightbox="image1" href="<?= $this->Url->build('/') ?>assets/img/portfolio/img5.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
    </div>
    </div>
    </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInRight" data-wow-delay="1.5s">
    <div class="portfolio-item">
    <a href="#"><img src="<?= $this->Url->build('/') ?>assets/img/portfolio/img6.jpg" alt=""></a>
    <div class="overlay">
    <div class="icons">
    <a data-lightbox="image1" href="<?= $this->Url->build('/') ?>assets/img/portfolio/img6.jpg" class="preview"><i class="fa fa-search-plus fa-4x"></i></a>
    </div>
    </div>
    </div>
    </div>
      
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
    <h1 class="title">About us</h1>
    <h2 class="subtitle">Lorem Ipsum is simply dummy text</h2>

    <div class="col-md-8 col-sm-12">
    <p>
    A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.
    </p>
    </div>

    <img class="col-md-4 col-md-4 col-sm-12 col-xs-12" src="<?= $this->Url->build('/') ?>assets/img/about/graph.png" alt="">

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
    <input type="text" class="form-control" placeholder="Name" name="name">
    </div>
    </div>
    <div class="form-group">
    <div class="controls">
    <input type="email" class="form-control email" placeholder="Email" name="email">
    </div>
    </div>
    <div class="form-group">
    <div class="controls">
    <input type="text" class="form-control requiredField" placeholder="Subject" name="subject">
    </div>
    </div>

    <div class="form-group">

    <div class="controls">
    <textarea rows="7" class="form-control" placeholder="Message" name="message"></textarea>
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
    A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit.<br>
    </p>
    
    </div>

    </div>
    </div>
    </section>

<!-- Conatct Section End-->


    <div id="copyright">
    <div class="container">
    <div class="col-md-10"><p>© iGenda <?= date('Y') ?> <?= __('All right reserved.') ?> <?= __('Developed by <a target="_blank" href="http://amglabs.net">AMG Labs</a>') ?></p></div>
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