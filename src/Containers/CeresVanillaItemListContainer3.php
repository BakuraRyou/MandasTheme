<?php

namespace MandasTheme\Containers;

use Plenty\Plugin\Templates\Twig;

class MandasThemeItemListContainer3
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('MandasTheme::Containers.ItemLists.ItemList3', ["item" => $arg[0]]);
    }
}