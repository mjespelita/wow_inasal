
@extends('layouts.main')

@section('content')
    <h1>Are you sure you want to delete this orderstatuslogs?</h1>

    <form action='{{ route('orderstatuslogs.destroy', $item->id) }}' method='GET'>
        @csrf
        @method('DELETE')
        <button type='submit' class='btn btn-danger'>Yes, Delete</button>
        <a href='{{ route('orderstatuslogs.index') }}' class='btn btn-secondary'>Cancel</a>
    </form>
@endsection
