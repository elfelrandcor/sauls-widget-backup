<?php
/**
 * @copyright Saulius Vaiceliunas
 */
namespace Sauls\WidgetBundle\Widget;

interface WidgetInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param array $options
     *
     * @return mixed
     */
    public function widget(array $options);

    /**
     * @return string
     */
    public function render();

}
