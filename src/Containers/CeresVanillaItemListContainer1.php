<?php

namespace MandasTheme\Containers;

use Plenty\Plugin\Templates\Twig;

class MandasThemeItemListContainer1
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('MandasTheme::Containers.ItemLists.ItemList1', ["item" => $arg[0]]);
    }
}