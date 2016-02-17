<?php
namespace App\Controller;

class QuestionsController extends AppController
{
    public function index()
    {
    	$response = $this->http->get('http://interview-app-server.herokuapp.com/api/question/');

    	$this->set(['users' => $response->body('json_decode')]);
    }
}
