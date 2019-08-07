<?php
/**
 * Created by PhpStorm.
 * User: benn
 * Date: 23/07/2019
 * Time: 11:31 AM
 */
include("LogLevel.php");

class Logger
{
    protected $log_level;
    protected $log_file;
	protected $project_root;

    /**
     *
     * Logger constructor.
     * @param $project_root
     */
    public function __construct($project_root)
    {
        $this->log_level = LogLevel::INFO;
		$this->project_root = $_SERVER['DOCUMENT_ROOT'].$project_root.'/';
        $this->log_file = $this->project_root.'php.log';
    }

    /**
     * @param $msg
     */
    public function info($msg){
        $this->log_level = LogLevel::INFO;
        $this->log($msg);
    }

    /**
     * @param $msg
     */
    public function warning($msg){
        $this->log_level = LogLevel::WARNING;
        $this->log($msg);
    }

    /**
     * @param $msg
     */
    public function error($msg){
        $this->log_level = LogLevel::ERROR;
        $this->log($msg);
    }

    /**
     * private method that logs tasks
     * @param $msg
     */
    private function log($msg){

        try {
            $datetime = new DateTime();
            $datetime = $datetime->format(DATE_ATOM);
            $trace_array = debug_backtrace();
            $trace_array_len = count($trace_array);
            $data = "[$datetime] : $this->log_level - ".$trace_array[$trace_array_len-1]['file'].":".$trace_array[$trace_array_len-1]['line']."  ". print_r($msg, true) . "\n";
			$isExisting  = is_dir($this->project_root);
			if($isExisting){
				file_put_contents($this->log_file, $data, FILE_APPEND);
			}
			else{
				mkdir($this->project_root, 0755);
                file_put_contents($this->log_file, $data, FILE_APPEND);
			}
        }
        catch (Exception $e){
        }
    }

}
