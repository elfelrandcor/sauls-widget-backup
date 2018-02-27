<?php
/**
 * @copyright Saulius Vaiceliunas
 */

namespace Sauls\WidgetBundle\Twig;

use Sauls\WidgetBundle\Widget\WidgetFactoryInterface;

class WidgetExtension extends \Twig_Extension
{

    /**
     * @var WidgetFactoryInterface
     */
    private $widgetFactory;

    /**
     * Constructor
     *
     * @param WidgetFactoryInterface $widgetFactory
     */
    public function __construct(WidgetFactoryInterface $widgetFactory)
    {
        $this->widgetFactory = $widgetFactory;
    }
    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('widget', [$this, 'widget'], [
                'is_safe' => ['html'],
            ])
        ];
    }

    /**
     * @param $name
     * @param array $options
     * @return string
     */
    public function widget($name, array $options = [])
    {
        if ($widget = $this->widgetFactory->getWidget($name)) {
            $widget->widget($options);
            return $widget;
        }

        return '';
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'sauls_widget_extension';
    }
}
