#jQuery continued & Version Control

###Overview
* lab 1 review
* JavaScript / jQuery
	* Events 
		* native event listeners: addEventListener, attachEvent
		* event bubbling vs event capturing
		* feature detection vs browser detection
		* the event object
			* e.preventDefault()
			* e.srcElement (IE) and e.target (most other browsers) 
		* event delegation - why?
	* Global variables & self invoking anonymous functions
		* library conflicts with jQuery
	* jQuery Plugins
		* jQuery UI
		* 3rd party plugins
* Version Control
	* the typical deployment process
	* Version Control concepts
	* Git
	* GitHub 
	* Cloud services

##JavaScript / jQuery
### Good practices
* prefix variables that contain jQuery objects with $
* self-invoking anonymous functions to prevent global variable pollution
* you can preserve the $ for jQuery even if other libraries use $. You can achieve this by passing jQuery to your self invoking anoymous function and remapping jQuery to $
	
```js
	(function($) {
		// no conflicts with jQuery now
	})(jQuery);
```
	
* cache the value of _this_ i.e. var $this = $(this); to prevent unnecessary function calls

###Event delegation

Event delegation is a technique that allows you to avoid adding event listeners to specific nodes. For example, say you had a list of items and this list had several 100 items. Attaching an event listener to every single list item would not be very efficient. Instead, why not bind an event listener to the parent element of the list-items and then determine if one of the list items was clicked using the event object. This reduces the number of event bindings from 100 to 1. Much more efficient right? jQuery makes event delegation dead simple with the __on()__ method.

```js
	$('ul').on('click', 'li', function() {
		// this refers to the li element that was clicked
	});
```

Another reason to use event delegation is when you are appending new elements to the DOM. These new elements don't have event listeners on them and you may want them.

###[jQuery UI](http://jqueryui.com/) & plugins

For those new to jQuery, there are thousands of jQuery plugins available to add extended functionality to the library. Say you want a calendar widget on one of your date elements in a form. jQuery has that. Say you want a dynamic data table, jQuery has that. With only 2-3 lines of code, you could add this functionality to your site/application with hardly any effort.

The general process of incorporating a plugin into your site is the same:
	* include the jQuery library
	* reference the plugin's JS file after the jQuery library
	* reference the plugin's CSS file in the head of your page
	* implement the plugins like this:
		
```js
	$('#my-data-table').dataTable()
```		

##Version Control

Allows for collaboration on projects on the same file without the fear of overwriting other team members' work

Serves as a timeline for your project and reasons why they changed

Great for experimenting without the fear of breaking your code. You can always revert back

Central Repository System vs Distributed Version Control System

* Local repositories
* Staging
* Commits (saving to a repository)
* Branching
* Merging

##Command line intro
* cd = change directory
* ls = list files in the current directory
	* li -a
	* ls -l
* pwd = print working directory

##Git Distributed Version Control System
First, you'll need to set some basic information:

* git config --global user.name "David Tang"
* git config --global user.email dtang@usc.edu
* git config --global color.ui true

###Workflow
* Initialize a local repository: git init
* Add files to staging area: git add --all
* Commit changes (a snapshot of what is on the stage): git commit -m 'some message'
* git status
* git branch
* git checkout
* git merge

The workflow for using Git is that you do some work, stage the changes when you've finished a particular feature, and make a commit. Then you continue to make changes, stage, and commit, and you repeat this process, creating a timeline of snapshots for your project.

##GitHub

* Remote repositories
* Cloning remote repos - git clone
* Pushing to remote repos - git push origin master

##Deployment to the cloud
* PHPFog (PHP)
* Heroku
* AppFog
* Pagoda Box (PHP)


##Reading
* [Feature detection is not browser detection](http://www.nczonline.net/blog/2009/12/29/feature-detection-is-not-browser-detection/)
* [DOM events: bubbling vs capturing](http://www.quirksmode.org/js/events_order.html)
* [FTP to Git](http://net.tutsplus.com/articles/from-ftp-to-git-a-deployment-story/)
* [Git - The Simple Guide](http://rogerdudler.github.com/git-guide/)
* [Pro Git](http://git-scm.com/book) - This is more of a reference book that covers everything you'd ever want to know about Git

##Links
* [Git](http://git-scm.com/)
* [GitHub](https://github.com/)
* [Generating SSH Keys](https://help.github.com/articles/generating-ssh-keys)
* Git Cheatsheet (in repository)