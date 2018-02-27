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

namespace Sauls\WidgetBundle\Widget\Stub;


use Sauls\WidgetBundle\Widget\Base\TwigWidget;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author  Saulius Vaičeliūnas <vaiceliunas@inbox.lt>
 *
 * Class SampleTwigWidget
 * @package Sauls\WidgetBundle\Widget\Stub
 *
 */
class SampleTwigWidget extends TwigWidget
{
    /**
     * @param OptionsResolver $resolver
     *
     * @return void
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['viewFile' => 'sample-twig.html.twig']);
    }

    /**
     * Renders the widget
     */
    public function render()
    {
        return $this->getTwig()->render($this->viewFile);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sample_twig.widget';
    }
}
