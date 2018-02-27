<?php

namespace Sauls\WidgetBundle;

use Sauls\WidgetBundle\DependencyInjection\Compiler\RegisterWidgetsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SaulsWidgetBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new RegisterWidgetsPass());
    }
}
