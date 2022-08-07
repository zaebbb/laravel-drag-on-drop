<?php

namespace Database\Seeders;

use App\Models\Prod;
use Illuminate\Database\Seeder;

class ProdTableSeeder extends Seeder
{
    static $prods = [
        0 => [
            'id' => 1,
            'category_id' => 8,
            'title' => 'Товар ГОСТ 1',
            'fields' => [
                'ГОСТ'=> 1
            ]
        ],
        1 => [
            'id' => 2,
            'category_id' => 8,
            'title' => 'Товар ГОСТ 1',
            'fields' => [
                'ГОСТ'=> 1
            ]
        ],
        2 => [
            'id' => 3,
            'category_id' => 9,
            'title' => 'Товар ГОСТ 2',
            'fields' => [
                'ГОСТ'=> 2
            ]
        ],
        3 => [
            'id' => 4,
            'category_id' => 9,
            'title' => 'Товар ГОСТ 2',
            'fields' => [
                'ГОСТ'=> 2
            ]
        ],
        4 => [
            'id' => 5,
            'category_id' => 10,
            'title' => 'Товар ГОСТ 3',
            'fields' => [
                'ГОСТ'=> 3
            ]
        ],
        5 => [
            'id' => 6,
            'category_id' => 10,
            'title' => 'Товар ГОСТ 3',
            'fields' => [
                'ГОСТ'=> 3
            ]
        ],
        6 => [
            'id' => 7,
            'category_id' => 11,
            'title' => 'Товар ГОСТ 4',
            'fields' => [
                'ГОСТ'=> 4
            ]
        ],
        7 => [
            'id' => 8,
            'category_id' => 11,
            'title' => 'Товар ГОСТ 4',
            'fields' => [
                'ГОСТ'=> 4
            ]
        ],
        8 => [
            'id' => 9,
            'category_id' => 12,
            'title' => 'Товар ГОСТ 5',
            'fields' => [
                'ГОСТ'=> 5
            ]
        ],
        9 => [
            'id' => 10,
            'category_id' => 12,
            'title' => 'Товар ГОСТ 5',
            'fields' => [
                'ГОСТ'=> 5
            ]
        ],
        10 => [
            'id' => 11,
            'category_id' => 13,
            'title' => 'Товар ГОСТ 6',
            'fields' => [
                'ГОСТ'=> 6
            ]
        ],
        11 => [
            'id' => 12,
            'category_id' => 13,
            'title' => 'Товар ГОСТ 6',
            'fields' => [
                'ГОСТ'=> 6
            ]
        ],
        12 => [
            'id' => 13,
            'category_id' => 17,
            'title' => 'Товар ГОСТ 7',
            'fields' => [
                'ГОСТ'=> 7
            ]
        ],
        13 => [
            'id' => 14,
            'category_id' => 17,
            'title' => 'Товар ГОСТ 7',
            'fields' => [
                'ГОСТ'=> 7
            ]
        ],
        14 => [
            'id' => 15,
            'category_id' => 19,
            'title' => 'Товар ГОСТ 22',
            'fields' => [
                'ГОСТ'=> 22
            ]
        ],
        15 => [
            'id' => 16,
            'category_id' => 19,
            'title' => 'Товар ГОСТ 22',
            'fields' => [
                'ГОСТ'=> 22
            ]
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        foreach (self::$prods as $prod) {
            Prod::create($prod);
        }
    }
}
