Codeigniter-Monolog - with PaperTrail support
===================

Simple integration of the Monolog Package (https://github.com/Seldaek/monolog) into CodeIgniter by overwriting the CI_Log class.

Based on https://github.com/pfote/Codeigniter-Monolog, but updating monolog to 1.22.* and supporting file logging more akin to native CodeIgniter logging.

This library registers Monolog as the PHP error handler to catch all errors and adds support for IntrospectionProcessor for additional meta data.

Supports File (RotatingFileHandler), New Relic (NewRelicHandler), HipChat (HipChatHandler) and Papertrail via SyslogUdpHandler.

Compatible with Codeigniter 3.1.6 and up

Installation
------------
* Install monolog with ```composer require monolog/monolog```
* Make sure your index.php contains  ```include_once './vendor/autoload.php';```
* Copy application/core/MY_Log.php and application/config/monolog.php into your CodeIgniter application

Usage
-----
Use log_message() as per normal in CodeIgniter to log error, debug and info messages. Log files are stored in the application/logs folder in format YYYY-MM-DD-ci.log

License
-------

codeigniter-monolog is licensed under the MIT License - see the LICENSE file for details
