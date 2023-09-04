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

## **Using & Create Blade Components**

    Creating a Blade component in Laravel is a way to encapsulate reusable UI elements, making your views cleaner and more maintainable. Here are the steps to create a Blade component in detail:

    1. **Create a Blade Component File**:

    First, you need to create a Blade component file. Blade components typically reside in the `resources/views/components` directory. You can use the `artisan` command to generate a new component:

    php artisan make:component ComponentName

    Replace `componentName` with the name you want for your component, in PascalCase. This command will create a new Blade component file in the `resources/views/components` directory.

    2. **Define the Component's Blade Template**:

    Open the newly created component file in the `resources/views/components` directory. By default, it should be named `componentName.blade.php`. In this file, define the HTML structure and layout of your component.

    For example, let's create a simple alert component:

    <!-- resources/views/components/alert.blade.php -->

    <div class="alert alert-{{ $type }}" role="alert">
        {{ $slot }}
    </div>

    In this example, `{{ $type }}` and `{{ $slot }}` are variables that will be passed to the component when you use it in a view.

    3. **Pass Data to the Component**:

    To pass data to the component, you can use Blade's `component` directive in your views. For instance, let's use the `alert` component we created:

    <x-alert type="success">
        This is a success message.
    </x-alert>

    In this example, we pass the `type` attribute with the value "success" and the content "This is a success message" to the `alert` component.

    4. **Render the Component**:

    Inside your component file, you can access the data passed to the component using Blade's `{{ }}` syntax, just like in regular Blade templates. The `{{ $type }}` and `{{ $slot }}` variables in the `alert.blade.php` file will display the data passed to the component.

    5. **Include the Component in Views**:

    To include the component in your views, use the `<x-componentName>` syntax, where `componentName` is the PascalCase name of your component. You can include the component wherever you need it in your views.

    6. **Customizing Components**:

    You can make your components more flexible by adding attributes that can be customized when including the component. For example, you can add a `type` attribute to the `alert` component to specify the alert's type (e.g., "success," "warning," "error").

    7. **Slot Content**:

    The `{{ $slot }}` variable in the component's template represents the content that you place between the opening and closing tags of the component when including it in a view. This allows you to pass dynamic content to the component.

## **Database Setup**

    Setting up a database with Laravel involves several steps, including configuring your database connection, creating migrations, and running them to create database tables. Here's a step-by-step guide on how to set up a database with Laravel:

    1. **Configure Database Connection**:

    Laravel uses a configuration file named `.env` to store environment-specific configuration settings. Open the `.env` file in your Laravel project's root directory and configure the database connection settings. Here's an example for a MySQL database:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

    Replace `your_database_name`, `your_database_username`, and `your_database_password` with your actual database information.

    2. **Create Migrations**:

    Migrations are used to define the structure of your database tables. Laravel provides an Artisan command to create migration files. Run the following command to create a new migration file:

    ```shell
    php artisan make:migration create_table_name
    ```

    Replace `create_table_name` with the desired name for your migration file.

    3. **Define the Table Schema**:

    Open the newly created migration file located in the `database/migrations` directory. In the `up` method of the migration file, define the table schema using Laravel's schema builder. Here's an example of creating a "users" table with some columns:

    ```php
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    ```

    This example creates a "users" table with columns for name, email, password, and more.

    4. **Run Migrations**:

    To create the database tables based on your migration files, run the following Artisan command:

    ```shell
    php artisan migrate
    ```

    This command will execute all pending migrations and create the specified tables in your database.

    5. **Seed the Database (Optional)**:

    If you want to populate your database with initial data, you can create database seeders and run them. Seeders are useful for adding sample data to your tables for testing and development. You can generate a seeder using the following command:

    ```shell
    php artisan make:seeder SeederName
    ```

    After defining your seeder, you can run it using the `db:seed` Artisan command.

    ```shell
    php artisan db:seed --class=SeederName
    ```

    Replace `SeederName` with the actual name of your seeder class.

    6. To update the migrations with fresh

        **WARNINGS**
            YOU WILL LOSE ALL OF YOUR EXISTING DATA INSIDE ALL TABLES

        ```shell
        php artisan migrate:fresh
        ```

    8. To Add a column to an existing table
       1. Create a new migration
       2. use Schema::table inside "up" function.
       3. Create a column you want.
       4. If You Want to rollback the migration use function "down" function
            Example:

                php artisan make:migration add_age_column_to_users_table

                /**
                * Run the migrations.
                */
                public function up(): void
                {
                    Schema::table('users', function (Blueprint $table) {
                        $table->integer('age');
                    });
                }

                /**
                * Reverse the migrations.
                */
                public function down(): void
                {
                    Schema::table('users', function (Blueprint $table) {
                        $table->dropColumn('age');
                    });
                }
        5. Run the migrations
           php artisan migrate
