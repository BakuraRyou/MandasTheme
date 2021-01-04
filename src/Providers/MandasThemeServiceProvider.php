<?php

namespace MandasTheme\Providers;

use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Events\Dispatcher;
use IO\Helper\TemplateContainer;
use Plenty\Plugin\Templates\Twig;
use IO\Helper\ResourceContainer;
use IO\Extensions\Functions\Partial;
use IO\Helper\ComponentContainer;
use Plenty\Plugin\ConfigRepository;
use IO\Services\ItemSearch\Helper\ResultFieldTemplate;


/**
 * Class MandasThemeServiceProvider
 * @package MandasTheme\Providers
 */
class MandasThemeServiceProvider extends ServiceProvider
{
    const PRIORITY = 0;

    public function register()
    {

    }

    public function boot(Twig $twig, Dispatcher $dispatcher)
    {

        $dispatcher->listen( 'IO.ResultFields.*', function(ResultFieldTemplate $templateContainer) {
            $templateContainer->setTemplates([
                ResultFieldTemplate::TEMPLATE_SINGLE_ITEM   => 'MandasTheme::ResultFields.SingleItem'
            ]);
        }, 0);


        $dispatcher->listen('IO.tpl.home.category', function (TemplateContainer $container) {
            $container->setTemplate('MandasTheme::Homepage.HomepageCategory');
            return false;
        }, self::PRIORITY);


        $dispatcher->listen('IO.Resources.Import', function (ResourceContainer $container) {
            $container->addStyleTemplate('MandasTheme::Theme');
        }, self::PRIORITY);

        $dispatcher->listen('IO.init.templates', function (Partial $partial) {
            $partial->set('footer', 'MandasTheme::PageDesign.Partials.Footer');
            $partial->set('header', 'MandasTheme::PageDesign.Partials.Header.Header');
            return false;
        }, 0);

        // Override CategoryItem
        $dispatcher->listen('IO.tpl.category.item', function (TemplateContainer $container) {
            $container->setTemplate('MandasTheme::Category.Item.CategoryItem');
            return false;
        }, self::PRIORITY);

        $dispatcher->listen('IO.tpl.checkout', function (TemplateContainer $container) {
            $container->setTemplate('MandasTheme::Checkout.CheckoutView');
            return false;
        }, self::PRIORITY);

        $dispatcher->listen('IO.Component.Import', function (ComponentContainer $container) {
            if ($container->getOriginComponentTemplate() == 'Ceres::ItemList.Components.ItemList') {
                $container->setNewComponentTemplate('MandasTheme::ItemList.Components.ItemList');
            }

            if ($container->getOriginComponentTemplate() == 'Ceres::ItemList.Components.CategoryItem') {
                $container->setNewComponentTemplate('MandasTheme::ItemList.Components.CategoryItem');
            }

            if ($container->getOriginComponentTemplate() == 'Ceres::Item.Components.SingleItem') {
                $container->setNewComponentTemplate('MandasTheme::Item.Components.SingleItem');
            }

            if ($container->getOriginComponentTemplate() == 'Ceres::Item.Components.ItemImageCarousel') {
                $container->setNewComponentTemplate('MandasTheme::Item.Components.ItemImageCarousel');
            }

            if ($container->getOriginComponentTemplate() == 'Ceres::PageDesign.Components.MobileNavigation') {
                $container->setNewComponentTemplate('MandasTheme::PageDesign.Components.MobileNavigation');
            }

            if ($container->getOriginComponentTemplate() == 'Ceres::Basket.Components.AddToBasket') {
                $container->setNewComponentTemplate('MandasTheme::Basket.Components.AddToBasket');
            }

            if ($container->getOriginComponentTemplate() == 'Ceres::Customer.Components.LoginView') {
                $container->setNewComponentTemplate('MandasTheme::Customer.Components.LoginView');
            }

            return false;
        }, self::PRIORITY);

    }
}
