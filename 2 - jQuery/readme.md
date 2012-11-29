#Foundations of jQuery

##jQuery Overview / Review
* What is jQuery?
* Loading the jQuery library
* Where to place your jQuery code?
	* [DOMContentLoaded event vs onload event](https://developer.mozilla.org/en/DOM/DOM_event_reference/DOMContentLoaded)
* DOM element selection
	* native DOM methods 	
	* jQuery object and CSS selectors
* jQuery methods
* Manipulating styles
	* .css()
		* Options with object literals
	* Adding/removing classes
		* addClass(), removeClass()
* Basic Animation
	* show/hide, slideUp/slideDown
* DOM Events
	* unobtrusive JS
	* on(), bind(), click(), ...
	* callback functions
	* _this_ keyword 
* DOM Traversal
	* [next()](http://api.jquery.com/next/)
	* [prev()](http://api.jquery.com/prev/)
* Progressive Enhancement
* Selection filtering
	* [eq()](http://api.jquery.com/eq/)
	* first()
	* find()
* Method chaining

##Class Demos
* Schedule of classes
	* DOM events, traversal, animation, css method, if statements, variables
* Navigation initialization

##Lab 1
Create an accordion similar to [the jQuery UI plugin](http://jqueryui.com/demos/accordion/ "accordion example") using a progressive enhancement approach. Yours will be much simpler than the plugin. Just try and get the basic functionality down. 

Initially the __first__ content panel is visible and all other content panels are hidden. As part of a progressive enhancement approach, you should be hiding all content panels except the first one through JavaScript. If JavaScript is disabled, all content panels should be visible. Then, when a user clicks on any of the accordion labels, all of the other content panels are hidden (using slideUp) and the content panel that is __next__ to the label you clicked is made visible (using slideDown). The clicked div.label element should have a class of 'active' which I have provided a basic style declaration in the styles.css sheet for you. You are welcome to change the styling.

__Hint:__ In the callback function for when div.label is clicked, you can hide all div.content elements and then find the div.content that is __next__ to the div.label you clicked which is represented by the keyword *__this__*.

I have provided the base HTML and CSS files for you to use. Download the following, and start adding your jQuery.

* lab1.html
* styles.css

When you are finished, zip up your files and send it to me via email so that I can record that you did it. Remember, labs are graded differently than assignments so even if you were not able to figure it out completely, still send it to me so that you get credit.