<?php
/**
 * @copyright Saulius Vaiceliunas 2016
 */

namespace Sauls\WidgetBundle\Widget\Stub;

use Sauls\WidgetBundle\Widget\Widget;

class SampleWidget extends Widget
{
    /**
     * @var string
     */
    public $value;

    /**
     * @return string
     */
    public function render()
    {
        return "<strong>This</strong> is Sample Widget!";
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sample.widget';
    }
}
