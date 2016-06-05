<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

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
        $startDate1 = (isset($this->request->query['start_date1'])) ? $this->request->query['start_date1'] : $emptyDate;
        $startDate2 = (isset($this->request->query['start_date2'])) ? $this->request->query['start_date2'] : $emptyDate;
        $endDate1 = (isset($this->request->query['end_date1'])) ? $this->request->query['end_date1'] : $emptyDate;
        $endDate2 = (isset($this->request->query['end_date2'])) ? $this->request->query['end_date2'] : $emptyDate;
        
        if (!empty($startDate1['year']) && !empty($startDate1['month']) && !empty($startDate1['day'])) {
            $where['Activities.start_date >='] = $startDate1['year'] . '-' . $startDate1['month'] . '-' . $startDate1['day'] . ' 00:00:00';
        }

        if (!empty($startDate2['year']) && !empty($startDate2['month']) && !empty($startDate2['day'])) {
            $where['Activities.start_date <='] = $startDate2['year'] . '-' . $startDate2['month'] . '-' . $startDate2['day'] . ' 23:59:59';
        }

        if (!empty($endDate1['year']) && !empty($endDate1['month']) && !empty($endDate1['day'])) {
            $where['Activities.end_date >='] = $endDate1['year'] . '-' . $endDate1['month'] . '-' . $endDate1['day'] . ' 00:00:00';
        }

        if (!empty($endDate2['year']) && !empty($endDate2['month']) && !empty($endDate2['day'])) {
            $where['Activities.end_date <='] = $endDate2['year'] . '-' . $endDate2['month'] . '-' . $endDate2['day'] . ' 23:59:59';
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

    /**
     * Calendar method
     *
     * @param string $date
     */
    public function calendar($date = '')
    {

    }

    /**
     * Calendar JSON method
     *
     */ 
    public function calendarJSON() 
    {

        // No layout
        $this->autoRender = NULL;
        $this->viewBuilder()->layout(false);

        $startDate = $this->request->query['start'];
        $endDate = $this->request->query['end'];

        $where = [
            'Activities.company_id' => get_company_id(),
            'Activities.start_date >=' => $startDate,
            'Activities.start_date <=' => $endDate,
            'Activities.end_date >=' => $startDate,
            'Activities.end_date <=' => $endDate,

        ];

        $activities = [];
        $query = $this->Activities->find('all')->contain(['ActivityTypes'])->where($where);

        foreach ($query as $q) {
            $color = $q->getActivityColor($q->status);
            $activities[] = [
                'title' => $q->activity_type->name,
                'start' =>  $q->start_date,
                'end' =>  $q->end_date,
                'url' => Router::url(['controller' => 'Activities', 'action' => 'view', $q->id]),
                'backgroundColor' => $color, 
                'borderColor' => $color 
            ];
        }

        echo json_encode($activities);

    }

}
