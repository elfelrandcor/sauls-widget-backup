<?php
/**
 * @copyright Saulius Vaiceliunas 2016
 */

namespace Sauls\WidgetBundle\Twig;

use Sauls\WidgetBundle\Widget\Stub\TestWidget;
use Sauls\WidgetBundle\Widget\WidgetFactory;

class WidgetExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var WidgetExtension
     */
    private $widgetExtension;

    /**
     * Set up
     */
    protected function setUp()
    {
        $this->widgetExtension = $this->getWidgetExtension();
    }

    /**
     * @test
     */
    public function should_find_widget_function()
    {
        $functions = $this->widgetExtension->getFunctions();

        $this->assertEquals('widget', $functions[0]->getName(), "There should be 'widget' function registered");
    }

    /**
     * @test
     */
    public function should_return_widget_property_value()
    {
        /**
         * @var TestWidget $widget
         */
        $widget = $this->widgetExtension->widget('test_widget', [
            'value' => 'This is a test widget'
        ]);

        $this->assertEquals("This is a test widget", $widget->value, "Widget property not set");
    }

    /**
     * @test
     */
    public function should_return_empty_string_when_widget_does_not_exists()
    {
        $widget = $this->widgetExtension->widget('non_existing_widget', [
            'no' => 'value'
        ]);

        $this->assertEquals('', $widget, "On non existing alias widget extension should return empty string");
    }

    /**
     * @test
     */
    public function should_return_correct_name()
    {
        $this->assertEquals('sauls_widget_extension', $this->widgetExtension->getName(), "Wrong widget extension name");
    }

    /**
     * @param array $widgets
     * @return WidgetExtension
     */
    public function getWidgetExtension(array $widgets = [])
    {
        $widgets = array_merge([
            'test_widget' => new TestWidget(),
        ], $widgets);

        $widgetFactory = new WidgetFactory();

        foreach ($widgets as $alias => $widget) {
            $widgetFactory->addWidget($widget, $alias);
        }

        return new WidgetExtension($widgetFactory);
    }
}
