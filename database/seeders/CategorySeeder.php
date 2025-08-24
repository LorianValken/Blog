<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'name' => 'frontend'
            ],
            [
                'name' => 'Backend'
            ],
            [
                'name' => 'DataBase'
            ],
            [
                'name' => 'DevOp'
            ]
        ];
        foreach($data as $record) {
            Category::create($record);
        }
    }
}
