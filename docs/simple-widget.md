# SimpleWidget usage example

## Define the widget class

```php
<?php

use Sauls\WidgetBundle\Widget\Widget;

class SimpleLinkWidget extends Widget
{
    /**
     * @var string
     */
    public $class = 'btn btn-default';

    /**
     * @var string
     */
    public $label = '';

    /**
     * @var string
     */
    public $url = '';

    /**
     * @var string
     */
    public $template = '<a href="{url}" class="{class}">{label}</a>';


    /**
     * @return string
     */
    public function render()
    {
        return strtr($this->template, [
            '{url}' => $this->url,
            '{class}' => $this->class,
            '{label}' => $this->label
        ]);
    }
}
```

## Register to the container

In to your service.yml file add the following lines

```yaml
parameters:
	simple_link.widget.class: SimpleLinkWidget
service:
	simple_link.widget:
    		class: %simple_link.widget.class%
    		tags:
      			- { name: sauls_widget.widget, alias: simple_link }

```

## Render the widget

```twig
{#  index.html.twig #}
<div class="simple-div">
	{{ widget('simple_link', {
		'label': 'Click me'|trans,
		'url': path('simple_link_route')
	}) }}
</div>
```
