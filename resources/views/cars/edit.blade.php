@extends('layouts.app')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Product
                </div>
                <div class="float-end">
                    <a href="{{ route('cars.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('cars.update', $car->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $car->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $car->description }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="make" class="col-md-4 col-form-label text-md-end text-start">Make</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('make') is-invalid @enderror" id="make" name="make" value="{{  $car->make }}">
                            @if ($errors->has('make'))
                                <span class="text-danger">{{ $errors->first('make') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="model" class="col-md-4 col-form-label text-md-end text-start">Model</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" value="{{  $car->model }}">
                            @if ($errors->has('model'))
                                <span class="text-danger">{{ $errors->first('model') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="color" class="col-md-4 col-form-label text-md-end text-start">Colour</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control colorpicker @error('color') is-invalid @enderror" id="color" name="color" value="{{  $car->color }}">
                            @if ($errors->has('color'))
                                <span class="text-danger">{{ $errors->first('color') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="year" class="col-md-4 col-form-label text-md-end text-start">Year</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control datepicker @error('year') is-invalid @enderror" id="year" name="year" value="{{  $car->year }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('year') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="country" class="col-md-4 col-form-label text-md-end text-start">Country</label>
                        <div class="col-md-6">
                            <select class="form-control @error('country') is-invalid @enderror"
                            name="country" id="country">
                            <option value="">Select Country</option>

                            @foreach ($countries as $country)
                                <option  @if($country['iso2'] == $car->country) selected @endif  value="{{ $country['iso2'] }}">{{ $country['name'] }}</option>
                            @endforeach
                        </select>

                            @if ($errors->has('country'))
                                <span class="text-danger">{{ $errors->first('country') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="state" class="col-md-4 col-form-label text-md-end text-start">State</label>
                        <div class="col-md-6">
                            <select class="form-control @error('state') is-invalid @enderror"
                            name="state" id="state">
                            <option value="">Select state</option>
                            @foreach ($states as $state)
                            <option  @if($state['iso2'] == $car->state) selected @endif value="{{ $state['iso2'] }}">{{ $state['name'] }}</option>
                        @endforeach
                        </select>

                            @if ($errors->has('state'))
                                <span class="text-danger">{{ $errors->first('state') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="city" class="col-md-4 col-form-label text-md-end text-start">City</label>
                        <div class="col-md-6">

                            <select class="form-control @error('city') is-invalid @enderror"
                            name="city" id="city">
                            <option value="{{  $car->city }}">{{  $car->city }}</option>
                        </select>
                            @if ($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script>
$(function () {
  $(".datepicker").datepicker({
        format: 'yyyy',
        viewMode: 'years',
        minViewMode: 'years',
        autoclose: true
  });


  $('#country').on('change', function() {
    var url='{{ route('cars.getstates',':id') }}';
    url = url.replace(':id', $(this).val());
    $("#state").empty();

    $.ajax({
            type: "get",
            url: url,
            redirect: true,
            datatype: 'json',
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    if (data) {
                        $("#state").append("<option value=" + data[i]['iso2'] + ">" + data[i]['name'] + "</option>")
                    }
                }
            }
        });
    });

    $('#state').on('change', function() {
    var url='{{ route('cars.getcities',[':country',':state']) }}';
    url = url.replace(':country', $('#country').val());
    url = url.replace(':state', $(this).val());
    $("#city").empty();
    $.ajax({
            type: "get",
            url: url,
            redirect: true,
            datatype: 'json',
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    if (data) {
                        $("#city").append("<option value=" + data[i]['name'] + ">" + data[i]['name'] + "</option>")
                    }
                }
            }
        });
    });


});
</script>
