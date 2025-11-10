<?php

namespace Config;

use CodeIgniter\Config\View as BaseView;
use CodeIgniter\View\ViewDecoratorInterface;

class View extends BaseView
{
    public $saveData = true;

    public $filters = [
        'upper' => 'strtoupper',
    ];

    public $plugins = [
        'datetime' => function ($date, $format = 'Y-m-d H:i:s') {
            return date($format, strtotime($date));
        },
    ];

    public array $decorators = [
        // \App\View\Decorators\TrimDecorator::class,
    ];
}
