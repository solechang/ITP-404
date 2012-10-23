##JSONP, Client-side Templating, Facebook Graph API & Facebook Query Language (FQL)

###Overview
* Review of Asynchronous Requests
* AJAX limitations - same origin policy
* JSONP
	* Twitter JSONP endpoint
	* Facebook Graph API JSONP endpoint
* Generating HTML onthe client-side
	* HTML strings
	* Native DOM methods
	* Client-side templating libraries 
* Facebook Query Language (FQL)

###Same Origin Policy
AJAX requests are limited by the [Same Origin Policy](http://en.wikipedia.org/wiki/Same_origin_policy), which essentially says that you cannot make requests to resources outside of your current domain.

To get around this, we use a server-side proxy. For example, rather than our browser making a request to Twitter's API, our page will make a request to a PHP script on our server, which then makes a request to Twitter's API using file_get_contents() or CURL. This latter approach requires 2 requests, 1 request from the browser to our server side script, and another request from our server side script to Twitter's API. Wouldn't it be efficient if we could reduce the number of requests to 1 by having our browser directly access Twitter's API?

###JSONP

JSON with Padding (JSONP) is a technique used to circumvent the same origin policy in AJAX.

If you recall, the script tag is not restricted by the same origin policy. For example, we include jQuery on our pages by referencing the jQuery source hosted on Google's Content Delivery Network (CDN).

With this in mind, why don't we dynamiclaly create a script element on our page that references the JSON served from another domain?


```js
	var script = document.createElement('script');
	script.src = "https://graph.facebook.com/cocacola";
	document.getElementsByTagName('head')[0].appendChild(script);
``` 

Scripts injected into the page dynamically like this are __asynchronous__ requests like AJAX.

The problem with this is that once the script is appended to the head of our page, we have no way of accessing the data. You can think of this as one giant object literal sitting in a script tag, but the data hasn't been saved to a variable so we cannot access it.

To utilize the returned data from the dynamic script injection, a lot of web services offer a JSONP option. JSONP requests allow us to specify a function we want to execute with the data passed to it when we receive a response.

Typically this is achieved by passing a query string parameter named 'callback' to the JSONP service, like this:

__https://graph.facebook.com/cocacola?callback=myFunction__

```js
	var script = document.createElement('script');
	script.src = "https://graph.facebook.com/cocacola?callback=myFunction";
	document.getElementsByTagName('head')[0].appendChild(script);
``` 

The API has to allow for this functionality, but if they do, they will return JSON data wrapped within a function call named whatever your function name is, which in this case is 'myFunction'.

When the request returns, the response will look like something like this:

myFunction({"name": "Coca Cola", "likes": 98463, "about": "some text here"})

You will need to have myFunction predfined on the page accessible in the __global__ scope, but this allows us to utilize all the JSON data that we are requesting.

One thing to also note is that dynamic script

__See example jsonp.html__

####Example JSONP Endpoints
[Twitter JSONP endpoint](http://api.twitter.com/1/statuses/user_timeline.json?screen_name=slicknet&count=7&callback=myFunc)

[Facebook Graph endpoint](https://graph.facebook.com/cocacola?callback=myFunc)


###Generating HTML on the client-side

1. You can create strings of HTML and concatonate your dynamic data. However, with complicated HTML chunks, this can become quite messy and hard to maintain.
2. Alternatively, we can generate HTML using native DOM methods / properties like:
	* document.createElement()
	* element.appendChild(node)
	* document.removeElement()
	* element.innerHTML
Again, this can get kind of long and hard to maintain with complicated HTML chunks. It is also hard to see what the HTML fragment looks like at a quick glance
3. Client-side templating libraries allow you to create HTML chunks with placeholders for your dynamic data. These libraries allow you to pass data to a template which will replace all instances of the placeholders in a template with the actual data themselves. Templating libraries include:
	* [Handlebars](http://handlebarsjs.com/)
	* [Underscore JS library](http://underscorejs.org/) - more than just templating
	* [Mustache](https://github.com/janl/mustache.js/)

Client side templates can be created by placing HTML fragments within a script tag with a __type="template"__ as an attribute. Scripts without a type specified default to "text/javascript". With a type attribute set to 'template' (or anything the browser can't interpret), the browser will not recognize this type and won't evaulate what is inside the script tag as Javascript. This makes for a good place to store HTML templates. Note that you cannot place HTML templates inside external script references. They must be internal script blocks. Other common script type attribute values for templates include "text/template", 'handlebars/template', etc.

###Facebook Query Language
Facebook offers a SQL like style for accessing data in the Graph API. Some requests don't require authentication via an access token.

For example, to pull public 'page' data for Coca Cola and Pepsi Facebook pages, we can run a FQL query like this:

```sql
	SELECT page_id, name, username, fan_count, pic_cover, pic_square, page_url 
	FROM page 
	WHERE username = 'coca-cola' OR username = 'pepsi'
```

Here we are pulling several different fields (page_id, name, username, etc) from the 'page' table for 2 particular usernames specified in the where clause.

The endpoint for FQL queries is __http://graph.facebook.com/fql__

To pass an FQL query to the endpoint, you assign the FQL query to a query string parameter __q__. For example, the FQL endpoint for the Coca Cola and Pepsi FQL query would be:

_http://graph.facebook.com/fql?q=SELECT page_id, name, username, fan_count, pic_cover, pic_square, page_url FROM page WHERE username = 'coca-cola' OR username = 'pepsi'_

FQL queries also have a JSONP endpoint! The query string parameter is named 'callback'.

###References
* [Facebook Graph API Documentation](http://graph.facebook.com)
* [Facebook Query Language Documentation - FQL](https://developers.facebook.com/docs/reference/fql/)
* [FQL Explorer Console](https://developers.facebook.com/tools/explorer)


###Assignment
For this assignment, I want you to make a JSONP request to Facebook's Graph API using FQL. I want you to run an FQL query similar to the example above, but this time I want you to pull the total number of likes for each page and order the results by the total number of likes.

__Hint__: Look at the __page__ table documentation for the field _fan_count_. This contains the total number of likes for a page. The FQL clause to order results is ORDER BY, just like in SQL.

```sql
	ORDER BY field-name
```

DO NOT ORDER THE RESULT SET IN YOUR JAVASCRIPT. Let your FQL query handle the ordering of the returned result set.

You can choose whatever pages you'd like, but there should be at least 4 pages in the result set and the pages should be related in some way. For example, they can be soda companies, restaurants of the same cuisine, theme parks, related companies, etc.

Render each Facebook Page data object on your webpage using one of the client-side templating libraries. Each Facebook Page rendering should display the following data at a minimum:

* Fan count (total number of likes) with a label like "Total Likes"
* Page name
* Page description / about
* Page image
* Link to the Facebook page

Please style this assignment a little bit to easily differentiate each of the rendered page sections.

Lastly, within each rendered Facebook Page section, I want you to create an element with the text "More Info". When "More Info" is clicked, it toggles another section containing more data about that Facebook Page. This can be any data you want from the Graph FQL request, but there should be other useful details pertaining to that Facebook Page.

__Hint:__ You will need to use event delegation to bind event listeners to the generated HTML.

__Extra:__
If you want an extra challenge, sum up the fan_count field for each page and display this number at the top of the page in another client-side template with a label like "Total Fans". This step is not required.

Push this assignment up to GitHub and call the repository: ITP404-JSONP-FQL

