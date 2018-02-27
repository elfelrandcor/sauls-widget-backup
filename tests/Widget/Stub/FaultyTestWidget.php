<?php
/**
 * @copyright Saulius Vaiceliunas 2016
 */

namespace Sauls\WidgetBundle\Widget\Stub;

class FaultyTestWidget extends TestWidget
{
    /**
     * @throws \Exception
     */
    public function render()
    {
        throw new \Exception("I shall not render!!");
    }

}
