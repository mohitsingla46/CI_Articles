<?php include('admin_header.php'); ?>

<div class="container">
	<?= form_open('admin/submit_article',['class'=>'form-horizontal']); ?>
	<?= form_hidden('user_id',$this->session->userdata('user_id')); ?>
  		<fieldset>
  			<legend>Add Article</legend>
            <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Title</label>
                <div class="col-lg-10">
                    <?= form_input(['name'=>'title','class'=>'form-control','placeholder'=>'Title','value'=>set_value('title')]); ?>
                    <?= form_error('title'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputBody" class="col-lg-2 control-label">Body</label>
                <div class="col-lg-10">
                    <?= form_textarea(['name'=>'body','class'=>'form-control','placeholder'=>'Body','value'=>set_value('body')]); ?>
                    <?= form_error('body'); ?>
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