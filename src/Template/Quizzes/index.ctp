<?= $this->Html->css('dataTables.bootstrap', ['block' => true]) ?>

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">
            Quizzes
            <span class="pull-right"><a href="<?= $this->Url->build([
                "action" => "add"
            ]); ?>" class="btn btn-success">New Quiz</a></span>
        </h1>
    </div>
</div>
<div class="row">
    <table class="table table-bordered table-hover" id="dataTable">
        <thead>
            <tr>
                <th>Question</th>
                <th>Answer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $key => $question): ?>
            <tr data-href="<?= $this->Url->build([
                "action" => "show",
                $question->_id
            ]); ?>">
                <td><?= $this->Text->truncate($question->question, 50) ?></td>
                <td><?= $this->Text->truncate($question->answer, 50) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->Html->script('jquery.dataTables.min', ['block' => true]) ?>
<?= $this->Html->script('dataTables.bootstrap.min', ['block' => true]) ?>
<?= $this->Html->script('dataTables.index', ['block' => true]) ?>
