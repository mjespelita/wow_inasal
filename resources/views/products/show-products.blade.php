
@extends('layouts.main')

@section('content')
    <h1>Products Details</h1>

    <div class='card'>
        <div class='card-body'>
            <div class='table-responsive'>
                <table class='table'>

        <tr>
            <th>Product ID</th>
            <td>{{ $item->product_id }}</td>
        </tr>

        <tr>
            <th>Name</th>
            <td>{{ $item->name }}</td>
        </tr>

        <tr>
            <th>Description</th>
            <td>{{ $item->description }}</td>
        </tr>

        <tr>
            <th>Price</th>
            <td>₱{{ Smark\Smark\Math::convertToMoneyFormat($item->price) }}</td>
        </tr>

                    <tr>
                        <th>Created At</th>
                        <td>{{ Smark\Smark\Dater::humanReadableDateWithDayAndTime($item->created_at) }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ Smark\Smark\Dater::humanReadableDateWithDayAndTime($item->updated_at) }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <a href='{{ route('products.index') }}' class='btn btn-primary'>Back to List</a>
@endsection
