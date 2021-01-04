<?php

namespace MandasTheme\Containers;

use Plenty\Plugin\Templates\Twig;

class MandasThemeContainer
{
    public function call(Twig $twig):string
    {
        return $twig->render('MandasTheme::Stylesheet');
    }
}