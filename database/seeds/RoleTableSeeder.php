<?php
use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //add role
        $roles = [
           	[
        		'name' => 'admin',
        		'display_name' => 'Admin',
        		'description' => 'only 1 admin in aplication',
        	],
           	[
        		'name' => 'pengurus',
        		'display_name' => 'Pengurus',
        		'description' => 'Access for Pengurus',
        	],
        	[
        		'name' => 'anggota',
        		'display_name' => 'Anggota',
        		'description' => 'Access for Anggota',
        	],
        	[
        		'name' => 'Pengawas',
        		'display_name' => 'Pengawas',
        		'description' => 'Access for Pengawas',
        	],
        ];
		foreach ($roles as $key => $value) {
		            Role::create($value);
		        }
		//add user
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@local.host',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'user1',
                'email' => 'user1@local.local',
                'password' => bcrypt('user1'),
            ],
        ];
        $n=1;
        foreach ($users as $key => $value) {
            $user=User::create($value);
            $user->attachRole($n);
            $n++;
        }
    }
}