
@extends('layouts.main')

@section('content')
    <h1>Edit Orderstatuslogs</h1>

    <div class='card'>
        <div class='card-body'>
            <form action='{{ route('orderstatuslogs.update', $item->id) }}' method='POST'>
                @csrf
                
        <div class='form-group'>
            <label for='name'>Orders_id</label>
            <input type='text' class='form-control' id='orders_id' name='orders_id' value='{{ $item->orders_id }}' required>
        </div>
    
        <div class='form-group'>
            <label for='name'>Orders_users_id</label>
            <input type='text' class='form-control' id='orders_users_id' name='orders_users_id' value='{{ $item->orders_users_id }}' required>
        </div>
    
        <div class='form-group'>
            <label for='name'>Users_id</label>
            <input type='text' class='form-control' id='users_id' name='users_id' value='{{ $item->users_id }}' required>
        </div>
    
        <div class='form-group'>
            <label for='name'>Status</label>
            <input type='text' class='form-control' id='status' name='status' value='{{ $item->status }}' required>
        </div>
    
                <button type='submit' class='btn btn-primary mt-3'>Update</button>
            </form>
        </div>
    </div>

@endsection
