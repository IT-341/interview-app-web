<?php
namespace App\Controller;

class QuestionsController extends AppController
{
    public function index()
    {
    	$response = $this->http->get('http://interview-app-server.herokuapp.com/api/question/?select=question%20answer');

    	$this->set(['questions' => $response->body('json_decode')]);
    }

    public function add() {}

    public function create()
    {
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
        $response = $this->http->get('http://interview-app-server.herokuapp.com/api/question/' . $id);

        $this->set(['question' => $response->body('json_decode')]);
    }

    public function update($id = null)
    {
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
        $response = $this->http->delete('http://interview-app-server.herokuapp.com/api/question/' . $id);

        if ($response->isOk() || $response->code == '204') {
            $this->Flash->success('Question deleted.');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Failed to delete the question.');
        return $this->redirect(['action' => 'index']);
    }
}
