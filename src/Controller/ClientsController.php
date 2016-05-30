<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 */
class ClientsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $name = isset($this->request->query['name']) ? $this->request->query['name'] : '';

        if (!empty($name)) {
            $options = ['conditions' => ['Clients.name LIKE' => "%{$name}%"]];
            $where['Clients.name LIKE'] = "%{$name}%";
        }
        $where['Clients.company_id'] = get_company_id();

        $query = $this->Clients->find()->where($where);
        $clients = $this->paginate($query);

        $this->set(compact('clients'));
        $this->set('_serialize', ['clients']);
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $client = $this->Clients->find('all')
            ->where(['Clients.id' => $id, 'Clients.company_id ' => get_company_id()])
            ->first();
        if (empty($client)) $this->redirect('/');

        $this->loadModel('Activities');
        $activitiesWhere = [
            'Activities.company_id' => get_company_id(),
            'Activities.client_id' => $id,
            'Activities.status <= ' => 30 // Not complete activities
        ];
        $activities = $this->Activities
            ->find('all')
            ->contain(['ActivityTypes'])
            ->where($activitiesWhere);

        $this->loadModel('Deals');
        $dealsWhere = [
            'Deals.company_id' => get_company_id(),
            'Deals.client_id' => $id,
            'Deals.status <= ' => 30 // Not complete deals
        ];
        $deals = $this->Deals
            ->find('all')
            ->where($dealsWhere);


        $this->set('client', $client);
        $this->set('activities', $activities);
        $this->set('deals', $deals);
        $this->set('_serialize', ['client',]);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->data);
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The client could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('client'));
        $this->set('_serialize', ['client']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $client = $this->Clients->find('all')
            ->where(['Clients.id' => $id, 'Clients.company_id ' => get_company_id()])
            ->first();
        if (empty($client)) $this->redirect('/');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->data);
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The client could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('client'));
        $this->set('_serialize', ['client']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        
        $this->request->allowMethod(['post', 'delete']);

        $client = $this->Clients->find('all')
            ->where(['Clients.id' => $id, 'Clients.company_id ' => get_company_id()])
            ->first();
        if (empty($client)) $this->redirect('/');

        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
