<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ActivityTypes Controller
 *
 * @property \App\Model\Table\ActivityTypesTable $ActivityTypes
 */
class ActivityTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $query = $this->ActivityTypes->find()->where(['company_id' => get_company_id()]);
        $activityTypes = $this->paginate($query);

        $this->set(compact('activityTypes'));
        $this->set('_serialize', ['activityTypes']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $activityType = $this->ActivityTypes->newEntity();
        if ($this->request->is('post')) {
            $activityType = $this->ActivityTypes->patchEntity($activityType, $this->request->data);
            if ($this->ActivityTypes->save($activityType)) {
                $this->Flash->success(__('The activity type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activity type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('activityType'));
        $this->set('_serialize', ['activityType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Activity Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $activityType = $this->ActivityTypes->find('all')
            ->where(['ActivityTypes.id' => $id, 'ActivityTypes.company_id ' => get_company_id()])
            ->first();
        if (empty($user)) $this->redirect('/');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $activityType = $this->ActivityTypes->patchEntity($activityType, $this->request->data);
            if ($this->ActivityTypes->save($activityType)) {
                $this->Flash->success(__('The activity type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The activity type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('activityType'));
        $this->set('_serialize', ['activityType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Activity Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);

        $activityType = $this->ActivityTypes->find('all')
            ->where(['ActivityTypes.id' => $id, 'ActivityTypes.company_id ' => get_company_id()])
            ->first();

        if ($this->ActivityTypes->delete($activityType)) {
            $this->Flash->success(__('The activity type has been deleted.'));
        } else {
            $this->Flash->error(__('The activity type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
