<?php
use Migrations\AbstractSeed;

/**
 * Permissions seed.
 */
class PermissionsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Add Activities', 'path' => 'Activities/add'],
            ['name' => 'Edit Activities', 'path' => 'Activities/edit'],
            ['name' => 'List Activities', 'path' => 'Activities/index'],
            ['name' => 'View Activities', 'path' => 'Activities/view'],
            ['name' => 'Delete Activities', 'path' => 'Activities/delete'],
            ['name' => 'Add Clients', 'path' => 'Clients/add'],
            ['name' => 'Edit Clients', 'path' => 'Clients/edit'],
            ['name' => 'List Clients', 'path' => 'Clients/index'],
            ['name' => 'View Clients', 'path' => 'Clients/view'],
            ['name' => 'Delete Clients', 'path' => 'Clients/delete'],
            ['name' => 'Add Services', 'path' => 'Services/add'],
            ['name' => 'Edit Services', 'path' => 'Services/edit'],
            ['name' => 'List Services', 'path' => 'Services/index'],
            ['name' => 'Delete Services', 'path' => 'Services/delete'],
            ['name' => 'Add Activity Types', 'path' => 'ActivityTypes/add'],
            ['name' => 'Edit Activity Types', 'path' => 'ActivityTypes/edit'],
            ['name' => 'List Activity Types', 'path' => 'ActivityTypes/index'],
            ['name' => 'Delete Activity Types', 'path' => 'ActivityTypes/delete'],
            ['name' => 'Add Users', 'path' => 'Users/add'],
            ['name' => 'Edit Users', 'path' => 'Users/edit'],
            ['name' => 'List Users', 'path' => 'Users/index'],
            ['name' => 'Delete Users', 'path' => 'Users/delete'],
            ['name' => 'Edit Company Info', 'path' => 'Companies/edit'],
            ['name' => 'Add Deals', 'path' => 'Deals/add'],
            ['name' => 'Edit Deals', 'path' => 'Deals/edit'],
            ['name' => 'List Deals', 'path' => 'Deals/index'],
            ['name' => 'View Deals', 'path' => 'Deals/view'],
            ['name' => 'Delete Deals', 'path' => 'Deals/delete'],
            ['name' => 'View Activities Calendar', 'path' => 'Activities/calendar'],
        ];

        $table = $this->table('permissions');
        $table->insert($data)->save();
    }
}
