<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Activities Controller
 *
 * @property \App\Model\Table\ActivitiesTable $Activities
 */
class ActivitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $where['Activities.company_id'] = get_company_id();
        if (!empty($this->request->query['client_id'])) $where['Activities.client_id'] = $this->request->query['client_id'];
        if (!empty($this->request->query['activity_type_id'])) $where['Activities.activity_type_id'] = $this->request->query['activity_type_id'];
        if (!empty($this->request->query['status'])) $where['Activities.status'] = $this->request->query['status'];


        $emptyDate = ['year' => '', 'month' => '', 'day' => ''];
        $startDate = (isset($this->request->query['start_date'])) ? $this->request->query['start_date'] : $emptyDate;
        $endDate = (isset($this->request->query['end_date'])) ? $this->request->query['end_date'] : $emptyDate;
        
        if (!empty($startDate['year']) && !empty($startDate['month']) && !empty($startDate['day'])) {
            $where['Activities.start_date >='] = $startDate['year'] . '-' . $startDate['month'] . '-' . $startDate['day'];
        }

        if (!empty($endDate['year']) && !empty($endDate['month']) && !empty($endDate['day'])) {
            $where['Activities.start_date <='] = $endDate['year'] . '-' . $endDate['month'] . '-' . $endDate['day'];
        }

        $activity = $this->Activities->newEntity();
        $query = $this->Activities->find()->contain(['Clients', 'ActivityTypes'])->where($where);
        $activities = $this->paginate($query);

        $clients = $this->Activities->Clients->find('list');
        $activityTypes = $this->Activities->ActivityTypes->find('list');
        $statusList = $activity->getStatusList();

        $this->set(compact('activities', 'activityTypes', 'clients', 'statusList'));
        $this->set('_serialize', ['activities']);
    }

    /**
     * View method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $activity = $this->Activities->find('all')
            ->contain(['Clients', 'ActivityTypes', 'Users'])
            ->where(['Activities.id' => $id, 'Activities.company_id ' => get_company_id()])
            ->first();
        if (empty($activity)) $this->redirect('/');

        $this->set('activity', $activity);
        $this->set('_serialize', ['activity']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $activity = $this->Activities->newEntity();
        if ($this->request->is('post')) {
            $activity = $this->Activities->patchEntity($activity, $this->request->data);
            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activity could not be saved. Please, try again.'));
            }
        }
        $clients = $this->Activities->Clients->find('list');
        $activityTypes = $this->Activities->ActivityTypes->find('list');
        $this->set(compact('activity', 'clients', 'activityTypes'));
        $this->set('_serialize', ['activity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $activity = $this->Activities->find('all')
            ->where(['Activities.id' => $id, 'Activities.company_id ' => get_company_id()])
            ->first();
        if (empty($activity)) $this->redirect('/');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $activity = $this->Activities->patchEntity($activity, $this->request->data);
            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activity could not be saved. Please, try again.'));
            }
        }
        $clients = $this->Activities->Clients->find('list');
        $activityTypes = $this->Activities->ActivityTypes->find('list');
        $this->set(compact('activity', 'clients', 'activityTypes'));
        $this->set('_serialize', ['activity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $activity = $this->Activities->find('all')
            ->where(['Activities.id' => $id, 'Activities.company_id ' => get_company_id()])
            ->first();
        if (empty($activity)) $this->redirect('/');

        if ($this->Activities->delete($activity)) {
            $this->Flash->success(__('The activity has been deleted.'));
        } else {
            $this->Flash->error(__('The activity could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
