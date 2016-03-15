<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">New Quiz</h1>
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
  	        <label>Correct Answer</label>
            <input type="text" name="answer" class="form-control">
  	    </div>
        <div class="form-group">
            <label>Wrong Answers</label>
            <input type="text" name="wrong_choices[0]" style="margin-bottom: 10px;" class="form-control">
            <input type="text" name="wrong_choices[1]" style="margin-bottom: 10px;" class="form-control">
            <input type="text" name="wrong_choices[2]" class="form-control">
        </div>
  	    <div class="form-group">
  	    	  <button type="submit" class="btn btn-primary">Save</button>
  	    </div>
    </form>
</div>
