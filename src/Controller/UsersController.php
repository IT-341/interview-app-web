<?php
namespace App\Controller;

class UsersController extends AppController
{
    public function login()
    {

    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
}
