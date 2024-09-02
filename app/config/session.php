<?php

/**
 * @var array<string, mixed>
 */
return array(
    /**
     * Name of the the session in $_COOKIE superglobal.
     *
     * @var string
     */
    'cookies' => 'basilisk_session',

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
     * Driver for the \SessionHandlerInterface.
     *
     * @var string
     */
    'driver' => 'file',

    /**
     * Listing of available session drivers.
     *
     * @var array
     */
    'handlers' =>
    [
        /**
         * Store sessions in a file.
         *
         * @var string
         */
        'file' => 'Rougin\Weasley\Session\FileSessionHandler'
    ],
);
