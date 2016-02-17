<?php
namespace App\Controller;

use Cake\Network\Http\Client;

class UsersController extends AppController
{
    public function login()
    {

    }

    // public function logout()
    // {
    //     $this->Flash->success('You are now logged out.');
    //     return $this->redirect($this->Auth->logout());
    // }

    public function view()
    {
        $http = new Client();

        $response = $http->get('http://interview-app-server.herokuapp.com/api/user/');

        $this->set(['users' => $response->body('json_decode')]);
    }
}
