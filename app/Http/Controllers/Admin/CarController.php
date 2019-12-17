<?php

namespace App\Http\Controllers\Admin;

use App\Car;
use App\Location;
use App\CarAvailability;
use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CarController extends AdminController
{
    /**
     * @var Car
     */
    private $car;

    /**
     * @var CarAvailability
     */
    private $carAvailability;

    /**
     * @var Location
     */
    private $location;

    /**
     * CarController constructor.
     * @param Car $car
     * @param CarAvailability $carAvailability
     * @param Location $location
     */
    public function __construct(Car $car, CarAvailability $carAvailability, Location $location)
    {
        $this->car = $car;
        $this->carAvailability = $carAvailability;
        $this->location = $location;

        parent::__construct();
        $this->title = 'Car';
        $this->breadcrumbs = [['route' => route('admin.car.index'), 'item' => 'Car']];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->view->with('cars', $this->car->all()->load('location'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view
            ->with('locations', $this->location->all()->load('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CarRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(CarRequest $request)
    {
        $this->car->title = $request->title;
        $this->car->type = $request->type;
        $this->car->sort = $request->sort;
        $this->car->status = $request->status;
        $this->car->bags = $request->bags;
        $this->car->doors = $request->doors;
        $this->car->condition = $request->condition;
        $this->car->adult_min = $request->adult_min;
        $this->car->adult_max = $request->adult_max;
        $this->car->adult_max = $request->adult_max;
        $this->car->price = $request->price;
        $this->car->location_id = $request->location;
        $this->car->img = $this->mediaUpload($request);

        DB::beginTransaction();
            if ($this->car->img && $this->car->save()) {

                if($this->car->availabilities()->createMany($this->detailSave($request)))
                {
                    DB::commit();
                    return redirect()->route('admin.car.index')
                        ->with(['status' => 'Car saved successfully']);
                }
            }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Car $car
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Car $car)
    {
        return $this->view
            ->with('car', $car)
            ->with('locations', $this->location->all()->load('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Car $car
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, Car $car)
    {
        $car->title = $request->get('title', $car->title);
        $car->type = $request->get('type', $car->type);
        $car->sort = $request->get('sort', $car->sort);
        $car->status = $request->get('status', $car->status);
        $car->bags = $request->get('bags', $car->bags);
        $car->doors = $request->get('doors', $car->doors);
        $car->condition = $request->get('condition', $car->condition);
        $car->adult_min = $request->get('adult_min', $car->adult_min);
        $car->adult_max = $request->get('adult_max', $car->adult_max);
        $car->price = $request->get('price', $car->price);
        $car->location_id = $request->get('location', $car->location_id);
        if($request->img)
        {
            $car->img = $this->mediaUpload($request);
        }

        DB::beginTransaction();
        if ($car->img && $car->save())
        {
            if($this->detailUpdate($request, $car))
            {
                DB::commit();
                return redirect()->route('admin.car.index')
                    ->with(['status' => 'Car updated successfully']);
            }
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Car $car
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Car $car)
    {
        if($this->useCheck($car) && $car->delete()){
            $this->mediaDelete($car);

            return redirect()->route('admin.car.index')
                ->with('status', 'Car deleted successfully');
        }
        return back()->with('error', 'Error');
    }

    /**
     * Check Car on used Oreders
     *
     * @param Car $car
     * @return bool
     */
    protected function useCheck($car)
    {
        return true;
    }

    /**
     * @param Request $request
     * @return array|bool
     */
    private function detailSave(Request $request)
    {
        $start = $request->detailCurrentDateStart;
        $end = $request->detailCurrentDateEnd;

        if($start && $end){
            $carAvailabilities = [];
            for($i = strtotime($start . ' 00:00'); $i <= strtotime($end . ' 00:00'); $i = $i + 3600)
            {
                $carAvailabilities[] = [
                    'date' => $i,
                    'car_id' => $this->car->id,
                ];
            }
            return $carAvailabilities;
        }
        return false;
    }

    /**
     * @param Request $request
     * @param Car $car
     * @return bool
     */
    private function detailUpdate(Request $request, $car)
    {
        $start = $request->detailCurrentDateStart;
        $end = $request->detailCurrentDateEnd;

        if($start && $end){
            for($i = strtotime($start . ' 00:00'); $i <= strtotime($end . ' 00:00'); $i = $i + 3600)
            {
                $car->availabilities()->where('date', $i)->updateOrInsert([
                        'date'   => $i,
                        'car_id' => $car->id
                    ]
                );
            }
            return true;
        }
        return false;
    }


    /**
     * @param Request $request
     * @return array|bool
     */
    private function mediaUpload(Request $request)
    {
        if ($request->hasFile("media")){
            $mediaUploaded = [];
            $i = 0;
            foreach ($request->file("media") as $media){
                $upload = $media->store('cars', 'public');

                if($upload){
                    $mediaUploaded[$i] = str_replace('cars/', '', $upload);
                }
                if($media->isFile()){
//                    unlink($media->getRealPath());
                }
                $i++;
            }
            return $mediaUploaded;
        }
        return false;
    }

    /**
     * @param Car $car
     * @return void
     */
    private function mediaDelete($car)
    {
        foreach ($car->img as $media)
        {
            Storage::delete('cars/' . $media);
        }
    }
}
