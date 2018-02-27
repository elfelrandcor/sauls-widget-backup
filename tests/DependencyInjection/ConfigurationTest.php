<?php
/**
 * @copyright Saulius Vaiceliunas 2016
 */

namespace Sauls\WidgetBundle\DependencyInjection;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_return_configuration_tree()
    {
        $configuration = new Configuration();
        $configurationTree = $configuration->getConfigTreeBuilder();

        $this->assertEquals('sauls_widget', $configurationTree->buildTree()->getName(), "Wrong root name");

    }
}
