<?php

namespace Src\Database;

use Src\App;
use Src\Core\Context;

class DBContext extends Context
{
    /**
     * @var array Coroutine context
     */
    protected $context;

    public static function __callStatic($method, $arguments)
    {
        return App::get('context_db')->$method(...$arguments);
    }
}
