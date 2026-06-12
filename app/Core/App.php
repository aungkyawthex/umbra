<?php
    require_once __DIR__ . '/../Helpers/auth.php';
    require_once __DIR__ . '/../Helpers/functions.php';

    class App
    {
        public function run()
        {
            date_default_timezone_set('Asia/Yangon');

            require_once __DIR__ . '/Router.php';
            require_once __DIR__ . '/Database.php';

            $router = new Router();

            require_once __DIR__ . '/../../routes/web.php';

            $router->dispatch();
        }
    }
?>
