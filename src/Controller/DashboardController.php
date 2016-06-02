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

        /*
        $name = isset($this->request->query['name']) ? $this->request->query['name'] : '';

        if (!empty($name)) {
            $options = ['conditions' => ['Clients.name LIKE' => "%{$name}%"]];
            $where['Clients.name LIKE'] = "%{$name}%";
        }
        $where['Clients.company_id'] = get_company_id();

        $query = $this->Clients->find()->where($where);
        $clients = $this->paginate($query);
        */

        //$this->set(compact('clients'));
        //$this->set('_serialize', ['clients']);

    }

}
