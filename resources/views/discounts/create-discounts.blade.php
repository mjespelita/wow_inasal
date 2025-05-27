
@extends('layouts.main')

@section('content')
    <h1>Create a new discounts</h1>

    <div class='card'>
        <div class='card-body'>
            <form action='{{ route('discounts.store') }}' method='POST'>
                @csrf

        <div class='form-group'>
            {{-- <label for='name'>Users_id</label> --}}
            <input type='text' class='form-control' id='users_id' name='users_id' required value="{{ Auth::user()->id }}" hidden>
        </div>

        <div class='form-group'>
            <label for='name'>Name</label>
            <input type='text' class='form-control' id='name' name='name' required>
        </div>

        <div class='form-group'>
            <label for='name'>Discount</label>
            <input type='number' class='form-control' id='discount' name='discount' required>
        </div>

                <button type='submit' class='btn btn-primary mt-3'>Create</button>
            </form>
        </div>
    </div>

@endsection
