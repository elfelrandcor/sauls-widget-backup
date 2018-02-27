<?php
/**
 * @copyright Saulius Vaiceliunas
 */

namespace Sauls\WidgetBundle\Widget;

abstract class Widget extends WidgetComponent implements WidgetInterface
{
    /**
     * @var
     */
    protected $id;

    /**
     * @var string
     */
    public static $autoPrefix = 'w';

    /**
     * @var int
     */
    public static $counter = 0;


    /**
     * Returns the ID of the widget.
     *
     * @param boolean $autoGenerate whether to generate an ID if it is not set previously
     *
     * @return string ID of the widget.
     */
    public function getId($autoGenerate = true)
    {
        if ($autoGenerate && $this->id === null) {
            $this->id = static::$autoPrefix.static::$counter++;
        }

        return $this->id;
    }

    /**
     * Sets the ID of the widget.
     *
     * @param string $value id of the widget.
     */
    public function setId($value)
    {
        $this->id = $value;
    }


    /**
     * @param array $options
     *
     * @return $this
     */
    public function widget(array $options)
    {
        $this->handleOptions($options);

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        try {
            ob_start();
            ob_implicit_flush(false);
            try {
                $out = $this->render();
            } catch (\Exception $e) {
                // close the output buffer opened above if it has not been closed already
                if (ob_get_level() > 0) {
                    ob_end_clean();
                }
                throw $e;
            }

            return ob_get_clean().$out;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Renders the widget
     */
    abstract public function render();
}
