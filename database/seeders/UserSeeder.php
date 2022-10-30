<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Administrator',
            'email'=>'admin@admin.com',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            'password'=>Hash::make('admin12345'),
        ]);

        User::create([
            'name'=>'Ana',
            'email'=>'ana@admin.com',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            'password'=>Hash::make('ana12345'),
        ]);

        User::create([
            'name'=>'hendery',
            'email'=>'hendery@admin.com',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            'password'=>Hash::make('hendery12345'),
        ]);

        User::create([
            'name'=>'lisa',
            'email'=>'lisa@admin.com',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            'password'=>Hash::make('lisa12345'),
        ]);

        User::create([
            'name'=>'mark',
            'email'=>'mark@admin.com',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            'password'=>Hash::make('mark12345'),
        ]);
    }
}
