<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Weather Information Dissemination System</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
        <meta name="google" content="notranslate">
        <meta name="robots" content="noindex, nofollow">
        <link rel="icon" href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAqElEQVRYR+2WYQ6AIAiF8W7cq7oXd6v5I2eYAw2nbfivYq+vtwcUgB1EPPNbRBR4Tby2qivErYRvaEnPAdyB5AAi7gCwvSUeAA4iis/TkcKl1csBHu3HQXg7KgBUegVA7UW9AJKeA6znQKULoDcDkt46bahdHtZ1Por/54B2xmuz0uwA3wFfd0Y3gDTjhzvgANMdkGb8yAyY/ro1d4H2y7R1DuAOTHfgAn2CtjCe07uwAAAAAElFTkSuQmCC">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,700italic">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/adminlte.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck/css/blue.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/skins/_all-skins.min.css">

    </head>
    <body class="hold-transition login-page">
        <div class="login-box">

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
            <div class="login-logo">
                <a href="#"><b>Dissemination System</b> </a>
            </div>

            <div class="login-box-body">
	<div style = "text-align: right;" ><a href="<?php echo base_url() ?>" ><button class="btn" ><i class="fa fa-close"></i></button></a></div>
                <p class="login-box-msg"><?php echo "Log In"; ?></p>
               <?php if($this->session->flashdata('error')){?>
			      <?php echo $this->session->flashdata('error');?> 
		             <?php }  

                      echo form_open('index.php/auth/login');?>
                    <div class="form-group has-feedback">
					    <?php echo form_error('identity') ?>
						<input type="email" class="form-control" name="identity" placeholder = "Email" id="identity" value="<?php echo $identity; ?>" /> <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
					<?php echo form_error('password') ?>
						<input type="password" class="form-control" name="password" id="password" placeholder = "password" value="<?php echo $password; ?>" />
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?><?php //echo lang('auth_remember_me'); ?> Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <?php echo form_submit('submit', 'Login', array('class' => 'btn btn-primary btn-block btn-flat'));?>
                        </div>
                    </div>
                <?php echo form_close();?>

<p><a href="forgot_password">forgot password?<?php echo lang('login_forgot_password');?></a></p>
<?php if ($forgot_password == TRUE): ?>
                <?php echo anchor('#', lang('auth_forgot_password')); ?><br />
<?php endif; ?>

            </div>
        </div>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/frameworks/adminlte/css/adminlte.min.css">

        <script src="<?php echo base_url() ?>assets/frameworks/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/frameworks/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/icheck/js/icheck.min.js"></script>
        <script>
            $(function(){
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%'
                });
            });
        </script>
    </body>
</html>
