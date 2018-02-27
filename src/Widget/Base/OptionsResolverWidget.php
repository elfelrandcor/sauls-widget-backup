<?php
/**
 * This file is part of the SaulsWidgetBundle package.
 *
 * @author    Saulius Vaičeliūnas <vaiceliunas@inbox.lt>
 * @link      http://saulius.vaiceliunas.lt
 * @copyright 2017
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sauls\WidgetBundle\Widget\Base;


use Sauls\WidgetBundle\Widget\Widget;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author  Saulius Vaičeliūnas <vaiceliunas@inbox.lt>
 *
 * Class OptionResolverWidget
 * @package Sauls\WidgetBundle\Widget\Base
 */
abstract class OptionsResolverWidget extends Widget
{
    /**
     * @param array $options
     */
    protected function handleOptions(array $options = [])
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);
        parent::handleOptions($resolver->resolve($options));
    }

    /**
     * @param OptionsResolver $resolver
     *
     * @return void
     */
    protected abstract function configureOptions(OptionsResolver $resolver);

}
