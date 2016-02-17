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

        // $this->set(['question' => $response->body('json_decode')]);
        print($response->body); die;
    }
}
