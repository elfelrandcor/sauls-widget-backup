<?php
/**
 * @copyright Saulius Vaiceliunas
 */

namespace Sauls\WidgetBundle\Widget;

class WidgetFactory implements WidgetFactoryInterface
{
    /**
     * @var array WidgetInterface[]
     */
    private $widgets;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->widgets = [];
    }

    /**
     * Adds widget to the widgets list array
     *
     * @param WidgetInterface $widget
     * @param null|string     $alias
     *
     * @return WidgetFactoryInterface
     */
    public function addWidget(WidgetInterface $widget, $alias = null)
    {
        if (null === $alias) {
            $alias = $widget->getName();
        }

        $this->widgets[$alias] = $widget;

        return $this;
    }

    /**
     * @param $alias
     *
     * @return null|WidgetInterface
     */
    public function getWidget($alias)
    {
        if ($this->hasWidget($alias)) {
            return clone $this->widgets[$alias];
        }

        return null;
    }

    /**
     * Returns if widget with provided alias exists
     *
     * @param $alias
     *
     * @return bool
     */
    public function hasWidget($alias)
    {
        return array_key_exists($alias, $this->widgets);
    }
}
