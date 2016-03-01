<?php
namespace App\Controller;

use Cake\Core\Configure;

class UsersController extends AppController
{
    public function login()
    {
        if ($this->request->is('post')) {
            $config = Configure::read('SimpleAuth');

            if ($config['username'] == $this->request->data['username']
                && $config['password'] == $this->request->data['password']) {
                $this->Auth->setUser(['username' => 'admin']);
                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->loginError('Username or password is incorrect');
        }

        $this->viewBuilder()->layout(false);
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function index()
    {
        $users = $this->JIPAApi->get([
            'resource' => 'user',
            'select'   => ['firstname', 'lastname', 'email', 'points']
        ]);

        $this->set(['users' => $users]);
    }

    public function show($id = null)
    {
        if ($id == null) {
            return $this->redirect(['action' => 'index']);
        }

        $user = $this->JIPAApi->get([
            'resource' => 'user',
            'id'       => $id
        ]);

        $this->set(['user' => $user]);
    }

    public function update($id = null)
    {
        if ($id == null || !$this->request->is('post')) {
            return $this->redirect(['action' => 'index']);
        }

        $response = $this->http->put(
            'http://interview-app-server.herokuapp.com/api/user/' . $id,
            [
                'username'  => $this->request->data['username'],
                'firstname' => $this->request->data['firstname'],
                'lastname'  => $this->request->data['lastname'],
                'email'     => $this->request->data['email']
            ],
            ['headers' => ['Content-Type' => 'x-www-form-urlencoded']]
        );

        if ($response->isOk()) {
            $this->Flash->success('User updated.');
            return $this->redirect(['action' => 'show', $id]);
        }

        $this->Flash->error('Failed to update the user.');
        return $this->redirect(['action' => 'show', $id]);
    }

    public function delete($id = null)
    {
        if ($id == null) {
            return $this->redirect(['action' => 'index']);
        }

        $response = $this->JIPAApi->delete([
            'resource' => 'user',
            'id'       => $id
        ]);

        if ($response) {
            $this->Flash->success('User deleted.');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Failed to delete the user.');
        return $this->redirect(['action' => 'index']);
    }
}
