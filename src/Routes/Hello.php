<?php

namespace App\Routes;

use Rougin\Slytherin\Template\RendererInterface;

/**
 * @package [NAME]
 *
 * @author [AUTHOR] <[EMAIL]>
 */
class Hello
{
    /**
     * Returns the "Hello, Muggle!" text.
     *
     * @return string
     */
    public function index(RendererInterface $renderer)
    {
        return $renderer->render('index');
    }
}
