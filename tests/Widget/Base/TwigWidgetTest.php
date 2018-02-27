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

use Sauls\WidgetBundle\Widget\Stub\SampleTwigWidget;

/**
 * @author  Saulius Vaičeliūnas <vaiceliunas@inbox.lt>
 *
 * Class TwigWidgetTest
 * @package Sauls\WidgetBundle\Widget\Base
 */
class TwigWidgetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_configure_widget()
    {
        $twigWidget = $this->getSampleTwigWidget();

        $this->assertContains("It works!", $twigWidget->render());
    }

    /**
     * @param array $options
     *
     * @return SampleTwigWidget
     */
    private function getSampleTwigWidget(array $options = [])
    {
        return (new SampleTwigWidget())->setTwig($this->getTwig())->widget($options);
    }

    /**
     * @return \Twig_Environment
     */
    private function getTwig()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__.'/../../Resources/views');
        return new \Twig_Environment($loader);
    }
}