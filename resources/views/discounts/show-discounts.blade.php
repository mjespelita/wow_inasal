
@extends('layouts.main')

@section('content')
    <h1>Discounts Details</h1>

    <div class='card'>
        <div class='card-body'>
            <div class='table-responsive'>
                <table class='table'>

        <tr>
            <th>Added by</th>
            <td>{{ $item->users->name ?? "no data" }}</td>
        </tr>

        <tr>
            <th>Name</th>
            <td>{{ $item->name }}</td>
        </tr>

        <tr>
            <th>Discount</th>
            <td>{{ $item->discount }}%</td>
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

    <a href='{{ route('discounts.index') }}' class='btn btn-primary'>Back to List</a>
@endsection
