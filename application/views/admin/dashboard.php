<?php include('admin_header.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-6">
			<?= anchor('admin/submit_article','Add Article',["class"=>"btn btn-primary pull-right"]); ?>
			<br/><br/>
		</div>
	</div>
	<?php if($feedback = $this->session->flashdata('feedback')): 
			$feedback_class = $this->session->flashdata('feedback_class');
	?>
        <div class="alert alert-dismissible <?= $feedback_class; ?>">
            <?= $feedback; ?>
        </div>
    <?php endif; ?>
	<table class="table table-striped table-hover">
		<tr>
			<td>#</td>
			<td>Title</td>
			<td>Action</td>
		</tr>
		<?php if(count($articles)): ?>
			<?php foreach($articles as $article): ?>
		<tr>
			<td>1</td>
			<td><?= $article->title; ?></td>
			<td>
				<a href="#" class="btn btn-default btn-xs">Edit</a>
				<a href="#" class="btn btn-danger btn-xs">Delete</a>
			</td>
		</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="3">No Records Found</td>
			</tr>
		<?php endif; ?>
	</table>
</div>

<?php include('admin_footer.php'); ?>