
@extends('layouts.main')

@section('content')
    <h1>Create a new orderitems</h1>

    <div class='card'>
        <div class='card-body'>
            <form action='{{ route('orderitems.store') }}' method='POST'>
                @csrf
                
        <div class='form-group'>
            <label for='name'>Orders_id</label>
            <input type='text' class='form-control' id='orders_id' name='orders_id' required>
        </div>
    
        <div class='form-group'>
            <label for='name'>Orders_users_id</label>
            <input type='text' class='form-control' id='orders_users_id' name='orders_users_id' required>
        </div>
    
        <div class='form-group'>
            <label for='name'>Products_id</label>
            <input type='text' class='form-control' id='products_id' name='products_id' required>
        </div>
    
        <div class='form-group'>
            <label for='name'>Quantity</label>
            <input type='text' class='form-control' id='quantity' name='quantity' required>
        </div>
    
                <button type='submit' class='btn btn-primary mt-3'>Create</button>
            </form>
        </div>
    </div>

@endsection
