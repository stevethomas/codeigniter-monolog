Codeigniter-Monolog
===================

Simple integration of the Monolog Package (https://github.com/Seldaek/monolog) into CodeIgniter by overwriting the CI_Log class.

Based on https://github.com/pfote/Codeigniter-Monolog, but updating monolog to 1.6.* and supporting file logging more akin to native CodeIgniter logging.

Also registers monolog as the PHP error handler to catch all errors and adds support for IntrospectionProcessor for additional meta data.

Installation
------------

* Download Monolog using Composer into your Codeigniter root
* add to your index.php Conposers autoload:
  ```include_once './vendor/autoload.php';```
* copy over the relevant files
* have fun

USAGE
-----
Use log_message() as per normal in CodeIgniter to log error, debug and info messages. Log files are stored in the application/logs folder in format YYYY-MM-DD-ci.log

License
-------

codeigniter-monolog is licensed under the MIT License - see the LICENSE file for details
