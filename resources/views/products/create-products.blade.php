
@extends('layouts.main')

@section('content')
    <h1>Create a new products</h1>

    <div class='card'>
        <div class='card-body'>
            <form action='{{ route('products.store') }}' method='POST'>
                @csrf

        <div class='form-group'>
            <label for='name'>Product ID</label>
            <input type='text' class='form-control' id='product_id' name='product_id' required>
        </div>

        <div class='form-group'>
            <label for='name'>Name</label>
            <input type='text' class='form-control' id='name' name='name' required>
        </div>

        <div class='form-group'>
            <label for='name'>Description</label>
            <textarea name="description" id="" cols="30" class="form-control" rows="10" placeholder="Type here..." required></textarea>
        </div>

        <!-- Real-time price preview -->
        <div class="form-group p-4">
            <h1 id="formatted-price" style="font-weight: bold; font-size: 1.2rem;">₱0.00</h1>
        </div>

        <!-- Price input -->
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="any" class="form-control" id="price" name="price" required>
        </div>

                <button type='submit' class='btn btn-primary mt-3'>Create</button>
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
