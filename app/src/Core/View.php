<?php

namespace Otus\Mvc\Core;

use Twig\Environment as TwigEnvironment;
use Twig\Loader\FilesystemLoader as TwigFilesystemLoader;
use Twig\Extension\DebugExtension as TwigDebugExtension;

class View
{
    public static function render(string $template, array $data = [])
    {
        $twig = self::getTwig();

        if (!is_readable($_ENV['TEMPLATES_DIR'] . '/' . $template)) {
            App::redirectTo('error1');
        }

        echo $twig->render($template, $data);
        exit;
    }

    private static function getTwig(): TwigEnvironment
    {
        // преобразовать строковое наименование булевых значений в соответствующий тип boolean
        $isAppDebug = (bool) filter_var($_ENV['APP_DEBUG'], FILTER_VALIDATE_BOOLEAN);

        $twig_loader = new TwigFilesystemLoader($_ENV['TEMPLATES_DIR']);
        $twig = new TwigEnvironment($twig_loader, ['debug' => $isAppDebug]);
        $isAppDebug && $twig->addExtension(new TwigDebugExtension());

        return $twig;
    }
}
