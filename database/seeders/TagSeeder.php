<?php

namespace Database\Seeders;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Web Design'
            ],
            [
                'name' => 'HTML'
            ],
            [
                'name' => 'JavaScript'
            ],
            [
                'name' => 'PHP'
            ],
            [
                'name' => 'Laravel'
            ],
            [
                'name' => 'CSS'
            ],
            [
                'name' => 'NodeJs'
            ],
            [
                'name' => 'Vue Js'
            ],
            [
                'name' => 'Mongo DB'
            ],
            [
                'name' => 'Python'
            ]
        ];

        foreach($data as $record) {
            Tag::create($record);
        }
    }
}
