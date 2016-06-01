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

        $query = $this->Deals->find()->contain(['Clients'])->where(['Deals.company_id' => get_company_id()]);
        $deals = $this->paginate($query);


        $where['Deals.company_id'] = get_company_id();
        if (!empty($this->request->query['client_id'])) $where['Deals.client_id'] = $this->request->query['client_id'];
        if (!empty($this->request->query['status'])) $where['Deals.status'] = $this->request->query['status'];

        $emptyDate = ['year' => '', 'month' => '', 'day' => ''];
        $startDate = (isset($this->request->query['start_date'])) ? $this->request->query['start_date'] : $emptyDate;
        $endDate = (isset($this->request->query['end_date'])) ? $this->request->query['end_date'] : $emptyDate;
        
        if (!empty($startDate['year']) && !empty($startDate['month']) && !empty($startDate['day'])) {
            $where['Deals.start_date >='] = $startDate['year'] . '-' . $startDate['month'] . '-' . $startDate['day'] . ' 00:00:00';
        }

        if (!empty($endDate['year']) && !empty($endDate['month']) && !empty($endDate['day'])) {
            $where['Deals.end_date <='] = $endDate['year'] . '-' . $endDate['month'] . '-' . $endDate['day'] . ' 23:59:59';
        }

        $deal = $this->Deals->newEntity();
        $query = $this->Deals->find()->contain(['Clients'])->where($where);

        $deals = $this->paginate($query);

        $clients = $this->Deals->Clients->find('list');
        $statusList = $deal->getStatusList();

        $this->set(compact('deals', 'clients', 'statusList'));
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

        $deal = $this->Deals->find('all')
            ->contain(['Clients', 'DealServices', 'Users'])
            ->where(['Deals.id' => $id, 'Deals.company_id ' => get_company_id()])
            ->first();
        if (empty($deal)) $this->redirect('/');

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
            $deal = $this->Deals->patchEntity($deal, $this->request->data);
            if ($this->Deals->save($deal, ['associated' => 'DealServices'])) {
                $this->Flash->success(__('The deal has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The deal could not be saved. Please, try again.'));
            }
        }
        $clients = $this->Deals->Clients->find('list');

        $this->loadModel('Services');
        $services = $this->Services->find('list');
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

        $deal = $this->Deals->find('all')
            ->contain(['DealServices'])
            ->where(['Deals.id' => $id, 'Deals.company_id ' => get_company_id()])
            ->first();
        if (empty($deal)) $this->redirect('/');

        if ($this->request->is(['patch', 'post', 'put'])) {

            $this->Deals->DealServices->deleteAll(['DealServices.deal_id' => $id]);

            $deal = $this->Deals->patchEntity($deal, $this->request->data);
            if ($this->Deals->save($deal, ['associated' => 'DealServices'])) {
                $this->Flash->success(__('The deal has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The deal could not be saved. Please, try again.'));
            }
        }

        $clients = $this->Deals->Clients->find('list');

        $this->loadModel('Services');
        $services = $this->Services->find('list');
        $servicesData = $this->Services->find('all');

        $this->set(compact('deal', 'clients', 'servicesData', 'services'));
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

        $deal = $this->Deals->find('all')
            ->where(['Deals.id' => $id, 'Deals.company_id ' => get_company_id()])
            ->first();
        if (empty($deal)) $this->redirect('/');

        if ($this->Deals->delete($deal)) {
            $this->Flash->success(__('The deal has been deleted.'));
        } else {
            $this->Flash->error(__('The deal could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
