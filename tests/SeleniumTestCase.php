<?php

namespace App;

/**
 * Selenium TestCase
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class SeleniumTestCase extends \PHPUnit_Extensions_Selenium2TestCase
{
    /**
     * Prepares the session.
     * This is a monkey patch for an issue that Selenium cannot set cookies.
     *
     * @return \PHPUnit_Extensions_Selenium2TestCase_Session
     */
    public function prepareSession()
    {
        $session = parent::prepareSession();

        $this->url((string) $this->getBrowserUrl());

        return $session;
    }
}
