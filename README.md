# What is this quotes package
This package automatically sends the keys defined in the config file to the active view page.
If there are names in the route directory and keys in the config file, it automatically sends the values.
This is a simple package.

### Setup
``composer require mehmetb/quotes``

### Register providers config\app.php
``Quotes\QuotesServiceProvider::class,``

### Run
``php artisan quotes:install``

### Usage
You can access it from a variable named $page in the view blade file.
<a href="https://github.com/mehmetbltt23/Laravel-auto-view-publish-quotes/tree/master/src/Examples">https://github.com/mehmetbltt23/Laravel-auto-view-publish-quotes/tree/master/src/Examples</a>