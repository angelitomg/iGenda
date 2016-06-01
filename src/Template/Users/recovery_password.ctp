<?php use \Cake\Core\Configure; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= Configure::read('System.title') ?> | <?= __('Recovery Password') ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>/bower_components/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= $this->Url->build('/') ?>/bower_components/AdminLTE/plugins/iCheck/square/blue.css">
  <link rel="shortcut icon" src="<?= $this->Url->build('/') ?>/favicon.ico" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?= $this->Url->build('/') ?>"><i class="fa fa-book"></i> &nbsp;<b>i</b>Genda</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg"><?= __('Recovery password') ?></p>

    <?= $this->Form->create(); ?>

      <?= $this->Flash->render() ?>

      <div class="form-group has-feedback">
        <?= $this->Form->input('email', ['label' => false, 'class' => 'form-control', 'placeholder' => __('Email')]) ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="row">

        <!--
        <div class="col-xs-6">          
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        -->
        
        <!-- /.col -->

        <div class="col-xs-12 text-center">
          <p>
            <?= $this->Form->button(__('Recovery Password'), ['class' => 'btn btn-primary btn-block btn-flat']) ?>
          </p>
        </div>
        <!-- /.col -->
      </div>
    <?= $this->Form->end() ?>

    <p> 
      <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>">
        <?php __('Back to login'); ?>
      </a>
    </p>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.0 -->
<script src="<?= $this->Url->build('/') ?>/bower_components/AdminLTE/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= $this->Url->build('/') ?>/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= $this->Url->build('/') ?>/bower_components/AdminLTE/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
