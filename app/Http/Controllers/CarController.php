<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Brand;
use App\Models\Client;
use App\Models\Engine;
use Ramsey\Uuid\Type\Integer;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::with('engine')->orderByDesc('id')->get();

        return view('cars.index', compact(['cars']));
    }

    public function interesting()
    {
        $avgAge = $this->findAverageAge();
        $mostPopularBrand = $this->findMostPopularModel();
        $avgHpByType = $this->avgHpByType();
        return view('cars.interesting', compact(['avgAge', 'mostPopularBrand', 'avgHpByType']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $clients = Client::all();
        $engines = Engine::where('car_id', null)->get();
        return view('cars.create', compact(['engines', 'clients', 'brands']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        $data = $request->validated();
        $brand = Brand::find($data['brand_id']);
        if(!$brand) {
            return redirect()->route('cars.index')->withErrors('Брэнд не найден');
        }
        $car = Car::create([
            'number' => $data['number'],
            'brand_id' => $data['brand_id'],
            'seats' => $data['seats'],
            'year' => $data['year'],
            'client_id' => $data['owner'],
        ]);
        $engine = Engine::find($data['engine']);
        $engine->car_id = $car->id;
        $engine->save();
        return redirect()->route('cars.index')->withSuccess('Авто успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('cars.show', compact(['car']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $brands = Brand::all();
        $clients = Client::all();
        $engines = Engine::where('car_id', null)->get();
        return view('cars.edit', compact(['car', 'engines', 'clients', 'brands']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $data = $request->validated();
        $car->engine->update([
            'car_id' => null,
        ]);
        $engine = Engine::find($data['engine']);
        $engine->car_id = $car->id;
        $engine->save();
        $car->update([
            'number' => $data['number'],
            'brand' => $data['brand'],
            'seats' => $data['seats'],
            'year' => $data['year'],
            'client_id' => $data['owner'],
        ]);
        return redirect()->route('cars.show', $car);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        $car->engine->delete();
        return redirect()->back();
    }


    public function oldest()
    {
        $oldestCar = null;
        $year = 2024;
        $cars = Car::all();
        foreach ($cars as $car) {
            if ($car['year'] < $year) {
                $year = $car['year'];
                $oldestCar = $car;
            }
        }
        $car = $oldestCar;
        $title = "Самая старая машина";
        return view('cars.show', compact(['car', 'title']));
    }

    public static function findNewestCar()
    {
        $newestCar = null;
        $year = 0;
        $cars = Car::all();
        foreach ($cars as $car) {
            if ($car['year'] > $year) {
                $year = $car['year'];
                $newestCar = $car;
            }
        }
        return $newestCar;;
    }


    private function findAverageAge(): int
    {
        $cars = Car::all();
        $currentYear = 2024;
        $totalAge = 0;
        $carCount = count($cars);

        foreach ($cars as $car) {
            $carAge = $currentYear - $car['year'];
            $totalAge += $carAge;
        }
        $averageAge = round($totalAge / $carCount);

        return $averageAge;
    }


    private function findMostPopularModel()
    {
        $modelCounts = [];
        $cars = Car::all();
        foreach ($cars as $car) {
            $model = $car->brand->name;
            if (isset($modelCounts[$model])) {
                $modelCounts[$model]++;
            } else {
                $modelCounts[$model] = 1;
            }
        }
        $mostPopularModel = null;
        $maxCount = 0;
        foreach ($modelCounts as $model => $count) {
            if ($count > $maxCount) {
                $maxCount = $count;
                $mostPopularModel = $model;
            }
        }

        return $mostPopularModel;
    }


    public static function findMostPopularSeats()
    {
        $seatsCounts = [];
        $cars = Car::all();
        foreach ($cars as $car) {
            $seats = $car->seats;
            if (isset($seatsCounts[$seats])) {
                $seatsCounts[$seats]++;
            } else {
                $seatsCounts[$seats] = 1;
            }
        }
        $mostPopularSeats = null;
        $maxCount = 0;
        foreach ($seatsCounts as $seats => $count) {
            if ($count > $maxCount) {
                $maxCount = $count;
                $mostPopularSeats = $seats;
            }
        }

        return $mostPopularSeats;
    }

    public function mostPowerfullHp()
    {
        $powerfullHp = 0;
        $mostPowerfullHp = null;
        foreach (Car::all() as $car) {
            if ($car->engine->hp > $powerfullHp) {
                $powerfullHp = $car->engine->hp;
                $mostPowerfullHp = $car;
            }
        }
        $car = $mostPowerfullHp;
        $title = "Самый мощный двигатель";
        return view('cars.show', compact(['car', 'title']));
    }

    public function avgHpByType(): array
    {
        $result = [];
        $cars = Car::with('engine.type_engine')->get();
        $engines = $cars->pluck('engine')->whereNotNull();
        $types = $engines->pluck('type_engine')->unique();

        foreach ($types as $type) {
            $filteredEngines = $engines->filter(function ($engine) use ($type) {
                return $engine->type_engine->id === $type->id;
            });
            $avgHp = $filteredEngines->avg('hp');
            $result[$type->name] = $avgHp;
        }

        return $result;
    }


    public function bestEngineCar()
    {
        $bestPowerByLitre = 0;
        $bestEngineCar = null;
        foreach (Car::all() as $car) {
            if ($car->engine->hp / $car->engine->volume > $bestPowerByLitre) {
                $bestPowerByLitre = $car->engine->hp / $car->engine->volume;
                $bestEngineCar = $car;
            }
        }
        $car = $bestEngineCar;
        $title = "Машина с самым лучшим движком";
        return view('cars.show', compact(['car', 'title']));
    }
}
