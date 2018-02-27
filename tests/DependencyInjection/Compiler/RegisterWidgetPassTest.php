<?php
/**
 * @copyright Saulius Vaiceliunas 2016
 */

namespace Sauls\WidgetBundle\DependencyInjection\Compiler;

use Sauls\WidgetBundle\DependencyInjection\SaulsWidgetExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Config\FileLocator;

class RegisterWidgetPassTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_collect_all_widgets_and_register_to_the_widget_factory()
    {
        $containerBuilder = $this->getContainerBuilder();

        $this->assertEquals(
            'test.widget',
            $containerBuilder->get('sauls_widget.widget_factory')->getWidget('test_widget')->getName(),
            "Sauls widget factory compiler pass was unable to register defined test widget"
        );
    }

    /**
     * @test
     */
    public function should_not_execute_widget_register_pass()
    {
        $containerBuilder = $this->getContainerBuilder(true, "empty_services.yml");

        $this->assertFalse(
            $containerBuilder->has('sauls_widget.widget_factory'),
            "Widget factory should not be registered"
        );

    }

    /**
     * @test
     */
    public function should_register_widget_with_provided_alias()
    {
        $containerBuilder = $this->getContainerBuilder();

        $this->assertTrue(
            $containerBuilder->get('sauls_widget.widget_factory')->hasWidget('different_sample_widget'),
            "Sauls widget factory compiler pass was unable to register defined sample widget with given alias"
        );
    }

    /**
     * @test
     */
    public function should_register_widget_without_provided_alias()
    {
        $containerBuilder = $this->getContainerBuilder();

        $this->assertTrue(
            $containerBuilder->get('sauls_widget.widget_factory')->hasWidget('sample.widget'),
            "Sauls widget factory compiler pass was unable to register defined sample widget with getName as alias"
        );
    }

    /**
     * @param bool $load
     *
     * @param string $servicesFile
     *
     * @return ContainerBuilder
     */
    public function getContainerBuilder($load = true, $servicesFile = 'services.yml')
    {
        $containerBuilder = new ContainerBuilder();

        if ($load) {
            $saulsWidgetExtension = $this->getSaulsWidgetExtensionMock($containerBuilder, $servicesFile);
            $saulsWidgetExtension->load([], $containerBuilder);

            $registerWidgetPass = new RegisterWidgetsPass();
            $registerWidgetPass->process($containerBuilder);
        }

        return $containerBuilder;
    }

    /**
     * @param $containerBuilder
     * @param $servicesFile
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getSaulsWidgetExtensionMock($containerBuilder, $servicesFile)
    {
        $saulsWidgetExtensionMock = $this->getMockBuilder(SaulsWidgetExtension::class)->setMethods(['load'])->getMock();
        $saulsWidgetExtensionMock->expects($this->once())->method('load')->willReturnCallback(
            function () use ($containerBuilder, $servicesFile) {

                $loader = new Loader\YamlFileLoader(
                    $containerBuilder,
                    new FileLocator(__DIR__.'/../../Resources/config')
                );
                $loader->load($servicesFile);
            }
        );

        return $saulsWidgetExtensionMock;
    }
}
