
@extends('layouts.main')

@section('content')
    <h1>Edit Orders</h1>

    <div class='card'>
        <div class='card-body'>
            <form action='{{ route('orders.update', $item->id) }}' method='POST'>
                @csrf
                
        <div class='form-group'>
            <label for='name'>Status</label>
            <input type='text' class='form-control' id='status' name='status' value='{{ $item->status }}' required>
        </div>
    
        <div class='form-group'>
            <label for='name'>Sent_to_kitchen_at</label>
            <input type='text' class='form-control' id='sent_to_kitchen_at' name='sent_to_kitchen_at' value='{{ $item->sent_to_kitchen_at }}' required>
        </div>
    
        <div class='form-group'>
            <label for='name'>Done_at</label>
            <input type='text' class='form-control' id='done_at' name='done_at' value='{{ $item->done_at }}' required>
        </div>
    
        <div class='form-group'>
            <label for='name'>Users_id</label>
            <input type='text' class='form-control' id='users_id' name='users_id' value='{{ $item->users_id }}' required>
        </div>
    
                <button type='submit' class='btn btn-primary mt-3'>Update</button>
            </form>
        </div>
    </div>

@endsection
