#MVC Part 3 - Data Validation, Blade, AJAX

##Overview
* Quiz 2 (20 minutes)
* Validating user input, displaying error messages
* Blade Templating
* Working with AJAX in the framework


##Data Validation

Laravel makes data validation extremely simple with their Validator class.

[Validator documentation](http://laravel.com/docs/validation)

##Blade Templating

When creating views with dynamic data, sometimes views can get cluttered up with the standard php tags (<?php ?>) and echo statements. 

PHP echo statements can be implemented using Blade as such:

```php
	<?php echo $my_variable ?>
```

is equivalent to:

```php
	{{ $my_variable }}
```

This is the same syntax as the Handlebars library in JavaScript. Therefore, you cannot embed Handebar templates within your Blade views.

The alternate tags for control structures helps clean up your views, but it still isn't perfect. In addition to simplifying PHP echo statements, Blade offers a cleaner syntax for control structures.

```php
	<?php foreach($list as $item) : ?>
		<div><?php echo $item ?></div>
	<?php endforeach ?>
```

is equivalent to:

```php
	@foreach($list as $item)
		{{ $item }}
	@endforeach
```

Blade has much more to offer. See the documentation for other control structures.

[Blade templating engine documentation](http://laravel.com/docs/views/templating#blade-template-engine)


##Working with AJAX

When working with AJAX within a framework, the url for the request can either be an absolute URL within your domain or it can be a relative path (controller/action). Make sure your URL path is relative to the current URL. A good way to check is to make sure you don't see a 404 error in the console of Chrome when you are attempting to make an AJAX request.

```js
	$.ajax({
		url: 'home/someaction',
		data: {
			name: 'David'
		},
		success: function(res) {
		
		}
	});
```

You can also restrict controller actions to only being accessed from AJAX requests. In your controller, you can use the static _ajax_ method on the _Request_ class, i.e. Request::ajax(). This returns either True or False.

```php

class Home_Controller extends Base_Controller {

	public function action_index()
	{
		return View::make('home.index');
	}


	public function action_cats() 
	{
		if (Request::ajax()) {
			return View::make('partials.cats', array(
				'cats' => array('tubby', 'spot', 'bc')
			));
		} else {
			return Redirect::to('/');
		}
	}
}

```

[Request::ajax() documentation](http://laravel.com/docs/requests#other-request-helpers)