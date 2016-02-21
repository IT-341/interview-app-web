<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">New Question</h1>
    </div>
</div>
<div class="row">
	<form role="form" method="post" action="<?= $this->Url->build([
        "action" => "create"
    ]); ?>">
	    <div class="form-group">
	        <label class="control-label">Question</label>
		    <input type="text" name="question" class="form-control">
	    </div>
	    <div class="form-group">
	        <label>Answer</label>
	        <textarea class="form-control" name="answer" rows="3"></textarea>
	    </div>
	    <div class="form-group">
	    	<button type="submit" class="btn btn-primary">Save</button>
	    </div>
	</form>
</div>