<?php

use Phinx\Migration\AbstractMigration;
use SONFin\Application;

class CreateUserAdminData extends AbstractMigration
{
    public function up()
    {
        /** @var Application $app */
        $app = require_once __DIR__ . '/../bootstrap.php';
        $auth = $app->service('auth');

        $users = $this->table('users');
         $users->insert([
             'first_name' => 'Admin',
             'last_name' => 'System',
             'email' => 'admin@user.com',
             'password' => $auth->hashPassword('123456'),
             'created_at'      => date('Y-m-d H:i:s'),
             'updated_at'      => date('Y-m-d H:i:s')
         ])->save();
    }

    public function down()
    {
        $this->execute("DELETE FROM users WHERE email = 'admin@user.com' ");
    }
}
