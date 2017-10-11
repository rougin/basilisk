<?php

namespace App\Http\Controllers;

use Rougin\Slytherin\Integration\Configuration;
use Rougin\Slytherin\Template\RendererInterface;

/**
 * Welcome Controller
 *
 * Displays a simple "Hello, Muggle" text.
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class WelcomeController extends AbstractController
{
    /**
     * @var \Rougin\Slytherin\Integration\Configuration
     */
    protected $config;

    /**
     * @var \Rougin\Slytherin\Template\RendererInterface
     */
    protected $renderer;

    /**
     * @param \Rougin\Slytherin\Integration\Configuration  $config
     * @param \Rougin\Slytherin\Template\RendererInterface $renderer
     */
    public function __construct(Configuration $config, RendererInterface $renderer)
    {
        $this->config = $config;

        $this->renderer = $renderer;
    }

    /**
     * Returns the welcome page.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index()
    {
        $data = array('url' => $this->config->get('app.base_url'));

        return $this->renderer->render('index', $data);
    }
}
