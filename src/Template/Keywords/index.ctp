<?= $this->Html->css('dataTables.bootstrap', ['block' => true]) ?>

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">
            Keywords
            <span class="pull-right"><a href="<?= $this->Url->build([
                "action" => "add"
            ]); ?>" class="btn btn-success">New Keyword</a></span>
        </h1>
    </div>
</div>
<div class="row">
    <table class="table table-bordered table-hover" id="dataTable">
        <thead>
            <tr>
                <th>Keyword</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($keywords as $key => $keyword): ?>
            <tr data-href="<?= $this->Url->build([
                "action" => "show",
                $keyword->_id
            ]); ?>">
                <td><?= $keyword->name ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->Html->script('jquery.dataTables.min', ['block' => true]) ?>
<?= $this->Html->script('dataTables.bootstrap.min', ['block' => true]) ?>
<?= $this->Html->script('dataTables.index', ['block' => true]) ?>
