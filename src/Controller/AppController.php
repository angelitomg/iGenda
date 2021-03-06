<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n; 
use Cake\Routing\Router;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $lang = $this->_getLang();
        I18n::locale($lang);

        $this->loadComponent('Security', ['blackHoleCallback' => 'forceSSL']);

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
            'loginRedirect' => ['controller' => 'Dashboard', 'action' => 'index']
        ]);
        $this->Auth->config('authorize', ['Controller']);

        $this->viewBuilder()->layout('adminlte');

    }

    /**
     * isAuthorized method
     *
     * @param object $user
     * @return bool 
     */
    public function isAuthorized($user = null)
    {

        // Request path
        $path = $this->request->params['controller'] . '/' . $this->request->params['action'];

        // Allowed actions to all users
        $allowed_actions = [
            'Users/logout', 'Users/login', 'Users/register', 'Users/recoveryPassword', 
            'Users/confirm', 'Dashboard/index', 'Activities/calendarJSON'
        ];

        if (in_array($path, $allowed_actions)) return true;

        if (in_array($path, $this->Auth->user()['permissions'])) return true;

        // Default deny
        $this->Flash->error(__('You cannot access this area.'));
        return $this->redirect('/');

    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    /**
     * Get language method
     */
    private function _getLang()
    {
        $lang = $this->request->session()->read('Config.language');
        if (!empty($lang)) {
            return $lang;
        } else {
            $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            if ($lang == 'en') return 'en_US';
            return 'pt_BR';
        }
    }

    /**
     * Before filter callback.
     *
     * @param  \Cake\Event\Event $event The beforeFilter event.
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Security->requireSecure();
    }

    /**
     * Force SSL method.
     *
     * @return mixed
     */
    public function forceSSL()
    {
        return $this->redirect('https://' . env('SERVER_NAME') . Router::url($this->request->getRequestTarget()));
    }

}
