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

use Sauls\WidgetBundle\Widget\Stub\SampleOptionsWidget;

class OptionsResolverWidgetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_configure_widget_with_default_values()
    {
        $sampleOptionsWidget = $this->getSampleOptionsWidget();

        $this->assertEquals(0, $sampleOptionsWidget->number);
        $this->assertEquals("Lorem ipsum", $sampleOptionsWidget->getText());
        $this->assertEquals("0, Lorem ipsum", $sampleOptionsWidget->render());
    }

    /**
     * @test
     */
    public function should_configure_widget_with_given_values()
    {
        $sampleOptionsWidget = $this->getSampleOptionsWidget([
            'text' => 'Lorem test ipsum test',
            'number' => 25,
        ]);

        $this->assertEquals(25, $sampleOptionsWidget->number);
        $this->assertEquals('Lorem test ipsum test', $sampleOptionsWidget->getText());
        $this->assertEquals("25, Lorem test ipsum test", $sampleOptionsWidget->render());
    }

    /**
     * @test
     * @expectedException \Symfony\Component\OptionsResolver\Exception\UndefinedOptionsException
     */
    public function should_throw_exception_when_given_attribute_does_not_exists()
    {
        $this->getSampleOptionsWidget([
            'shortText' => 'Lorem',
            'number' => 33,
        ]);
    }

    /**
     * @param array $options
     *
     * @return SampleOptionsWidget
     */
    private function getSampleOptionsWidget(array $options = [])
    {
        return (new SampleOptionsWidget)->widget($options);
    }
}