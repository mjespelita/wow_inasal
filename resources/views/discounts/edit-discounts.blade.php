
@extends('layouts.main')

@section('content')
    <h1>Edit Discounts</h1>

    <div class='card'>
        <div class='card-body'>
            <form action='{{ route('discounts.update', $item->id) }}' method='POST'>
                @csrf

        <div class='form-group'>
            {{-- <label for='name'>Users_id</label> --}}
            <input type='text' class='form-control' id='users_id' name='users_id' value='{{ $item->users_id }}' required hidden>
        </div>

        <div class='form-group'>
            <label for='name'>Name</label>
            <input type='text' class='form-control' id='name' name='name' value='{{ $item->name }}' required>
        </div>

        <div class='form-group'>
            <label for='name'>Discount</label>
            <input type='number' class='form-control' id='discount' name='discount' value='{{ $item->discount }}' required>
        </div>

                <button type='submit' class='btn btn-primary mt-3'>Update</button>
            </form>
        </div>
    </div>

@endsection
