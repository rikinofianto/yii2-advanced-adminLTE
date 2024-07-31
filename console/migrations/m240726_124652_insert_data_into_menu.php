<?php

use yii\db\Migration;

/**
 * Class m240726_124652_insert_data_into_menu
 */
class m240726_124652_insert_data_into_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('menu', [
            'id' => 1,
            'name' => 'Administrations',
            'route' => '/admin/assignment/index',
            'icon' => 'fas fa-tools',
        ]);

        $this->insert('menu', [
            'id' => 2,
            'name' => 'Users',
            'route' => '/admin/user/index',
            'icon' => 'fas fa-users',
            'parent' => 1
        ]);

        $this->insert('menu', [
            'id' => 3,
            'name' => 'Assignments',
            'route' => '/admin/assignment/index',
            'icon' => 'fas fa-hands-helping',
            'parent' => 1
        ]);

        $this->insert('menu', [
            'id' => 4,
            'name' => 'Roles',
            'route' => '/admin/role/index',
            'icon' => 'fas fa-user-tag',
            'parent' => 1
        ]);

        $this->insert('menu', [
            'id' => 5,
            'name' => 'Permissions',
            'route' => '/admin/permission/index',
            'icon' => 'fas fa-door-open',
            'parent' => 1
        ]);

        $this->insert('menu', [
            'id' => 6,
            'name' => 'Routes',
            'route' => '/admin/route/index',
            'icon' => 'fas fa-route',
            'parent' => 1
        ]);

        $this->insert('menu', [
            'id' => 7,
            'name' => 'Rules',
            'route' => '/admin/rule/index',
            'icon' => 'fas fa-gavel',
            'parent' => 1
        ]);

        $this->insert('menu', [
            'id' => 8,
            'name' => 'Menus',
            'route' => '/admin/menu/index',
            'icon' => 'fas fa-bars',
            'parent' => 1
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('menu', ['name' => 'Administrations']);
        $this->delete('menu', ['name' => 'Users']);
        $this->delete('menu', ['name' => 'Assignments']);
        $this->delete('menu', ['name' => 'Roles']);
        $this->delete('menu', ['name' => 'Permissions']);
        $this->delete('menu', ['name' => 'Routes']);
        $this->delete('menu', ['name' => 'Rules']);
        $this->delete('menu', ['name' => 'Menus']);
    }
}
