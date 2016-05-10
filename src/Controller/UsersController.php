<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;
use Cake\Routing\Router;
use Cake\Core\Configure;

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

        $query = $this->Users->find()->where(['company_id' => get_company_id()]);
        $users = $this->paginate($query);

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

        $user = $this->Users->find('all')
                    ->where(['Users.id' => $id, 'Users.company_id ' => get_company_id()])
                    ->contain(['Permissions'])
                    ->first();
        if (empty($user)) $this->redirect('/');

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
        
        $user = $this->Users->find('all')
                    ->where(['Users.id' => $id, 'Users.company_id' => get_company_id()])
                    ->first();

        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Register method
     *
     */
    public function register()
    {

        // No layout
        $this->viewBuilder()->layout(false);

        if ($this->request->is('post')) {

            // Get data
            $companyName = (isset($this->request->data['company_name'])) ? $this->request->data['company_name'] : '';
            $email = (isset($this->request->data['email'])) ? $this->request->data['email'] : '';
            $password = (isset($this->request->data['password'])) ? $this->request->data['password'] : '';

            // Check if user already exists
             $userTmp = $this->Users->find('all')
                    ->where(['Users.email' => $email])
                    ->first();
            if (!empty($userTmp)) {
                $this->Flash->error(__('The email already exists in our database. You can recovery your password by entering your email address. '));
                return $this->redirect(['controller' => 'Users', 'action' => 'recoveryPassword']);
            }

            // Create company
            $companiesTable = TableRegistry::get('Companies');
            $company = $companiesTable->newEntity();
            $company->name = $companyName;
            $companiesTable->save($company);

            // Create user
            $usersTable = TableRegistry::get('Users');
            $user = $usersTable->newEntity();
            $user->email = $email;
            $user->password = $password;
            $user->company_id = $company->id;
            $user->activated = 0;
            $user->token = uniqid();
            $usersTable->save($user);

            // Update user_id on companies table
            $company->user_id = $user->id;
            $companiesTable->save($company);

            // Setup new user account
            $this->_setupNewUserAccount($user);

            // Build email message
            $url = Router::url(['controller' => 'Users', 'action' => 'confirm', $user->token], true );
            $emailTitle = Configure::read('System.title') . ' - ' . __('Confirm your email');
            $loginLink = '<a href="' . $url . '" target="_blank">' . __('clicking here') . '</a>';
            $emailContent = '<p>' . __('Welcome. Your account must be activated.') . '</p>';
            $emailContent .= '<p>' . __('Confirm your account and start using the system now  ') . $loginLink . '</p>';

            // Send email
            $email = new Email();
            $email->transport('amglabs');
            $email->from([Configure::read('System.default_from_email') => Configure::read('System.title')])
              ->template('default')
              ->emailFormat('html')
              ->helpers(['Url'])
              ->viewVars(['title' => $emailTitle, 'description' => $emailContent])
              ->to([$user->email])
              ->subject(__('New password generated.'))              
              ->send();

            // Define status message
            $this->Flash->success(__('User created successfully. Please check and confirm your email address to start using the system.'));
            $this->redirect(['controller' => 'Users', 'action' => 'login']);

        }

    }

    /**
     * Recovery password method
     *
     */
    public function recoveryPassword() 
    {

        // No layout
        $this->viewBuilder()->layout(false);

        // Allow only if user not logged
        //print_r($this->Auth->user());
        //die();
        //if ($this->Auth->user()) $this->redirect('/');

        if ($this->request->is('post')) {

            // Get email
            $email = (isset($this->request->data['email'])) ? $this->request->data['email'] : '';

            // Check email on database
            $user = $this->Users->find('all')
                    ->where(['Users.email' => $email])
                    ->first();

            if ($user) {

                // Generate new password
                $password = $this->_generatePassword(8);
                $user->password = $password;

                // Save new password
                $usersTable = TableRegistry::get('Users');
                $usersTable->save($user);

                // Build email message
                $url = Router::url(['controller' => 'Users', 'action' => 'login'], true );
                $emailTitle = Configure::read('System.title') . ' - ' . __('Password Recovery');
                $loginLink = '<a href="' . $url . '" target="_blank">' . __('clicking here') . '</a>';
                $emailContent = '<p>' . __('Your new password is: ' . '<strong>' .  $password . '</strong>') . '</p>';
                $emailContent .= '<p>' . __('Sign in ') . $loginLink . '</p>';

                // Send email
                $email = new Email();
                $email->transport('amglabs');
                $email->from([Configure::read('System.default_from_email') => Configure::read('System.title')])
                  ->template('default')
                  ->emailFormat('html')
                  ->helpers(['Url'])
                  ->viewVars(['title' => $emailTitle, 'description' => $emailContent])
                  ->to([$user->email])
                  ->subject(__('New password generated.'))              
                  ->send();

                // Redirect user
                $this->Flash->success(__('A new password was generated and sent to your email.'));  
                $this->redirect(['controller' => 'Users', 'action' => 'login']);  

            } else {
                $this->Flash->error(__('Email not found.'));    
            }

        }

    }

    /**
     * Confirm account method
     */
    public function confirm()
    {

        // No view and no layout
        $this->viewBuilder()->layout(false);   
        $this->viewBuilder()->template(false);

        // Allow only if user not logged
        if ($this->Auth->user()) $this->redirect('/');

        // Get token
        $token = $this->request->params['pass'][0];

        // Search user by token
        $user = $this->Users->find('all')
            ->where(['Users.token' => $token])
            ->first();

        if (!empty($token) && $user) {

            // Activate user
            $usersTable = TableRegistry::get('Users');
            $user->activated = 1;
            $usersTable->save($user);

            // Define status message
            $this->Flash->success(__('Account successfully activated.'));

        } 

        // Redirect user
        $this->redirect(['controller' => 'Users', 'action' => 'login']);
        
    }

    /**
     * Login method
     *
     * @return void Redirects to Auth component redirect URL
     */
    public function login()
    {

        $this->viewBuilder()->layout(false);

        // Allow only if user not logged
        if ($this->Auth->user()) $this->redirect('/');

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user && $user['activated'] == 1) {

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

    /**
     * Generate password method
     *
     */
    private function _generatePassword($size = 6)
    {

        $chars = 'abcdefghijklmnopqrstuvwxyzZ0123456789';
        $max = strlen($chars) - 1;
        $password = '';

        for($i = 0; $i < $size; $i++){
        
            $pos = mt_rand(0, $max);
            $password .= $chars[$pos];
            
        }
        
        return $password;

    }

    /**
     * Setup new user account method
     *
     */
    private function _setupNewUserAccount($user)
    {
        return true;
    }

}
