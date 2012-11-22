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
class Name_Helper extends Controller_Template
{
}
```

You would call this file *name.php* and save it in *core/helper*

To use this new helper you would do the folloing

```php	
<?php
class Name_Controller extends Controller_Template
{
    public function __construct()
    {
        $this->load('helper', 'form');
        $this->helper->some_method();
    }
}
```