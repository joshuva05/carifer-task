@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Cars List</div>
    <div class="card-body">
        @can('create-product')
            <a href="{{ route('cars.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Car</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Make</th>
                <th scope="col">Model</th>
                <th scope="col">Year</th>
                <th scope="col">Colour</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cars as $car)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->make }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->color }}</td>

                    <td>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('cars.show', $car->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-product')
                                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-product')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Cars Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $cars->links() }}

    </div>
</div>
@endsection
