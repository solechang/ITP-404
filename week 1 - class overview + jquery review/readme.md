#Week 1

##Course Introduction
* Course overview
* My background
* Syllabus topics & examples
* Students icebreaker / interest in webdev

##jQuery Overview / Review
* What is jQuery? When to use it?
* Loading the jQuery library
* Where to place your jQuery code?
	* [DOMContentLoaded event vs onload event](https://developer.mozilla.org/en/DOM/DOM_event_reference/DOMContentLoaded)
* DOM element selection w/ CSS selectors 
* Method chaining & selection filtering
* Basic Animation
	* show/hide, slideUp/slideDown
* Manipulating styles
	* .css()
		* Options with object literals
	* Adding/removing classes
* DOM Events
	* callback functions
	* _this_ keyword 
* Intro to DOM Traversal
	* [next()](http://api.jquery.com/next/) 
* Progressive Enhancement & Unobtrusive JS

##Lab 1
Create an accordion similar to [the jQuery UI plugin](http://jqueryui.com/demos/accordion/ "accordion example"). Obviously yours will be much simpler. Just try and get the basic functionality down. 

Intially the first content panel is visible and all other content panels are hidden. Then, when a user clicks on any of the accordion labels, all of the other content panels are hidden and the content panel that is next to the label you clicked is made visible. 

__Hint:__ In the callback function for when .label is clicked, you can hide all .content elements and then find the .content that is next to the .label you clicked which is represented by the keyword *__this__*.

I have provided the base HTML and CSS for you to use in:

* lab1.html
* styles.css