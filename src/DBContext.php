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
        if ($context_mysql = App::get('context_db')) {
            return $context_mysql->$method(...$arguments);
        }
    }
}
