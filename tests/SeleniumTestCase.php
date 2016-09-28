<?php

namespace Test;

/**
 * Selenium TestCase
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class SeleniumTestCase extends \PHPUnit_Extensions_Selenium2TestCase
{
    public function prepareSession()
    {
        $response = parent::prepareSession();

        $this->url((string) $this->getBrowserUrl());

        return $response;
    }
}
