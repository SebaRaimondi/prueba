<?php

class TwigController
{

    public static function render($path, $context = [])
    {
        
        $loader = new Twig_Loader_Filesystem('App/View');
        $twig = new Twig_Environment($loader);

        $contextBase = [
            'isLogged' => Controller::getInstance()->isLogged()
        ];

        $template = $twig->load($path);
        echo $template->render($contextBase + $context);
    }
}
