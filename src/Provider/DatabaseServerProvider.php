<?php

namespace Src\Database\Provider;

use Src\Database\DBContext;
use Src\Core\AbstractProvider;
use Src\Database\Eloquent\Model;
use Src\Database\DatabaseManager;
use Src\Database\Connectors\ConnectionFactory;

class DatabaseServerProvider extends AbstractProvider
{
    public function register()
    {
        $this->app->set('db.factory', function () {
            return new ConnectionFactory;
        });
        $this->app->set('db', function () {
            return new DatabaseManager;
        });
        $this->app->set('context_db', function () {
            return new DBContext;
        });

        Model::setConnectionResolver($this->app->get('db'));
    }
}
