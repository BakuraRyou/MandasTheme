<?php

namespace MandasTheme\Containers;

use Plenty\Plugin\Templates\Twig;

class MandasThemeItemListContainer2
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('MandasTheme::Containers.ItemLists.ItemList2', ["item" => $arg[0]]);
    }
}