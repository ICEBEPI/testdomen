<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function main (): View
    {
        return view('welcome');
    }


    public function show(): View
    {
        $cars = [
            [
                'id' => 1,
                'number' => '111abc02',
                'brand' => 'Nissan',
                'year' => 1991,
                'engine' => [
                    'capacity' => 2.5,
                    'horsePower' => 150,
                    'type' => 'benzine'
                ],
                'steeringWheelLocation' => 'right',
                'numberOfSeats' => 2,
                'serviceList' => [
                    [
                        'year' => 1995,
                        'price' => 1000,
                        'name' => 'Замена шин',
                    ],
                    [
                        'year' => 1999,
                        'price' => 3000,
                        'name' => 'Замена заднего окна',
                    ],
                    [
                        'year' => 2005,
                        'price' => 2000,
                        'name' => 'Замена масла',
                    ],
                    [
                        'year' => 2011,
                        'price' => 3000,
                        'name' => 'Замена масла',
                    ],
                    // added data
                    [
                        'year' => 2005,
                        'price' => 76000,
                        'name' => 'Электротехнические работы',
                    ],
                    [
                        'year' => 2005,
                        'price' => 2000,
                        'name' => 'Покрасочные работы',
                    ],
                ],
            ],

            [
                'id' => 2,
                'number' => '333ttt02',
                'brand' => 'Mercedes-Benz',
                'year' => 2024,
                'engine' => [
                    'capacity' => 3.5,
                    'horsePower' => 500,
                    'type' => 'benzine'
                ],
                'steeringWheelLocation' => 'left',
                'numberOfSeats' => 4,
                'serviceList' => [
                    [
                        'year' => 2024,
                        'price' => 100000,
                        'name' => 'Замена кузова',
                    ],
                    [
                        'year' => 2024,
                        'price' => 100000,
                        'name' => 'Замена кузова',
                    ],
                    // added data
                    [
                        'year' => 2005,
                        'price' => 2000,
                        'name' => 'Диагностика автомобиля.',
                    ],
                    [
                        'year' => 2003,
                        'price' => 662000,
                        'name' => 'Сварочные работы',
                    ],

                ],
            ],
            [
                'id' => 3,
                'number' => '311abc02',
                'brand' => 'Toyota',
                'year' => 2001,
                'engine' => [
                    'capacity' => 3.5,
                    'horsePower' => 200,
                    'type' => 'dizel'
                ],
                'steeringWheelLocation' => 'right',
                'numberOfSeats' => 4,
                'serviceList' => [
                    [
                        'year' => 2005,
                        'price' => 5000,
                        'name' => 'Замена двигателя',
                    ],
                    [
                        'year' => 2007,
                        'price' => 100,
                        'name' => 'Замена антифриза',
                    ],
                    [
                        'year' => 2012,
                        'price' => 1000,
                        'name' => 'Замена колодок',
                    ],
                ],
            ],
            [
                'id' => 4,
                'number' => '411abc02',
                'brand' => 'Lada',
                'year' => 2015,
                'engine' => [
                    'capacity' => 1.5,
                    'horsePower' => 100,
                    'type' => 'benzine'
                ],
                'steeringWheelLocation' => 'right',
                'numberOfSeats' => 4,
                'serviceList' => [
                    [
                        'year' => 2018,
                        'price' => 10000,
                        'name' => 'Замена кузова',
                    ],
                    [
                        'year' => 2022,
                        'price' => 1000,
                        'name' => 'Замена шин',
                    ],
                    // added data
                    [
                        'year' => 2024,
                        'price' => 2000,
                        'name' => 'Регулировку светового оборудования',
                    ],
                    [
                        'year' => 20022,
                        'price' => 20400,
                        'name' => 'Очищение и смазку отдельных элементов',
                    ],

                ],
            ],
            [
                'id' => 5,
                'number' => '511abc02',
                'brand' => 'BMW',
                'year' => 2015,
                'engine' => [
                    'capacity' => 2.5,
                    'horsePower' => 150,
                    'type' => 'benzine'
                ],
                'steeringWheelLocation' => 'right',
                'numberOfSeats' => 2,
                'serviceList' => [
                    [
                        'year' => 2023,
                        'price' => 2000,
                        'name' => 'Замена шин',
                    ],
                ],
            ],
            [
                'id' => 6,
                'number' => '611abc02',
                'brand' => 'Tesla',
                'year' => 2010,
                'engine' => [
                    'capacity' => 2.0,
                    'horsePower' => 150,
                    'type' => 'electricity'
                ],
                'steeringWheelLocation' => 'right',
                'numberOfSeats' => 4,
                'serviceList' => [
                    [
                        'year' => 2015,
                        'price' => 1000,
                        'name' => 'Замена аккумулятора',
                    ],
                    // added data
                    [
                        'year' => 20014,
                        'price' => 2000,
                        'name' => 'Замена шруса',
                    ],
                    [
                        'year' => 2011,
                        'price' => 22000,
                        'name' => 'Замена фильтров',
                    ],
                ],
            ],
            [
                'id' => 7,
                'number' => '711abc02',
                'brand' => 'KIA',
                'year' => 2023,
                'engine' => [
                    'capacity' => 4.5,
                    'horsePower' => 550,
                    'type' => 'benzine'
                ],
                'steeringWheelLocation' => 'left',
                'numberOfSeats' => 8,
                'serviceList' => [
                    [
                        'year' => 2023,
                        'price' => 1000,
                        'name' => 'Замена шин',
                    ],
                    // added data
                    [
                        'year' => 20023,
                        'price' => 2000,
                        'name' => 'ремонт ходовой части',
                    ],
                    [
                        'year' => 2024,
                        'price' => 2000,
                        'name' => 'кузовной ремонт',
                    ],
                ],
            ],
            [
                'id' => 8,
                'number' => '811num02',
                'brand' => 'Audi',
                'year' => 2007,
                'engine' => [
                    'capacity' => 3.5,
                    'horsePower' => 250,
                    'type' => 'dizel'
                ],
                'steeringWheelLocation' => 'right',
                'numberOfSeats' => 4,
                'serviceList' => [
                    [
                        'year' => 2009,
                        'price' => 500,
                        'name' => 'Замена масла в РКПП',
                    ],
                    [
                        'year' => 2012,
                        'price' => 10000,
                        'name' => 'Замена компьютера',
                    ],
                    [
                        'year' => 2022,
                        'price' => 1500,
                        'name' => 'Замена тормозной жидкости',
                    ],
                    [
                        'year' => 2015,
                        'price' => 2000,
                        'name' => 'ремонт электрики',
                    ],
                    [
                        'year' => 2008,
                        'price' => 200000,
                        'name' => 'внешний и внутренний тюнинг',
                    ],
                ],
            ],
        ];
        return view('car', compact(['cars']));
    }

    public function aboutMe(string $param = 'name'): string
    {
        if($param == 'age'){
            return 'Мой возраст 25';
        }
        if($param == 'name'){
            return 'Меня зовут Вася';
        }
        return 'Параметр неверный';
    }
}
