#MVC Part 2 - Models

##Overview
* Midterm Project Overview
* MVC Review
* What are Models?
* Creating a MySQL Database
	* PHPMyAdmin, [Sequel Pro](http://www.sequelpro.com/) for Mac Users
	* Tables, Primary keys
* Creating a Model
* Fluent Query Builder
	* Selecting data
	* Inserting, Updating, Deleting data  

###What are Models?
Models are the portion of your application that represent the data and business logic. The concern of models are to interact with the database.

[Laravel Model Documentation](http://laravel.com/docs/models#models)

###Demo
* Import sample database
* Re-define Home controller
* Set DB configurations in config/database.php
	* username, pw, host, database name 
* Create the Instructor Model in models/instructor.php
	* Creating a static all() method using Fluent Query builder
		* static _table_ method
		* get() method
	* Method chaining in Fluent
	* Prepared Statements
* Passing Model data to a View
* Iterating over Model data
	* [PHP's alternate syntax for control structures](http://php.net/manual/en/control-structures.alternative-syntax.php)
* Create Schedule Model in models/schedule.php
	* Join courses and instructors table
	* How to specify which columns to return
	* where() clause for specifying a term

###Fluent Query Builder Methods

[Fluent Query Builder Documentation](http://laravel.com/docs/database/fluent)

####Common methods

* get(arg) where arg is an array of the column names
* take(num) will add a LIMIT clause
* join
* where()

###Assignment (Part 2 from last week)

Create a database called itp404-mvc. Create one table called __users__. The __users__ table should have 3 columns:

* id
* username
* real name

Create a form that is displayed at the URL __localhost/twitterapp/public/twitter/add__ This form should have 2 input fields and a submit button. The first input is for the Twitter username and the 2nd input is for the Twitter user's real name. When I click the submit button, it should call an action in the Twitter controller that saves a record to the __users__ table. Insert at least 3 records that are completely filled out.

[This documentation](http://laravel.com/docs/database/fluent#insert) should help you in determining which methods to use to insert data using Fluent.

Next, go back to the View that you created last week located at the URL __localhost/twitterapp/public/twitter__. On this page below the search form, I want you to display the Twitter usernames / real names that are in the database as a link as shown below: 

```html
	<a href="you-will-fill-this-in">Nicholas Zakas (slicknet)</a>
```

__Note:__ I purposely left out the href value for you to figure out.

When each link is clicked, it should send you to the results page that lists out all the tweets for that user. You can easily achieve this by linking each twitter user to the twitter results page used for the search form, but by dynamically creating the query string yourself.

Upload this homework to a __SEPARATE__ repository on GitHub called ITP404:MVC