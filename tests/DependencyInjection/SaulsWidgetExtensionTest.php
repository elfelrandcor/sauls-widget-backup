<?php
/**
 * @copyright Saulius Vaiceliunas 2016
 */

namespace Sauls\WidgetBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class SaulsWidgetExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_load_services_to_container()
    {
        $containerBuilder = new ContainerBuilder();
        $saulsWidgetExtension = new SaulsWidgetExtension();

        $saulsWidgetExtension->load([], $containerBuilder);

        $this->assertTrue($containerBuilder->has('sauls_widget.widget_factory'),
            "Sauls WidgetFactory should be defined in services.yml");

        $this->assertTrue($containerBuilder->has('sauls_widget.twig_extension.widget',
            "Sauls Widget TwigExtension should be defined in services.yml"));
    }
}
