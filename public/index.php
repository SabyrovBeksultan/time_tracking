<?php

use Phalcon\Flash\Direct as FlashDirect;
use Phalcon\Flash\Session as FlashSession;

error_reporting(E_ALL);

try {

    /**
     * Read the configuration
     */
    $config = include __DIR__ . "/../app/config/config.php";

    /**
     * Read auto-loader
     */
    include __DIR__ . "/../app/config/loader.php";

    /**
     * Read services
     */
    include __DIR__ . "/../app/config/services.php";

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    // Register the flash service with custom CSS classes
    $di->set(
        'flash',
        function () {
            $flash = new FlashDirect(
                [
                    'error'   => 'alert alert-danger',
                    'success' => 'alert alert-success',
                    'notice'  => 'alert alert-info',
                    'warning' => 'alert alert-warning',
                ]
            );

            return $flash;
        }
    );

    $di->set(
        'flashSession',
        function () {
            $flash = new FlashSession(
                [
                    'error'   => 'alert alert-danger',
                    'success' => 'alert alert-success',
                    'notice'  => 'alert alert-info',
                    'warning' => 'alert alert-warning',
                ]
            );

            return $flash;
        }
    );

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage();
}
