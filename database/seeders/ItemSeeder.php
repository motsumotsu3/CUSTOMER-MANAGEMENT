<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
            'name' => 'ゲーム',
            'memo' => 'ゲームの詳細',
            'price' => 10000
            ],
            [
            'name' => '机',
            'memo' => '机の詳細',
            'price' => 8000
            ],[
            'name' => '冷蔵庫',
            'memo' => '冷蔵庫の詳細',
            'price' => 23000
            ]
        ]);
    }
}
