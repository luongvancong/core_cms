<?php

use Illuminate\Database\Seeder;
use Modules\User\Repositories\User;
use Modules\User\Repositories\Chmod\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            "email" => "admin@webbase.xyz",
            "password" => bcrypt("12345678"),
            "name" => "Admin",
            "nickname" => "Black Bear",
            "phone" => "0901452368",
            "address" => "HN",
            "gender" => 1,
            "active" => 1
        ];

        $roles = [
            [
                "name" => "root",
                "display_name" => "Root",
                "description" => "Root",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "name" => "superadmin",
                "display_name" => "Super Admin",
                "description" => "Super Admin",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ]
        ];

        // Tạo admin user
        $adminUser = User::where('email', $admin['email'])->first();
        if(!$adminUser) {
            $adminUser = new User($admin);
            $adminUser->save();
        }

        // Tạo role nếu chưa có
        foreach($roles as $role) {
            $roleExist = Role::where('name', $role['name'])->first();
            if(!$roleExist) {
                $roleExist = new Role($role);
                $roleExist->save();
            }
            $adminUser->roles()->attach($roleExist->id);
        }
    }
}
