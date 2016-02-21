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
    // GET     /users/:id      show    page to show user with id :id
    // GET     /users/new      new     page to make a new user
    // POST    /users          create  create a new user
    // GET     /users/:id/edit edit    page to edit user with id :id
    // PATCH   /users/:id      update  update user with id :id
    // DELETE  /users/:id      destroy delete user with id :id
}
