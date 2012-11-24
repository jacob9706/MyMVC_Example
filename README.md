Why
---
I have created this simple framework to be the fastest barebones PHP MVC out there.

Basics
------
To create a new controller you want to do the following

```php
<?php
/*
 * application/controllers/name.php
 */
 
class Name_Controller extends Controller_Template
{
	// The emulated get vars are optional params in the methods
	public function index($getVars, $postVars)
	{

	}
}
```
You would call this file *name.php* and save it in *application/controllers*

*****************************************************************************

To add a helper class and make it loadable through 'this->load('helper', 'name');'

```php
<?php
/*
 * system/helper/Name_Helper.php
 */

class Name_Helper
{
	public function some_method()
	{

	}
}
```

You would call this file *Name_Helper.php* and save it in *system/helper*

To use this new helper you would do the following

```php	
<?php
/*
 * application/controllers/name.php
 */

class Name_Controller extends Controller_Template
{
    public function __construct()
    {
        $this->load('helper', 'form');
        $this->helper->form->some_method();
    }
}
```

You can also load helper classes as a specific name

```php
<?php
/*
 * application/controllers/name.php
 */

class Name_Controller extends Controller_Template
{
	public function __construct()
	{
		$this->load_as('helper', 'form', 'form2');
		$this->helper->form2->some_method();
	}
}
```

*****************************************************************************

To load a view you want to do the following

```php
<?php
/*
 * application/controllers/index.php
 */

class Index_Controller extends Controller_Template
{
	public function index($getVars, $postVars)
	{
		$testVar = "Hello";
		$this->view('test_view', array('example' => $testVar));
	}
}
```

Once you have this you will be able to access your *$testVar* as *$example* within your *test_view* file

Your next step is to create your *test_view* file within your *application/views* folder

```php
<?php
/*
 * application/views/test_view.php
 */
?>

<h1><?php echo $example; ?></h1>
```