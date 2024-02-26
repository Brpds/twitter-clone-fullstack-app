<?php

namespace MF\Model;

use App\Connection;

class Container{

    public static function getModel($model){


        $class = "\\App\\Models\\".ucfirst($model);
        //returns the model with the connection already instanced

        $conn = Connection::getDb();

        return new $class($conn);

    }
}

?>