<?php

class System {

    private function requirements() {
        $file_variables = ROOT . '/fyb-config/variables.php';
        if (file_exists($file_variables))
            require ($file_variables);

        $file_db_config = ROOT . '/fyb-config/db.config.php';
        if (file_exists($file_db_config))
            require ($file_db_config);

        $file_db_connect = ROOT . '/fyb-system/db.connect.php';
        if (file_exists($file_db_connect))
            require ($file_db_connect);

        $file_tpl = ROOT . '/fyb-system/templates.php';
        if (file_exists($file_tpl))
            require ($file_tpl);

        $file_protect = ROOT . '/fyb-system/protect.php';
        if (file_exists($file_protect))
            require ($file_protect);
    }
    
    public function run() {
        System::requirements();

        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $segment = explode('/', trim($url, '/'));
        $method = $_SERVER['REQUEST_METHOD'];

        if ($segment[0] === 'settings') {
            $file = ROOT . '/fyb-apps/' . $segment[1] . '/controllerSettings.php';
            if (file_exists($file))
                require $file;
            else
                require ROOT . '/fyb-apps/home/controllerSettings.php';
        } else {
            $file = ROOT . '/fyb-apps/' . $segment[1] . '/controllerSystem.php';
            if (file_exists($file))
                require $file;
            else
                require ROOT.'/fyb-apps/home/controllerSystem.php';
        }
    }
}



