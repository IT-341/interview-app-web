<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">New Keyword</h1>
    </div>
</div>
<div class="row">
    <form role="form" method="post" action="<?= $this->Url->build([
        "action" => "create"
    ]); ?>">
        <div class="form-group">
            <label class="control-label">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>