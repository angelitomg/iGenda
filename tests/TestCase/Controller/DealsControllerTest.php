<?php
namespace App\Test\TestCase\Controller;

use App\Controller\DealsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\DealsController Test Case
 */
class DealsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.deals',
        'app.clients',
        'app.users',
        'app.companies',
        'app.activities',
        'app.activity_types',
        'app.client_services',
        'app.services',
        'app.deals_services',
        'app.permissions',
        'app.users_permissions'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
