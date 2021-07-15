<?php

namespace Botble\Manage;

use Schema;
use Botble\PluginManagement\Abstracts\PluginOperationAbstract;

class Plugin extends PluginOperationAbstract
{
    public static function remove()
    {
        Schema::dropIfExists('manages');
        Schema::dropIfExists('deaneries');
        Schema::dropIfExists('priests');
        Schema::dropIfExists('parishes');
        Schema::dropIfExists('histories');
    }
}
