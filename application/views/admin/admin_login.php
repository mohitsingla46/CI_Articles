<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <?= link_tag('assets/css/style.css'); ?>
</head>
<body>
  


<div class="container">
  <div class="row" style="margin-top: 100px;">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Admin Login</h3>
        </div>
        <div class="panel-body">
		        <?= form_open('adminlogin/login',['class'=>'form-horizontal']); ?>
            <fieldset>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <?= form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Email','value'=>set_value('email')]); ?>
                        <?= form_error('email'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                        <?= form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Password']); ?>
                        <?= form_error('password'); ?>
                    </div>
                </div>
   
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <?= form_submit(['name'=>'submitbtn','value'=>'Submit','class'=>'btn btn-primary']); ?>
                    </div>
                </div>
            </fieldset>
            <?= form_close(); ?>
        </div>
    </div>
  </div>
  <div class="col-md-3"></div>
</div>
</div>


<script type="text/javascript" src="<?= base_url('assets/js/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>
</html>