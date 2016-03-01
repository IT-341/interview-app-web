<?= $this->Html->css('dataTables.bootstrap', ['block' => true]) ?>

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">
            Feedback
        </h1>
    </div>
</div>
<div class="row">
    <table class="table table-bordered table-hover" id="dataTable">
        <thead>
            <tr>
                <th>Description</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($feedback as $key => $feed): ?>
            <tr data-href="<?= $this->Url->build([
                "action" => "show",
                $feed->_id
            ]); ?>">
                <td><?= $this->Text->truncate($feed->description, 120) ?></td>
                <td><?= $feed->user->firstname . ' ' . $feed->user->lastname ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->Html->script('jquery.dataTables.min', ['block' => true]) ?>
<?= $this->Html->script('dataTables.bootstrap.min', ['block' => true]) ?>
<?= $this->Html->script('dataTables.index', ['block' => true]) ?>
