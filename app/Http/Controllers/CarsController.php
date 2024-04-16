<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\DataTables\CarsDataTable;

class CarsController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-product|edit-product|delete-product', ['only' => ['index','show']]);
       $this->middleware('permission:create-product', ['only' => ['create','store']]);
       $this->middleware('permission:edit-product', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-product', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(CarsDataTable $dataTable)
    {
        return view('cars.index', [
            'cars' => Cars::latest()->paginate(5)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $countries=Cars::getAllCountries();

        return view('cars.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request): RedirectResponse
    {
        Cars::create($request->all());
        return redirect()->route('cars.index')
                ->withSuccess('New car is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cars $car)
    {

        $country=Cars::getcountryDetail($car->country);
        $state=Cars::getstateDetail($car->country,$car->state);

        return view('cars.show', [
            'car' => $car,
            'country' =>$country,
            'state'=>$state
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cars $car): View
    {
        $countries=Cars::getAllCountries();
        $states=Cars::getStateByCountries($car->country);

        return view('cars.edit', [
            'car' => $car,
            'countries'=>$countries,
            'states'=>$states
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Cars $car): RedirectResponse
    {
        $car->update($request->all());
        return redirect()->route('cars.index')
                ->withSuccess('Car is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cars $cars): RedirectResponse
    {
            $cars->delete();
            return redirect()->route('cars.index')
                    ->withSuccess('car is deleted successfully.');
    }

    public function getstates($id){
        $states=Cars::getStateByCountries($id);
        return $states;
    }


    public function getcities($country,$state){
        $cities=Cars::getCityByState($country,$state);
        return $cities;
    }
}
