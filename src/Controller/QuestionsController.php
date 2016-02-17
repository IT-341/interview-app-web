<?php
namespace App\Controller;

use Cake\Network\Http\Client;

class QuestionsController extends AppController
{
    public function view()
    {
    	$http = new Client();

    	$response = $http->get('http://interview-app-server.herokuapp.com/api/question/');

    	$this->set(['users' => $response->body('json_decode')]);
    }
}
