<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Role::factory()->create(
            ['name' => 'Admin']
        );
        \App\Models\Role::factory()->create(
            ['name' => 'Cashier']
        );

        \App\Models\Employee::factory()->create([
            'name' => 'Muhammad Amar',
            'gender' => 1,
            'photo' => 'https://randomuser.me/api/portraits/men/1.jpg',
            'email' => 'admin@test.com',
            'phone_number' => '+62 812 888 888',
            'role_id' => 1,
        ]);
        \App\Models\Employee::factory()->create([
            'name' => 'Andre Apriyana',
            'gender' => 1,
            'photo' => 'https://randomuser.me/api/portraits/men/2.jpg',
            'email' => 'admin@test.com',
            'phone_number' => '+62 812 888 888',
            'role_id' => 1,
        ]);

        \App\Models\Employee::factory(5)->create();


        \App\Models\User::factory()->create([
            'username' => 'amar',
            'password' => Hash::make('amar123'),
            'employee_id' => 1,

        ]);
        \App\Models\User::factory()->create([
            'username' => 'andre',
            'password' => Hash::make('andre123'),
            'employee_id' => 2,
        ]);
        \App\Models\User::factory()->create([
            'username' => 'cashier',
            'password' => Hash::make('cashier123'),
            'employee_id' => 3,
        ]);
        \App\Models\User::factory()->create([
            'username' => 'cashier2',
            'password' => Hash::make('cashier123'),
            'employee_id' => 4,
        ]);

        \App\Models\Product::factory()->create([
            'code' => 'K001',
            'name' => 'Kulkas LG',
            'vendor_id' => 1,
            'buying_price' => 2500000,
            'selling_price' => 3500000,
            'stock' => 10
        ]);
        \App\Models\Product::factory()->create([
            'code' => 'K002',
            'name' => 'Kulkas Panasonic',
            'vendor_id' => 2,
            'buying_price' => 2000000,
            'selling_price' => 3000000,
            'stock' => 10
        ]);
        \App\Models\Product::factory()->create([
            'code' => 'K003',
            'name' => 'Kulkas Sharp',
            'vendor_id' => 3,
            'buying_price' => 2300000,
            'selling_price' => 3300000,
            'stock' => 10
        ]);
        \App\Models\Product::factory()->create([
            'code' => 'K004',
            'name' => 'Kulkas Aqua',
            'vendor_id' => 4,
            'buying_price' => 2500000,
            'selling_price' => 3500000,
            'stock' => 10
        ]);
        \App\Models\Product::factory()->create([
            'code' => 'K005',
            'name' => 'Kulkas Aqua 2',
            'vendor_id' => 4,
            'buying_price' => 2500000,
            'selling_price' => 3500000,
            'stock' => 10
        ]);
        \App\Models\Product::factory()->create([
            'code' => 'K006',
            'name' => 'Kulkas Aqua 3',
            'vendor_id' => 4,
            'buying_price' => 2500000,
            'selling_price' => 3500000,
            'stock' => 10
        ]);
        \App\Models\Product::factory()->create([
            'code' => 'K007',
            'name' => 'Kulkas Aqua 4',
            'vendor_id' => 4,
            'buying_price' => 2500000,
            'selling_price' => 3500000,
            'stock' => 10
        ]);
        \App\Models\Vendor::factory()->create([
            'name' => 'LG'
        ]);
        \App\Models\Vendor::factory()->create([
            'name' => 'Panasonic'
        ]);
        \App\Models\Vendor::factory()->create([
            'name' => 'Sharp'
        ]);
        \App\Models\Vendor::factory()->create([
            'name' => 'Aqua'
        ]);
    }
}
