#Object Oriented PHP

###Overview
* Object Oriented Programming
* Objects vs Classes
* Defining class properties
* Defining class methods
	* $this 
* Magic Methods
* Inheritance
* Access Modifiers
	* public
	* private
	* protected
* Static properties and methods
* Midterm Project

###Objects vs Classes

A class is like a blueprint for a house whereas an object is like the actual house created based on the blueprint. Sometimes developers interchange the terms class and object even though they are different things. Essentially, classes form the structure (properties and methods) for objects. More than one object can be created from a class at the same time, and each object will be independent of the other objects.

###Defining a class

To define a class, use the keyword __class__ followed by a class name. Class names typically have their first letter capitalized.

```php
	class Person {
		// class properties and methods here
	}
```

To create an object from the class, use the _new_ keyword.

```php
	$david = new Person();
```

Here is an example of a Person class with a few properties and methods:

```php
	class Person {
		public $name;
		public function greeting() {
			echo "Hello, my name is " . $this->name;
		}
	}
	
	$david = new Person();
	$david->name = "David";
	$david->greeting(); // Hello, my name is David
```

Inside class methods, the $this variable can be used to reference itself, or the object that you are calling the method on. This is similar to the use of __this__ in other OO languages like Java.


###Magic Methods
In the above example, we had to set the public name property manually. Wouldn't it be nice if we could initilize our Person object with a name? We can through the use of a constructor method. PHP has what are known as magic methods. One common magic method is __construct(). This method acts as a constructor. So to revise the example above, we could initialize our object with a name like so:

```php
	class Person {
		public $name;
		
		public function __construct($first_name) {
			$this->name = $first_name;
		}
		
		public function greeting() {
			echo "Hello, my name is " . $this->name;
		}
	}
	
	$david = new Person('David');
	$david->greeting(); // Hello, my name is David
```

__construct is automatically invoked (assuming you have defined it in your class) when you create a new object.

* __construct() is the class constructor method
* __destruct() is the class destructor method

There are several other magic method available, but these 2 are typically the most frequently used.


###Inheritance

Classes can inherit methods and properties from other classes using the __exends__ keyword. For example, say you wanted to create a custom WebDeveloper class that extends from the basic functionality of the Person class, since after all, a web developer is also a human.

```php
	class WebDeveloper extends Person {
		public function code() {
			$this->name . ' likes to code for the web.';
		}
	}
	
	$david = new WebDeveloper('David');
	$david->greeting(); // Hello, my name is David
	$david->code(); // David likes to code for the web.
```

###Access Modifiers

Up until this point all our properties and methods have been made public. That is, public properties and methods can be accessed inside our class, inside child classes, or even outside our class.

Sometimes you want to limit the visibility of properties or methods. For example, say you had a Flickr API wrapper class. To work with the Flickr API, you need to have an API key. However, once you set it as a class property, there is no need to modify it or access it, but class methods should still have access it. In this case, you can make the API key __protected__ or __private__. When a property or method is either protected or private, it cannot be accessed from outside the class. If a property or method is protected, it can only be accessed from within the class itself or from child classes or "sub-classes". Private members (properties or methods) can only be acccessed from within the class and NOT outside the class or from subclassess.

###Static properties and methods

Methods or properties can be declared as __static__ which essentially means that they can be accessed without instantiating the class. Think of it like an object literal in JavaScript, where the object has properties and methods, but you don't create an instance from that object literal. When would you want to use static methods or properties? One example would be if you had a Utility class that contained a bunch of string manipulation methods, but there really was no need to create instances. For example, one method might trim off white space on either end of a string and another method might replace all spaces with dashes. In this case, we could create a StringUtility class with several static methods.

```php
	class StringUtility {
		public static function trim($str) {
			return trim($str);
		}
		
		public static function remove_spaces($str) {
			$modifiedString = preg_replace("/\\s/ui", "-", $str);
			return $modifiedString;
		}
	}
	
	$someString = "   This is a string with a lot of extra white space  .  "
	$str1 = StringUtility::trim($someString); // "This is a string with a lot of extra white space  ."
	$str2 = StringUtility::remove_spaces($someString); // "---This-is-a-string-with-a-lot-of-extra-white-space--.--"
```

Static properties and methods can be accessed by using the class name, the double colon (called the scope resolution operator), and the static property or method name. One of the major benefits to using static properties is that they keep their stored values for the duration of the script.

###Resources
* [Object Oriented PHP for beginners](http://net.tutsplus.com/tutorials/php/object-oriented-php-for-beginners/)
* [Book: PHP Object Oriented Solutions by David Powers](http://www.amazon.com/PHP-Object-Oriented-Solutions-David-Powers/dp/1430210117/ref=sr_1_1?ie=UTF8&qid=1351574545&sr=8-1&keywords=object+oriented+solutions)

###Midterm Project
[Midterm Project Description](https://docs.google.com/document/d/1fHc3LVucDNusjm-Cgzx7aXWTEIuaQ2G9cO-Y-B7KQiM/edit#heading=h.qdwau2oyrvfw)