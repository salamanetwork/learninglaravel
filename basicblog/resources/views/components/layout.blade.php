
<!-- Header Starts Here -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>

    <!-- Latest Bootstrap CSS from CDN -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        integrity="your-integrity-hash"
        crossorigin="anonymous"
    >

    <!-- Include Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Include app.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <!-- Your custom styles or additional CSS imports can go here -->
</head>
<body style="background-color: #c0d1c5">

    <div class="container-fluid">
        <div class="row col-lg-auto">

<!-- Header Ends Here -->

<!-- Slots Starts Here -->

{{ $slot }}

<!-- Slots Ends Here -->


<!-- Footer Starts Here -->
        </div>
    </div>
<!-- End of page content -->

        <!-- Latest Popper.js and Bootstrap JavaScript from CDNs -->
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="your-integrity-hash"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="your-integrity-hash"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
            integrity="your-integrity-hash"
            crossorigin="anonymous"
        ></script>

        <!-- Your custom scripts can go here -->
    </body>
</html>
<!-- Footer Ends Here -->
