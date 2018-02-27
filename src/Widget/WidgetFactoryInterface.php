<?php
/**
 * @copyright Saulius Vaiceliunas
 */
namespace Sauls\WidgetBundle\Widget;

interface WidgetFactoryInterface
{
    /**
     * @param WidgetInterface $widget
     * @param null|string     $alias
     *
     * @return WidgetFactoryInterface
     */
    public function addWidget(WidgetInterface $widget, $alias = null);

    /**
     * @param $alias
     *
     * @return null|WidgetInterface
     */
    public function getWidget($alias);

    /**
     * Returns if widget with provided alias exists
     *
     * @param $alias
     *
     * @return bool
     */
    public function hasWidget($alias);
}
