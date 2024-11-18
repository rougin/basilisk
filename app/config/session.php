<?php

/**
 * Returns a configuration file when using PHP sessions.
 *
 * @var array<string, mixed>
 */
return array(

    /**
     * Name of the the session in "$_COOKIE" superglobal.
     *
     * @var string
     */
    'cookies' => 'bslk_session',

    /**
     * Path to store the file-based sessions.
     *
     * @var string
     */
    'path' => __DIR__ . '/../../app/cache/session',

    /**
     * Time of expiration of each session.
     *
     * @var integer
     */
    'expiration' => time() + 7200,

    /**
     * Time of lifetime of a session (in minutes).
     *
     * @var integer
     */
    'lifetime' => 60,

    /**
     * Name of the drive to be used to SessionHandlerInterface.
     * For the value to be specified in this property, kindly
     * see the "handlers" property below for all the available
     * session drivers that can be used (e.g., "file").
     *
     * @var string
     */
    'driver' => 'file',

    /**
     * Returns an array of available session drivers. Please
     * see the @link below for more information on how to create
     * a session handler using the "SessionHandlerInterface".
     *
     * @link https://www.php.net/manual/en/class.sessionhandlerinterface.php
     *
     * @var array<string, string>
     */
    'handlers' => array(

        /**
         * Store sessions in a file.
         *
         * @var string
         */
        'file' => 'Rougin\Weasley\Session\FileSessionHandler'

    ),

);
