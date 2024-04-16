@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Car Information
                </div>
                <div class="float-end">
                    <a href="{{ route('cars.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $car->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $car->description }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Make:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $car->make }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Model:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $car->model }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Year:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $car->year }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Colour:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $car->color }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Country:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ isset($country['name']) ? $country['name'] : '-'}}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>State:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{  isset($state['name']) ? $state['name'] : '-'}}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>City:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $car->city ? $car->city : '-'}}
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>

@endsection
