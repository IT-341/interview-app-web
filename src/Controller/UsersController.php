<?php
namespace App\Controller;

class UsersController extends AppController
{
    public function login()
    {

    }

    public function logout()
    {

    }

    public function index()
    {
        $response = $this->http->get('http://interview-app-server.herokuapp.com/api/user/');

        $this->set(['users' => $response->body('json_decode')]);
    }

    public function show($id = null)
    {
        $response = $this->http->get('http://interview-app-server.herokuapp.com/api/user/' . $id);

        $this->set(['user' => $response->body('json_decode')]);
    }

    public function update($id = null)
    {
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
        $response = $this->http->delete('http://interview-app-server.herokuapp.com/api/user/' . $id);

        if ($response->isOk() || $response->code == '204') {
            $this->Flash->success('User deleted.');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Failed to delete the user.');
        return $this->redirect(['action' => 'index']);
    }
}
