<?php

namespace core\template;

use League\Plates\Engine;

class Plates
{
    public function render(
        string $view,
        array $data = [],

    ) {

        $path = dirname(__FILE__, 3) . "/resources/views";

        // Create new Plates instance
        $templates = new Engine($path);

        // Render a template
        echo $templates->render($view);
    }

}
