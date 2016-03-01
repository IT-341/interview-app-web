<?php
namespace App\Controller;

class QuestionsController extends AppController
{
    public function index()
    {
        $questions = $this->JIPAApi->get([
            'resource' => 'question',
            'select'   => ['answer', 'question', 'keywords'],
            'filter'   => ['quiz' => 'false']
        ]);

    	$this->set(['questions' => $questions]);
    }

    public function add() {}

    public function create()
    {
        if (!$this->request->is('post')) {
            return $this->redirect(['action' => 'index']);
        }

        $response = $this->http->post(
            'http://interview-app-server.herokuapp.com/api/question/',
            [
                'question' => $this->request->data['question'],
                'answer'   => $this->request->data['answer']
            ],
            ['headers' => ['Content-Type' => 'x-www-form-urlencoded']]
        );

        if ($response->code == '201') {
            $this->Flash->success('Question created.');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Failed to create the question.');
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

        $response = $this->http->put(
            'http://interview-app-server.herokuapp.com/api/question/' . $id,
            [
                'question' => $this->request->data['question'],
                'answer'   => $this->request->data['answer']
            ],
            ['headers' => ['Content-Type' => 'x-www-form-urlencoded']]
        );

        if ($response->isOk()) {
            $this->Flash->success('Question updated.');
            return $this->redirect(['action' => 'show', $id]);
        }

        $this->Flash->error('Failed to update the question.');
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
            $this->Flash->success('Question deleted.');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Failed to delete the question.');
        return $this->redirect(['action' => 'index']);
    }
}
