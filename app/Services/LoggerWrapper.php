<?php

namespace App\Services;

use Phalcon\Logger;
use Phalcon\Logger\Adapter;
use Phalcon\Logger\AdapterInterface;
use Phalcon\Logger\Adapter\File;
use Phalcon\Logger\Formatter\Line;

class LoggerWrapper extends Adapter implements AdapterInterface
{

    private $files = [];

    /**
     * Class constructor (duh).
     * 
     * @param string
     * @param string
     * @return void
     */
    public function __construct($filename = null, $level = Logger::DEBUG)
    {
        if ($filename !== null) {
            $this->files[] = (new File($filename))->setLogLevel($level);
        }
        @$this->_queue[] = "[" . date("D, d M y H.i:s O") . "][INFO]: SERVER IP: " . $_SERVER["SERVER_ADDR"] . PHP_EOL;
    }

     /**
     * Sets a new physichal file.
     * 
     * @param string
     * @return void
     */
    public function setFileLogger($file_logger = null)
    {
        if ($file_logger !== null) {
            $this->files[] = (new File($file_logger))->setLogLevel(Logger::DEBUG);
        }
    }

    /**
     * Retrieves the current formatter.
     * 
     * @param void
     * @return void
     */
    public function getFormatter()
    {
        if (gettype($this->_formatter) !== "object") {
            $this->_formatter = new Line();
        }

        return $this->_formatter;
    }

    /**
     * I have little to no idea what this method does...
     * 
     * @param string
     * @param int
     * @param int
     * @param array
     * @return void
     */
    public function logInternal($message, $type, $time, $context = null)
    {
        if ($this->_logLevel >= $type) {
            $this->appendMessage($message, $type, $context);
        }

        foreach ($this->files as $file) {
            if ($file instanceof AdapterInterface) {
                $file->log($type, $message, $context);
            }
        }
    }

    /**
     * Closes the file loggers.
     * 
     * @param void
     * @return void
     */
    public function close()
    {
        foreach ($this->files as $file) {
            if ($file instanceof AdapterInterface) {
                $file->close();
            }
        }
    }

    /**
     * Get log messages.
     * 
     * @param void
     * @return void
     */
    public function getMessages()
    {
        return $this->_queue;
    }

    /**
     * If logger level equals to "debug", it saves the message to the queue for profiling.
     * 
     * @param string
     * @param string
     * @param string
     * @return void
     */
    private function appendMessage($message = null, $level = Logger::DEBUG, $context = null)
    {
        $this->_queue[] = $this->getFormatter()->format($message, $level, time(), $context);
    }
}
