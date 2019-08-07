<?php
/**
 * Created by PhpStorm.
 * User: benn
 * Date: 23/07/2019
 * Time: 9:07 PM
 */
include("Logger.php");

class LoggerHelper
{
    protected  $logger;

    /**
     * LoggerHelper constructor.
     * @param $project_root
     * the path to the log file
     */
    public function __construct($project_root)
    {
        $this->logger = new Logger($project_root);
    }

    /**
     * Logs information messages
     * @param $msg
     */
    public function info($msg){
        $this->logger->info($msg);
    }

    /**
     * Logs the warning messages
     * @param $msg
     */
    public function warning($msg){
        $this->logger->warning($msg);
    }

    /**
     * Logs error messages
     * @param $msg
     */
    public function error($msg){
        $this->logger->error($msg);
    }
}
