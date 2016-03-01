<?php
namespace App\Controller;

class FeedbackController extends AppController
{
    public function index()
    {
        $feedback = $this->JIPAApi->get([
            'resource' => 'feedback',
            'select'   => ['description', 'user'],
            'populate' => 'user'
        ]);

    	$this->set(['feedback' => $feedback]);
    }

    public function show($id = null)
    {
        if ($id == null) {
            return $this->redirect(['action' => 'index']);
        }

        $feedback = $this->JIPAApi->get([
            'resource' => 'feedback',
            'id'       => $id,
            'populate' => 'user'
        ]);

        $this->set(['feedback' => $feedback]);
    }

    public function delete($id = null)
    {
        if ($id == null) {
            return $this->redirect(['action' => 'index']);
        }

        $response = $this->JIPAApi->delete([
            'resource' => 'feedback',
            'id'       => $id
        ]);

        if ($response) {
            $this->Flash->success('Feedback deleted.');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Failed to delete the feedback.');
        return $this->redirect(['action' => 'index']);
    }
}
