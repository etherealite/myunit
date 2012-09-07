<?php namespace MyUnit\CoreTasks;

use Laravel\File;
use Laravel\Bundle;
use Laravel\Request;
use Laravel\CLI\Tasks\Task;


class Runner extends \Laravel\CLI\Tasks\Test\Runner {

  /**
    * Run the tests for a given bundle.
    *
    * @param  array  $bundles
    * @return void
    */
  public function bundle($bundles = array())
  {
    if (count($bundles) == 0)
    {
      $bundles = Bundle::names();
    }

    $this->base_path = Bundle::path('myunit').'coretasks'.DS;

    foreach ($bundles as $bundle)
    {
      // To run PHPUnit for the application, bundles, and the framework
      // from one task, we'll dynamically stub PHPUnit.xml files via
      // the task and point the test suite to the correct directory
      // based on what was requested.
      if (is_dir($path = Bundle::path($bundle).'tests'))
      {
        $this->stub($path);

        $this->test();				
      }
    }
  }


  /**
    * Write a stub phpunit.xml file to the base directory.
    *
    * @param  string  $directory
    * @return void
    */
  protected function stub($directory)
  {
    $path = Bundle::path('myunit').'coretasks'.DS;

    $stub = File::get($path.'stub.xml');

    // The PHPUnit bootstrap file contains several items that are swapped
    // at test time. This allows us to point PHPUnit at a few different
    // locations depending on what the developer wants to test.
    foreach (array('bootstrap', 'directory') as $item)
    {
      $stub = $this->{"swap_{$item}"}($stub, $directory);
    }

    File::put(path('base').'phpunit.xml', $stub);
  }

}

