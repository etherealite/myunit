<?php
use Laravel\IoC;

Autoloader::namespaces(array(
  'MyUnit' => Bundle::path('myunit'),
));

if(! Ioc::registered('task: myunit'))
{
  Ioc::singleton('task: myunit', function()
  {
    return new MyUnit\CoreTasks\Runner;
  });
}
