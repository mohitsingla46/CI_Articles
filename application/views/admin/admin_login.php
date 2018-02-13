<?php include('admin_header.php'); ?>

<div class="container">
		<?= form_open('admin/login',['class'=>'form-horizontal']); ?>
  <fieldset>
    <legend>Admin Login</legend>
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

<?php include('admin_footer.php'); ?>