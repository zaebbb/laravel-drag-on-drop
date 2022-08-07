<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    static $category = [
        0 => [
            'id' => 1,
            'parent_id' => NULL,
            'title' => 'Цветной металлопрокат'
        ],
        1 => [
            'id' => 2,
            'parent_id' => NULL,
            'title' => 'Нержавеющий металлопрокат'
        ],
        2 => [
            'id' => 3,
            'parent_id' => NULL,
            'title' => 'Черный металлопрокат'
        ],
        3 => [
            'id' => 4,
            'parent_id' => NULL,
            'title' => 'Цветной металлопрокат'
        ],
        4 => [
            'id' => 5,
            'parent_id' => 1,
            'title' => 'Анод'
        ],
        5 => [
            'id' => 6,
            'parent_id' => 1,
            'title' => 'Балка'
        ],
        6 => [
            'id' => 7,
            'parent_id' => 1,
            'title' => 'Брусок'
        ],
        7 => [
            'id' => 8,
            'parent_id' => 5,
            'title' => 'Анод кадмий'
        ],
        8 => [
            'id' => 9,
            'parent_id' => 5,
            'title' => 'Анод медный'
        ],
        9 => [
            'id' => 10,
            'parent_id' => 5,
            'title' => 'Анод никелевый'
        ],
        10 => [
            'id' => 11,
            'parent_id' => 6,
            'title' => 'Балка Алюминиевая'
        ],
        11 => [
            'id' => 12,
            'parent_id' => 6,
            'title' => 'Балка магниевая'
        ],
        12 => [
            'id' => 13,
            'parent_id' => 7,
            'title' => 'Брусок Молибденовый'
        ],
        13 => [
            'id' => 14,
            'parent_id' => 7,
            'title' => 'Брусок олово'
        ],
        14 => [
            'id' => 15,
            'parent_id' => 2,
            'title' => 'Балка'
        ],
        15 => [
            'id' => 16,
            'parent_id' => 2,
            'title' => 'Втулка'
        ],
        16 => [
            'id' => 17,
            'parent_id' => 2,
            'title' => 'Дробь'
        ],
        17 => [
            'id' => 18,
            'parent_id' => 3,
            'title' => 'Арматура'
        ],
        18 => [
            'id' => 19,
            'parent_id' => 3,
            'title' => 'Балка'
        ],
        19 => [
            'id' => 20,
            'parent_id' => 3,
            'title' => 'Баллон'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        foreach (self::$category as $cat) {
            Category::create($cat);
        }
    }
}
