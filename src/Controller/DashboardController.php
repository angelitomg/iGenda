<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Dashboard Controller
 *
 */
class DashboardController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $this->loadModel('Clients');
        $this->loadModel('Activities');
        $this->loadModel('Deals');

        $company_id = get_company_id();

        $whereClients = ['Clients.company_id' => $company_id];
        $totalClients = $this->Clients->find('all', ['conditions' => $whereClients])->count();

        $whereCompletedActivities = [
            'Activities.company_id' => $company_id,
            'Activities.status' => 40, // Only completed activities
            'Activities.end_date >=' => date('Y-m-d', strtotime('-1 week')) . ' 00:00:00'
        ];
        $totalCompletedActivities = $this->Activities->find('all', ['conditions' => $whereCompletedActivities])->count();

        $wherePendingActivities = [
            'Activities.company_id' => $company_id,
            'Activities.status' => 10 // Only pending activities
        ];
        $totalPendingActivities = $this->Activities->find('all', ['conditions' => $wherePendingActivities])->count();

        $whereInProgressDeals = [
            'Deals.company_id' => $company_id,
            'Deals.status' => 20 // Only in progress deals 
        ];
        $totalInProgressDeals = $this->Deals->find('all', ['conditions' => $whereInProgressDeals])->count();

        $whereTodayActivities = [
            'Activities.company_id' => $company_id,
            'Activities.start_date <=' => date('Y-m-d') . ' 23:59:59',
            'Activities.end_date >=' => date('Y-m-d') . ' 00:00:00'
        ];
        $todayActivities = $this->Activities->find('all', ['conditions' => $whereTodayActivities])->contain(['ActivityTypes', 'Clients']);

        $sql = "
            SELECT *
              FROM (
                SELECT *
                  ,DATE_ADD( MAKEDATE( YEAR( NOW() ), DAYOFYEAR( birthdate ) )
                            ,INTERVAL IF( DAYOFYEAR( birthdate ) < DAYOFYEAR( NOW() ), 1, 0 ) YEAR
                           )
                   AS next_birthday

              FROM clients WHERE clients.company_id = {$company_id}
            ) a

            WHERE a.next_birthday < DATE_ADD( NOW(), INTERVAL 90 DAY )

            ORDER BY a.next_birthday ASC

            LIMIT 10";
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute($sql);
        $upcomingBirthdates = $stmt->fetchAll('assoc');

        $this->set(compact('totalClients', 'totalCompletedActivities', 'totalPendingActivities', 'totalInProgressDeals', 'upcomingBirthdates', 'todayActivities'));

    }

}
