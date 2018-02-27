<?php
/**
 * @copyright Saulius Vaiceliunas
 */
namespace Sauls\WidgetBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class RegisterWidgetsPass implements CompilerPassInterface
{

    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     *
     * @api
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has('sauls_widget.widget_factory')) {
            return;
        }

        $definition = $container->findDefinition('sauls_widget.widget_factory');
        $taggedWidgets = $container->findTaggedServiceIds('sauls_widget.widget');

        foreach ($taggedWidgets as $id => $tags) {
            foreach ($tags as $attributes) {

                $alias = array_key_exists('alias', $attributes) ? $attributes['alias'] : null;

                $definition->addMethodCall(
                    'addWidget',
                    [new Reference($id), $alias]
                );
            }
        }
    }
}
