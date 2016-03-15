<?php
namespace App\Controller;

class QuizzesController extends AppController
{
    public function index()
    {
        $questions = $this->JIPAApi->get([
            'resource' => 'question',
            'select'   => ['answer', 'question', 'keywords'],
            'filter'   => ['quiz' => 'true']
        ]);

    	$this->set(['questions' => $questions]);
    }

    public function add() {}

    public function create()
    {
        if (!$this->request->is('post')) {
            return $this->redirect(['action' => 'index']);
        }

        $this->request->data['quiz'] = true;

        $response = $this->JIPAApi->post([
            'resource' => 'question'
        ], $this->request->data);

        if ($response) {
            $this->Flash->success('Quiz created.');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Failed to create the quiz.');
        return $this->redirect(['action' => 'index']);
    }

    public function show($id = null)
    {
        if ($id == null) {
            return $this->redirect(['action' => 'index']);
        }

        $question = $this->JIPAApi->get([
            'resource' => 'question',
            'id'       => $id
        ]);

        $this->set(['question' => $question]);
    }

    public function update($id = null)
    {
        if ($id == null || !$this->request->is('post')) {
            return $this->redirect(['action' => 'index']);
        }

        $response = $this->JIPAApi->put([
            'resource' => 'question',
            'id'       => $id,
        ], $this->request->data);

        if ($response) {
            $this->Flash->success('Quiz updated.');
            return $this->redirect(['action' => 'show', $id]);
        }

        $this->Flash->error('Failed to update the quiz.');
        return $this->redirect(['action' => 'show', $id]);
    }

    public function delete($id = null)
    {
        if ($id == null) {
            return $this->redirect(['action' => 'index']);
        }

        $response = $this->JIPAApi->delete([
            'resource' => 'question',
            'id'       => $id
        ]);

        if ($response) {
            $this->Flash->success('Quiz deleted.');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Failed to delete the quiz.');
        return $this->redirect(['action' => 'index']);
    }
}
