<?php
namespace App\Controller;

class KeywordsController extends AppController
{
    public function index()
    {
        $keywords = $this->JIPAApi->get([
            'resource' => 'keyword',
        ]);

    	$this->set(['keywords' => $keywords]);
    }

    public function add() {}

    public function create()
    {
        if (!$this->request->is('post')) {
            return $this->redirect(['action' => 'index']);
        }

        $response = $this->JIPAApi->post([
            'resource' => 'keyword'
        ], $this->request->data);

        if ($response) {
            $this->Flash->success('Keyword created.');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Failed to create the keyword.');
        return $this->redirect(['action' => 'index']);
    }

    public function show($id = null)
    {
        if ($id == null) {
            return $this->redirect(['action' => 'index']);
        }

        $keyword = $this->JIPAApi->get([
            'resource' => 'keyword',
            'id'       => $id
        ]);

        $this->set(['keyword' => $keyword]);
    }

    public function update($id = null)
    {
        if ($id == null || !$this->request->is('post')) {
            return $this->redirect(['action' => 'index']);
        }

        $response = $this->JIPAApi->put([
            'resource' => 'keyword',
            'id'       => $id,
        ], $this->request->data);

        if ($response) {
            $this->Flash->success('Keyword updated.');
            return $this->redirect(['action' => 'show', $id]);
        }

        $this->Flash->error('Failed to update the keyword.');
        return $this->redirect(['action' => 'show', $id]);
    }

    public function delete($id = null)
    {
        if ($id == null) {
            return $this->redirect(['action' => 'index']);
        }

        $response = $this->JIPAApi->delete([
            'resource' => 'keyword',
            'id'       => $id
        ]);

        if ($response) {
            $this->Flash->success('Keyword deleted.');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Failed to delete the keyword.');
        return $this->redirect(['action' => 'index']);
    }
}
