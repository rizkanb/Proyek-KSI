<?php

namespace Config;

use CodeIgniter\Config\View as BaseView;

class View extends BaseView
{
    /**
     * Jika diset true, data yang dikirim ke view akan disimpan secara global.
     */
    public $saveData = true;

    /**
     * Filter custom untuk view.
     */
    public $filters = [
        'upper' => 'strtoupper', // Contoh filter untuk membuat huruf kapital
    ];

    /**
     * Plugin custom untuk view.
     */
    public $plugins = [
        'datetime' => null, // placeholder, plugin bisa didefinisikan di service/view sendiri
    ];

    /**
     * Daftar decorator untuk view.
     */
    public $decorators = [
        // \App\View\Decorators\TrimDecorator::class,
    ];
}
