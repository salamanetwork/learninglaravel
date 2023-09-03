# learninglaravel

## Create a new laravel project with the following command

    composer create-project laravel/laravel <project-name>

## Run the laravel project

    cd <project-name>    
    php artisan serve 

## Routes && URLs in Laravel

    # laravel routes folder:
    
        code "~/<project-folder>/routes/web.php"

    # Examples:

        Route::get('/<route-name>', function () {
            return view('<template-name>');
        });

        Route::post('/<route-name>', function () {
            return view('<template-name>');
        });

        Route::get('/about', function () {
            return "<h1>Welcome to the About Page.</h1>";
        });

## Controllers

    # Create a new controller
        php artisan make:controller <controller-name>

    # laravel controllers folder:
        cd "~/<project-folder>/app/http/Controllers/"

    # Add to the route ("**~/<project-folder>/routes/web.php**"):
        
        use App\Http\Controllers\<controller-name>;

        Route::get('/<route-name>', [<controller-name::class>, <method-name>]);

        # Example:

            use App\Http\Controllers\ExampleController;

            Route::get('/example', [<ExampleController::class>, contactPage]);

## Views / Blade

    # laravel views folder:
        cd "~/<project-folder>/app/resources/views/"

    # laravel blade file name style:
        <file-name>.blade.php

    # usage:
        1) Open the <controller-name> file.
        2) change the <method-name> return to view(<file-name-only>);

    # Example:

        public function <method-name>() {
            return view(<file-name-only>);
        }

        public function index() {
            return view('index_page');
        }

## Using Blade Syntax

    // 1. **Variables**: You can display variables in Blade templates using double curly braces `{{ $variable }}`.

        {{ $name }}

    // 2. **Echoing Unescaped Data**: To output unescaped data, use `{!! $data !!}`. Be cautious with this as it doesn't escape HTML entities.

        {!! $htmlContent !!}

    // 3. **Comments**: Blade provides a clean way to add comments using `{{-- This is a comment --}}`.

        {{-- This is a comment --}}

    // 4. **Control Structures**:

        - **If Statements**: You can use `@if`, `@else`, and `@endif` to create conditional blocks.


            @if($condition)
                // Code here
            @elseif($anotherCondition)
                // Code here
            @else
                // Code here
            @endif


        - **Loops**: Blade supports `@for`, `@foreach`, and `@while` loops.


            @foreach($items as $item)
                // Code here
            @endforeach


    // 1. **Include Partial Views**: You can include partial views using `@include`:

        @include('partials.header')

    // 2. **Extending Layouts**: Blade templates allow you to create layouts and extend them using `@extends` and `@section` directives.

        @extends('layouts.master')

        @section('content')
            // Content here
        @endsection

    // 3. **Escaping Content**: Blade automatically escapes all output by default to prevent XSS attacks. You can use `@verbatim` to display raw content without escaping.

        @verbatim
            <div>{{ This will not be escaped }}</div>
        @endverbatim

    // 4. **Blade Directives**: Laravel provides various Blade directives for common tasks, such as `@csrf`, `@method`, and `@auth`.

        <form method="POST" action="/example">
            @csrf
            @method('PUT')
            // Form fields
        </form>

        @php
            // Raw PHP code here
        @endphp

        @unless($condition)
            This will only display if the condition is false.
        @endunless
