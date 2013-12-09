<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * CodeIgniter Monolog integration
 *
 * Version 1.0.1
 * (c) Steve Thomas <steve@thomasmultimedia.com.au>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Monolog\Logger;
use Monolog\ErrorHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Processor\IntrospectionProcessor;

/**
 * replaces CI's Logger class, use Monolog instead
 *
 * see https://github.com/stevethomas/codeigniter-monolog & https://github.com/Seldaek/monolog
 *
 */
class CI_Log
{
    // CI log levels
    protected $_levels = array(
        'OFF' => '0',
        'ERROR' => '1',
        'DEBUG' => '2',
        'INFO' => '3',
        'ALL' => '4'
    );

    // config placeholder
    protected $config = array();


    /**
     * prepare logging environment with configuration variables
     */
    public function __construct()
    {
        // copied functionality from system/core/Common.php, as the whole CI infrastructure is not available yet
        if (!defined('ENVIRONMENT') OR !file_exists($file_path = APPPATH . 'config/' . ENVIRONMENT . '/monolog.php')) {
            $file_path = APPPATH . 'config/monolog.php';
        }

        // Fetch the config file
        if (file_exists($file_path)) {
            require($file_path);
        } else {
            exit('monolog.php config does not exist');
        }

        // make $config from config/monolog.php accessible to $this->write_log()
        $this->config = $config;

        $this->log = new Logger($this->config['channel']);
        // detect and register all PHP errors in this log hence forth
        ErrorHandler::register($this->log);

        if ($this->config['introspection_processor']) {
            // add controller and line number info to each log message
            $this->log->pushProcessor(new IntrospectionProcessor());
        }

        // decide which handler to use
        switch ($this->config['handler']) {
            case 'file':
                $handler = new RotatingFileHandler($this->config['file_logfile']);
                break;
            default:
                exit('log handler not supported: ' . $this->config['handler']);
        }

        $this->log->pushHandler($handler);

        $this->write_log('DEBUG', 'Monolog replacement logger initialized');
    }


    /**
     * Write to defined logger. Is called from CodeIgniters native log_message()
     *
     * @param string $level
     * @param $msg
     * @return bool
     */
    public function write_log($level = 'error', $msg)
    {
        $level = strtoupper($level);

        // verify error level
        if (!isset($this->_levels[$level])) {
            $this->log->addError('unknown error level: ' . $level);
            $level = 'ALL';
        }

        // filter out anything in $this->config['exclusion_list']
        if (!empty($this->config['exclusion_list'])) {
            foreach ($this->config['exclusion_list'] as $findme) {
                $pos = strpos($msg, $findme);

                if ($pos !== false) {
                    // just exit now - we don't want to log this error
                    return TRUE;
                }
            }
        }

        if ($this->_levels[$level] <= $this->config['threshold']) {
            switch ($level) {
                case 'ERROR':
                    $this->log->addError($msg);
                    break;
                case 'DEBUG':
                    $this->log->addDebug($msg);
                    break;
                case 'ALL':
                case 'INFO':
                    $this->log->addInfo($msg);
                    break;
            }
        }
        return TRUE;
    }
}
