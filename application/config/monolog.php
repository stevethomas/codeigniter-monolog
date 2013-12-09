<?php  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/*
 * CodeIgniter Monolog integration
 *
 * (c) Steve Thomas <steve@thomasmultimedia.com.au>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


/* GENERAL OPTIONS */
$config['handler'] = 'file'; // valid handlers are file
$config['channel'] = ENVIRONMENT; // channel name which appears on each line of log
$config['threshold'] = '1'; // 'ERROR' => '1', 'DEBUG' => '2',  'INFO' => '3', 'ALL' => '4'
$config['introspection_processor'] = TRUE; // add some meta data such as controller and line number to log messages

/* FILE HANDLER OPTIONS
 * Log to default CI log directory (must be writable ie. chmod 757).
 * Filename will be encoded to current system date, ie. YYYY-MM-DD-ci.log
*/
$config['file_logfile'] = APPPATH . 'logs/ci.log';

// exclusion list for pesky messages which you may wish to temporarily suppress with strpos() match
$config['exclusion_list'] = array();