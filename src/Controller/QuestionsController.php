<?php
namespace App\Controller;

class QuestionsController extends AppController
{
    public function index()
    {
    	$response = $this->http->get('http://interview-app-server.herokuapp.com/api/question/?select=question%20answer');

    	$this->set(['questions' => $response->body('json_decode')]);
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
            $this->Flash->success('Question updated successfully!');
        } else {
            $this->Flash->error('Question update failed.');
        }

        return $this->redirect(['action' => 'show', $id]);
    }
}
