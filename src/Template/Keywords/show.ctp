<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Show/Edit Keyword</h1>
    </div>
</div>
<div class="row">
    <?php if ($keyword == null): ?>
    <p class="text-danger">Keyword not found!</p>
    <?php else: ?>
    <form role="form" method="post" action="<?= $this->Url->build([
        "action" => "update",
        $keyword->_id
    ]); ?>">
        <div class="form-group">
            <label class="control-label">Name</label>
            <input type="text" name="name" class="form-control" disabled value="<?= $keyword->name ?>">
        </div>
        <div class="show-buttons">
            <button type="button" id="btnEdit" class="btn btn-primary">Edit</button>
            <a href="<?= $this->Url->build([
                "action" => "delete",
                $keyword->_id
            ]); ?>" id="btnDelete" class="btn btn-danger">Delete</a>
        </div>
        <div class="edit-buttons" style="display: none;">
            <button type="button" id="btnCancel" class="btn btn-danger">Cancel</button>
            <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
        </div>
    </form>
    <?php endif; ?>
</div>

<?= $this->Html->script('buttons-handlers', ['block' => true]) ?>