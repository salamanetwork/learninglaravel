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
