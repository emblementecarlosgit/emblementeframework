<?php
namespace App\Base;
abstract class SuperClass {
    
    function __construct()
    {
        \App\FrameworkEngine\Engine::start($this);
    }
}