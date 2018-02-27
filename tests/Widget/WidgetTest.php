<?php
/**
 * @copyright Saulius Vaiceliunas 2015
 */


namespace Sauls\WidgetBundle\Widget;

use Sauls\WidgetBundle\Widget\Stub\FaultyTestWidget;
use Sauls\WidgetBundle\Widget\Stub\TestWidget;

class WidgetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_return_provided_id()
    {
        $testWidget = $this->getTestWidgetObject();
        $testWidget->setId("test-widget");

        $this->assertEquals('test-widget', $testWidget->getId());
    }

    /**
     * @test
     */
    public function should_return_correct_ids_when_multiple_widgets_exists()
    {
        $testWidget0 = $this->getTestWidgetObject();
        $this->assertEquals("w0", $testWidget0->getId());

        $testWidget1 = $this->getTestWidgetObject();
        $this->assertEquals("w1", $testWidget1->getId());

        $testWidget2 = $this->getTestWidgetObject();
        $this->assertEquals("w2", $testWidget2->getId());

        $testWidget3 = $this->getTestWidgetObject();
        $this->assertEquals("w3", $testWidget3->getId());

        $testWidget4 = $this->getTestWidgetObject();
        $this->assertEquals("w4", $testWidget4->getId());

        $testWidget5 = $this->getTestWidgetObject();
        $this->assertEquals("w5", $testWidget5->getId());
    }

    /**
     * @test
     */
    public function should_return_render_method_output_when_converting_to_string()
    {
        $testWidget = new TestWidget();
        $renderOutput = $testWidget->render();

        $this->assertEquals($renderOutput, $testWidget->__toString(),
            "render method and __toString method outputs should be the same");
    }

    /**
     * @test
     */
    public function should_return_exception_message_on_render_when_converting_to_string()
    {
        $faultyTestWidget = new FaultyTestWidget();
        $output = $faultyTestWidget->__toString();

        $this->assertEquals("I shall not render!!", $output, "Exception message and returned output should be equal");
    }

    /**
     * @return TestWidget
     */
    public function getTestWidgetObject()
    {
        return new TestWidget();
    }

}
