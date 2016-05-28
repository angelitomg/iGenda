<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Deals Controller
 *
 * @property \App\Model\Table\DealsTable $Deals
 */
class DealsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients', 'Users', 'Companies']
        ];
        $deals = $this->paginate($this->Deals);

        $this->set(compact('deals'));
        $this->set('_serialize', ['deals']);
    }

    /**
     * View method
     *
     * @param string|null $id Deal id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deal = $this->Deals->get($id, [
            'contain' => ['Clients', 'Users', 'Companies', 'Services']
        ]);

        $this->set('deal', $deal);
        $this->set('_serialize', ['deal']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deal = $this->Deals->newEntity();
        if ($this->request->is('post')) {
            //print_r($this->request->data);
            $deal = $this->Deals->patchEntity($deal, $this->request->data);
            //print_r($deal);die();
            if ($this->Deals->save($deal, ['associated' => 'DealServices'])) {
                $this->Flash->success(__('The deal has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The deal could not be saved. Please, try again.'));
            }
        }
        $clients = $this->Deals->Clients->find('list', ['limit' => 9999]);

        $this->loadModel('Services');
        $services = $this->Services->find('list', ['limit' => 9999]);
        $servicesData = $this->Services->find('all');

        $this->set(compact('deal', 'clients', 'services', 'servicesData'));
        $this->set('_serialize', ['deal']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Deal id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deal = $this->Deals->get($id, [
            'contain' => ['Services']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deal = $this->Deals->patchEntity($deal, $this->request->data);
            if ($this->Deals->save($deal)) {
                $this->Flash->success(__('The deal has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The deal could not be saved. Please, try again.'));
            }
        }
        $clients = $this->Deals->Clients->find('list', ['limit' => 200]);
        $users = $this->Deals->Users->find('list', ['limit' => 200]);
        $companies = $this->Deals->Companies->find('list', ['limit' => 200]);
        $services = $this->Deals->Services->find('list', ['limit' => 200]);
        $this->set(compact('deal', 'clients', 'users', 'companies', 'services'));
        $this->set('_serialize', ['deal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Deal id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deal = $this->Deals->get($id);
        if ($this->Deals->delete($deal)) {
            $this->Flash->success(__('The deal has been deleted.'));
        } else {
            $this->Flash->error(__('The deal could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
