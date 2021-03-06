<?php

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
    'path' => path('app/cache/session'),

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
    'handlers' => array(
        /**
         * Store sessions in a file.
         *
         * @var string
         */
        'file' => 'Rougin\Weasley\Session\FileSessionHandler'
    ),
);
