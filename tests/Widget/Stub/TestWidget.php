<?php
/**
 * @copyright Saulius Vaiceliunas 2016
 */

namespace Sauls\WidgetBundle\Widget\Stub;

use Sauls\WidgetBundle\Widget\Widget;

class TestWidget extends Widget
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
        return "<strong>This</strong> is Widget Test!";
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'test.widget';
    }
}
