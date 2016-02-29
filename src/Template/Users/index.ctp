<?= $this->Html->css('dataTables.bootstrap', ['block' => true]) ?>

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Users</h1>
    </div>
</div>
<div class="row">
    <table class="table table-bordered table-hover" id="dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $key => $user): ?>
            <tr data-href="<?= $this->Url->build([
                "action" => "show",
                $user->_id
            ]); ?>">
                <td align="center"><?= $key + 1 ?></td>
                <td><?= $this->Text->truncate($user->firstname . ' ' . $user->lastname, 50) ?></td>
                <td><?= $this->Text->truncate($user->email, 50) ?></td>
                <td><?= $user->points ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->Html->script('jquery.dataTables.min', ['block' => true]) ?>
<?= $this->Html->script('dataTables.bootstrap.min', ['block' => true]) ?>
<?= $this->Html->script('dataTables.index', ['block' => true]) ?>
