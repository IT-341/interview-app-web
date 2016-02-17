<?= $this->Html->css('dataTables.bootstrap') ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Questions</h1>
    </div>
</div>
<div class="row">
	<div class="dataTable_wrapper">
	    <table class="table table-bordered table-hover" id="tableQuestions">
	        <thead>
	            <tr>
	                <th>#</th>
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
	        		<td align="center"><?= $key + 1 ?></td>
	        		<td><?= $this->Text->truncate($question->question, 50) ?></td>
	        		<td><?= $this->Text->truncate($question->answer, 50) ?></td>
	        	</tr>
				<?php endforeach; ?>
	        </tbody>
	    </table>
	</div>
</div>

<?= $this->Html->script('jquery.dataTables.min') ?>
<?= $this->Html->script('dataTables.bootstrap.min') ?>
<?= $this->Html->script('questions/questions-index') ?>
