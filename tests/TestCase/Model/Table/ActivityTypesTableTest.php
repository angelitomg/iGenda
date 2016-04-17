<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActivityTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActivityTypesTable Test Case
 */
class ActivityTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActivityTypesTable
     */
    public $ActivityTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.activity_types',
        'app.users',
        'app.companies',
        'app.activities',
        'app.client_services',
        'app.clients',
        'app.services',
        'app.user_permissions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ActivityTypes') ? [] : ['className' => 'App\Model\Table\ActivityTypesTable'];
        $this->ActivityTypes = TableRegistry::get('ActivityTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActivityTypes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
