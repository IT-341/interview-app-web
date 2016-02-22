<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Show/Edit User</h1>
    </div>
</div>
<div class="row">
	<form role="form" method="post" action="<?= $this->Url->build([
        "action" => "update",
        $user->_id
    ]); ?>">
	    <div class="form-group">
	        <label class="control-label">Username</label>
		    <input type="text" name="username" class="form-control" disabled value="<?= $user->username ?>">
	    </div>
	    <div class="form-group">
	        <label class="control-label">First name</label>
		    <input type="text" name="firstname" class="form-control" disabled value="<?= $user->firstname ?>">
	    </div>
	    <div class="form-group">
	        <label class="control-label">Last name</label>
		    <input type="text" name="lastname" class="form-control" disabled value="<?= $user->lastname ?>">
	    </div>
	    <div class="form-group">
	        <label class="control-label">E-mail</label>
		    <input type="text" name="email" class="form-control" disabled value="<?= $user->email ?>">
	    </div>
	    <div class="show-buttons">
	    	<button type="button" id="btnEdit" class="btn btn-primary">Edit</button>
	    	<a href="<?= $this->Url->build([
		        "action" => "delete",
		        $user->_id
		    ]); ?>" id="btnDelete" class="btn btn-danger">Delete</a>
	    </div>
	    <div class="edit-buttons" style="display: none;">
	    	<button type="button" id="btnCancel" class="btn btn-danger">Cancel</button>
	    	<button type="submit" id="btnSave" class="btn btn-primary">Save</button>
	    </div>
	</form>
</div>

<?= $this->Html->script('buttons-handlers', ['block' => true]) ?>