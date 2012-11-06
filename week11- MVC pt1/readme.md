#MVC Part 1 - MVC Theory, Views, Controllers, & Routes

###Administrative
* Midterm Project Overview
* [Final Project Guidelines](https://docs.google.com/document/d/1FQ1q2Ch6YnkhhpEXy7vUz2T5xq2jAyyOg2RwCWZMMMg/edit)

###Lecture Overview
* Why MVC? A spaghetti coded web application example
* The MVC Architectural Pattern
	* Models, Views, Controllers
* MVC Frameworks
* Why Laravel?
* Flickr Search App Example
	* Laravel installation & configuration
	* First Controller and View (a search form)
	* Flickr search Controller action
	* Integrating a Library
	* Adding resources to a View
	* About page with a Route

###MVC

The Model View Controller pattern (MVC), simply put, is a way to structure your website or application into 3 distinct parts. Models are typically for handling your database activity, Views are for what the user sees, and Controllers act as the glue between Models and Views. Controllers intercept HTTP requests, load Model data, and pass that data along to Views. Controllers then respond back to the HTTP request with the final View. (See diagram below)

Having your application organized this way makes it much more maintainable because it can help prevent 'spaghetti coded' applications. Spaghetti coded applications occur when your business logic and data are mixed in with all your presentation code (the Views).

Additionally, by separating concerns, Frontend publishers/developers can work primary with the Views while the backend developers primarily work with Models and Controllers. In a team setting, this pattern makes it easy to separate files of the project for each role. Frontend people don't have to look at a bunch of server-side code, and backend people don't have to look at frontend-code.

![image](https://raw.github.com/skaterdav85/ITP-404/master/week11-%20MVC%20pt1/mvc.jpg)


###Laravel Installation

[Laravel Installation Documentation](http://laravel.com/docs/install)

* Download Laravel and extract the folder into the root of your web server (which is likely your htdocs folder)
* Navigate to __application/config/application.php__ and make the value for the 'index' array key blank. This is so you can have clean URLs via the hidden file, .htaccess which will do URL rewriting
* Generate an application key via the command line utility bundled with Laravel, Artisan. Before you do this though, remove the value 'YourSecretKeyGoesHere!' for the array key labeled 'key'.

```
	php artisan key:generate
```

* Navigate to [http://localhost/mylaravelapp/public](http://localhost/mylaravelapp/public)

###Controllers

Controllers are the glue between the Models (your application's data) and your Views (the HTML). Controllers are classes that are responsible for intercepting a request and handling it. 

For example, say you had a form for adding a new restaurant review to a restaurant review website you are making (kind of like Yelp). When a user submits the form, they are making a request to your site. Your application would have a controller, a Review Controller for example, that intercepts requests to add new restaurant reviews. Your controller would be responsible for:

* Gathering all input from the user
* Validating that input
* If the input was valid, it would pass that data to a model which would be responsible for sending that data to a database. The controller might then redirect the user to some other page with a success message
* If the input was not valid, the controller would redirect the user back to the form

As you can see in this small example, controllers are responsible for handing HTTP requests, but they contain no presentation. Think of a Controller like a security guard. Controllers typically have many methods for several related actions. For example, you may have a Reviews controller that will have actions for adding reviews, deleting reviews, and editing reviews. You may also have a Restaurants controller to add/edit/delete restaurants. Typically Controllers group related actions together.

[Laravel Controllers Documentation](http://laravel.com/docs/controllers)

In Laravel, Controllers can access request data (form data, query string data, cookies) via the [Input class](http://laravel.com/docs/input#input).

###Views

Views represent what the user sees on the web page. This includes all your presentation code (HTML, CSS, and JavaScript). Sometimes your views are dynamic in the sense that the data is coming from a database. If this is the case, your controller will pass the data to the views, but your views know nothing about databases. 

What you won't see in your views are database connections, class instantiations, or any business logic. The responsibility of Views are to take any dynamic data that they are given and use that data to create the presentation (your HTML). This keeps your views from having any business logic mixed in with your HTML, thus keeping the views clean and easier to maintain. Typically all you will really see in views are loops to iterate over data sets, calls to server-side helper functions for data formatting, or any view logic (such as a little bit of server side code to alternate row colors in a dynamic table you are creating).

[Laravel Views Documentation](http://laravel.com/docs/views)

###Libraries

Libraries are classes that are not specific to your particular web site or application. For example, you may have a Flickr class that makes working with the Flickr REST web service much simpler. This isn't specific to your application so it would be placed in the _libraries_ directory. Library classes are supposed to be reusable peices of code that should be portable between projects.

[Laravel Libraries Documentation](http://laravel.com/docs/models#libraries)

###Routes

Typically in MVC applications, the Controllers determine the URL's. However, sometimes you may want a more custom URL such as for SEO purposes. Laravel allows you to achieve this through Routes. Within a __routes.php__ file, you can map custom URL slugs/paths to particlular Controller actions.

This __routes.php__ file is where you also activate your controllers:

```php
	Route::controller('flickr');
```

Routes can also be useful if you want to return a single View that may not fit within a particular controller. For example, you may have an About page that is relatively static. Rather than creating an entire controller with 1 method to return the About view, wouldn't it be easier to just map a route such as /about to the About view? In this case, a route can act like a single Controller method.

```php
	Route::get('about', function() {
		return View::make('about'); // looks inside the views folder for an about.php file
	});
```

[Laravel Routes Documentation](http://laravel.com/docs/routing)

###Laravel Tips

Typically you will be working in the the following folders and files:

* application/controllers
* application/views
* application/routes.php
* application/models
* application/libraries
* public/ (for your CSS and JavaScript)

###Flickr Search Example

__Framework Installation__

* Download Laravel and move extracted folder to htdocs
* Modify application/config/application.php config file. Create application key and remove index.php
* Navigate to _/public_
* Walk through example route and view

__Creating a Flickr Controller that renders a View (controllers/flickr.php)__

* Create a controller in _application/controllers_
* Register the controller in _application/routes.php_
* Create the default controller method _action_index()_
* Create a view for the flickr search form
* return the flickr search form from the default controller method

__Creating the Search Form View (views/search.php)__

* Create a standard HTML form with an action to flickr/results

__Creating the Search Results View (views/results.php)__

* Incomplete results page

__action_results() method in Flickr Controller (controllers/flickr.php)__

* How action methods work
* Gathering form input
* Rendering results page
* Passing search params to a view (results page)
* Including our Flickr Library
* dump and die helper method dd() instead of print_r()
* pass Flickr data to results View

__About Route and View__

* single view with no need for a Controller


###Reading

[MVC for Noobs](http://net.tutsplus.com/tutorials/other/mvc-for-noobs/)

###Assignment

For this assignment, I want you to create a Twitter search application similar to this Flickr search application using the Laravel MVC Framework.

When I navigate to __localhost/twitterapp/public__, I should be presented with a form so that I can type in someone's Twitter username.

When I click on the submit button, it should make a request to a Twitter Controller action method that is responsible for fetching the tweets and passing that data along to a view. This Controller will be responsible for utilizing a Twitter __library__ class that you create, which will handle fetching the tweets from the Twitter web service for a given username.

Lastly, style your page a little bit so that the list of tweets are presentable. Make sure to put your static assets (JS, CSS, images) in the correct public directories.

Push this project up to GitHub to a repository called: __ITP404-MVCpart1__