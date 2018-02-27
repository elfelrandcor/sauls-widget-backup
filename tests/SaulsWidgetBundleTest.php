<?php
/**
 * @copyright Saulius Vaiceliunas 2016
 */

namespace Sauls\WidgetBundle;

use Sauls\WidgetBundle\DependencyInjection\Compiler\RegisterWidgetsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class SaulsWidgetBundleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_register_compiler_pass()
    {
        $containerBuilder = $this
            ->getMockBuilder(ContainerBuilder::class)
            ->disableOriginalConstructor()
            ->setMethods(['addCompilerPass'])
            ->getMock();

        $containerBuilder
            ->expects($this->once())
            ->method('addCompilerPass')
            ->with($this->equalTo(new RegisterWidgetsPass()))
            ->willReturn($containerBuilder);

        $saulsWidgetBundle = new SaulsWidgetBundle;
        $saulsWidgetBundle->build($containerBuilder);
    }
}
