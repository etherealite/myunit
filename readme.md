# MyUnit - Extensible PHPUnit Integration for Laravel

MyUnit is the a standalone version of the PHPUnit integration
in the Laravel core. It has been extracted into the form of a
Laravel bundle, so the developer is free add in their own
features and configurations without changing any of the core
Laravel source files.

## Features 
Myunit opens a whole new world testing of testing options to
Laravel developers. It is able to run as a core Artisan task,
eliminating the need to call it as a bundle with the Artisan CLI.

### Now You Can
- Use PHPUnit with Selenium.
- Run tests under their own Laravel configuration.
- Group your tests logically.

## Installation
Install as any other Laravel bundle by running
```bash
php artisan bundle:install myunit
```

Add the bundle to your application bundle registry by adding it
to ```myproject/application/bundles.php```

```php
<?php
return array(

        'otherbundle' => array('autostart' => true),
        'myunit',

    );
```

## Usage

### Basic
The most basic way to run MyUnit is to run it as a bundle task
with Artisan.

```bash
$ php artisan myunit::test
```

### Going Further
You can register MyUnit as a built-in artisan task by adding the
following to the bottom of your ``` myproject/application/start.php ```

```php
<?php
if (Request::cli())
{
  Bundle::start('myunit');
}
```

Now you can run MyUnit by issuing:

```bash
$ php artisan myunit
```

MyUnit will then run in the exact same manner as if you had
called it as a bundle task.


## Hacking and Configuration
At this point you are free to make edits and add features to MyUnit.
Because MyUnit simply wraps the built-in Laravel 'test' task it has
the same behavior as you'd expect from the Laravel built-in PHPUnit
wrapper.

In the MyUnit bundle root directory, there  is a sub-directory `coretasks`
with the contents

```bash
$ ls coretasks/
phpunit.php  runner.php  stub.xml
```

The file phpunit.php, and stub.xml, are both extracted straight
from the Laravel core without modification. The file runner.php is a
a subclass of the Laravel core task of the same name and function.  
You are free to edit any of these files and add your own
features without the trials and tribulations of hacking the Laravel 
Core.

## Contribute
Please send me your pull requests if you have any cool features or bug
fixes to share.
