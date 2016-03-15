<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Show/Edit Feedback</h1>
    </div>
</div>
<div class="row">
    <?php if ($feedback == null): ?>
    <p class="text-danger">Feedback not found!</p>
    <?php else: ?>
    <form role="form" method="post" action="<?= $this->Url->build([
        "action" => "update",
        $feedback->_id
    ]); ?>">
        <div class="form-group">
            <label class="control-label">Description</label>
            <textarea class="form-control" name="description" rows="3" disabled><?= $feedback->description ?></textarea>
        </div>
        <div class="form-group">
            <label class="control-label">User</label>
            <input type="text" class="form-control" name="username" value="<?=
            $feedback->user->firstname . ' ' . $feedback->user->lastname
            ?>" disabled>
        </div>
        <div class="show-buttons">
            <a href="<?= $this->Url->build([
                "action" => "delete",
                $feedback->_id
            ]); ?>" id="btnDelete" class="btn btn-danger">Delete</a>
            <?php if (!$feedback->done): ?>
            <a href="<?= $this->Url->build([
                "action" => "done",
                $feedback->_id
            ]); ?>" id="btnDelete" class="btn btn-info">Mark as Solved</a>
            <?php endif; ?>
        </div>
    </form>
    <?php endif; ?>
</div>
