<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $permissions = $this->Users->Permissions->find('list', ['limit' => 200]);
        $this->set(compact('user', 'permissions'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Permissions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $permissions = $this->Users->Permissions->find('list', ['limit' => 200]);
        $this->set(compact('user', 'permissions'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Login method
     *
     * @return void Redirects to Auth component redirect URL
     */
    public function login()
    {

        $this->viewBuilder()->layout(false);

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {

                // Get user permissions
                /*
                $user_data = $this->Users->get($user['id'], ['contain' => ['Permissions']]);
                if (!empty($user_data->permissions)) {
                    foreach ($user_data->permissions as $permission) {
                        $user['permissions'][] = $permission->get('path');    
                    }
                }
                */

                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());


            } else {
                $this->Flash->error(
                    __('Invalid username or password.'),
                    'default',
                    [],
                    'auth'
                );
            }
        }
    }

    /**
     * Logout method
     *
     * @return void Redirects to Auth component logout URL
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

}
