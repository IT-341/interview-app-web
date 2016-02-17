<?php
namespace App\Controller;

class UsersController extends AppController
{
    public function login()
    {

    }

    public function index()
    {
        $response = $this->http->get('http://interview-app-server.herokuapp.com/api/user/');

        $this->set(['users' => $response->body('json_decode')]);
    }

    // GET     /users          index   page to list all users
    // GET     /users/1        show    page to show user with id 1
    // GET     /users/new      new     page to make a new user
    // POST    /users          create  create a new user
    // GET     /users/1/edit   edit    page to edit user with id 1
    // PATCH   /users/1        update  update user with id 1
    // DELETE  /users/1        destroy delete user with id 1
}
