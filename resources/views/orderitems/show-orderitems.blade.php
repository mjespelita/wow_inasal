
@extends('layouts.main')

@section('content')
    <h1>Orderitems Details</h1>

    <div class='card'>
        <div class='card-body'>
            <div class='table-responsive'>
                <table class='table'>
                    <tr>
                        <th>ID</th>
                        <td>{{ $item->id }}</td>
                    </tr>
                    
        <tr>
            <th>Orders_id</th>
            <td>{{ $item->orders_id }}</td>
        </tr>
    
        <tr>
            <th>Orders_users_id</th>
            <td>{{ $item->orders_users_id }}</td>
        </tr>
    
        <tr>
            <th>Products_id</th>
            <td>{{ $item->products_id }}</td>
        </tr>
    
        <tr>
            <th>Quantity</th>
            <td>{{ $item->quantity }}</td>
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

    <a href='{{ route('orderitems.index') }}' class='btn btn-primary'>Back to List</a>
@endsection
