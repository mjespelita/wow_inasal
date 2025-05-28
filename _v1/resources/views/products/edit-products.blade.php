
@extends('layouts.main')

@section('content')
    <h1>Edit Products</h1>

    <div class='card'>
        <div class='card-body'>
            <form action='{{ route('products.update', $item->id) }}' method='POST'>
                @csrf

        <div class='form-group'>
            <label for='name'>Product Id</label>
            <input type='text' class='form-control' id='product_id' name='product_id' value='{{ $item->product_id }}' required>
        </div>

        <div class='form-group'>
            <label for='name'>Name</label>
            <input type='text' class='form-control' id='name' name='name' value='{{ $item->name }}' required>
        </div>

        <div class='form-group'>
            <label for='name'>Description</label>
            <textarea name="description" id="" cols="30" class="form-control" rows="10" placeholder="Type here..." required>{{ $item->description }}</textarea>
        </div>

        <!-- Real-time price preview -->
        <div class="form-group p-4">
            <h1 id="formatted-price" style="font-weight: bold; font-size: 1.2rem;">₱{{ Smark\Smark\Math::convertToMoneyFormat($item->price) }}</h1>
        </div>

        <div class='form-group'>
            <label for='name'>Price</label>
            <input type='number' class='form-control' id='price' name='price' value='{{ $item->price }}' required>
        </div>

                <button type='submit' class='btn btn-primary mt-3'>Update</button>
            </form>
        </div>
    </div>

    <!-- jQuery Script (make sure jQuery is loaded) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery logic -->
    <script>
        function formatMoney(value) {
            const number = parseFloat(value);
            if (isNaN(number)) return '₱0.00';
            return '₱' + number.toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        $(document).ready(function () {
            $('#price').on('input', function () {
                const rawValue = $(this).val();
                $('#formatted-price').text(formatMoney(rawValue));
            });
        });
    </script>

@endsection
