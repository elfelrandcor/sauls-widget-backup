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

namespace Sauls\WidgetBundle\Widget\Stub;


use Sauls\WidgetBundle\Widget\Base\OptionsResolverWidget;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SampleOptionsWidget extends OptionsResolverWidget
{
    /**
     * @var string
     */
    private $text;
    /**
     * @var int
     */
    public $number;

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @param OptionsResolver $resolver
     *
     * @return void
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'text' => 'Lorem ipsum',
                'number' => 0,
            ]
        );
    }

    /**
     * Renders the widget
     */
    public function render()
    {
        return sprintf("%s, %s", $this->number, $this->text);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sample_options.widget';
    }
}
