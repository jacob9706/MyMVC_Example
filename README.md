Why
---
I have created this simple framework to be the fastest barebone PHP MVC out there.

Basics
------
To create a new controller you want to do the following

```php
<?php
class Name_Controller extends Controller_Template
{
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
class Name_Helper extends Controller_Template
{
}
```

You would call this file *name.php* and save it in *system/helper*

To use this new helper you would do the folloing

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
        $this->helper->some_method();
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