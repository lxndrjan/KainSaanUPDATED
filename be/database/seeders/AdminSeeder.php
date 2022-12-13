<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{User, AdminAccount};

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = User::create([
            'email'    => 'admin@admin.com',
            'password' => 'admin',
            'role_id'  => 1
        ]);

        $adminInfo = AdminAccount::create([
            'user_id' => $account->id
        ]);
    }
}
