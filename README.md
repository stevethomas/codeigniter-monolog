Codeigniter-Monolog-Plus
===================

Simple integration of the Monolog Package (https://github.com/Seldaek/monolog) into CodeIgniter by overwriting the CI_Log class.

Based on https://github.com/pfote/Codeigniter-Monolog but updating to support Codeigniter 3, monolog ^1.22, and supporting file logging more akin to native CodeIgniter logging.

This library registers Monolog as the PHP error handler to catch all errors and adds support for IntrospectionProcessor for additional meta data.

Supports CI-File (native style Codeigniter errors), File (RotatingFileHandler), New Relic (NewRelicHandler), HipChat (HipChatHandler), stderr (for use with Heroku), and papertrail (log directly to papertrailapp.com)

Support now included to milti-line output into logs

Installation
------------
* Install monolog with ```composer require monolog/monolog```
* Make sure your config.php contains has the ```$config['composer_autoload']``` setting updated to point to ```/vendor/autoload.php```
* Copy application/core/Log.php and application/config/monolog.php into your Codeigniter application

Usage
-----
Use log_message() as normal in CodeIgniter to log error, debug and info messages. Log files are stored in the application/logs folder.

License
-------

codeigniter-monolog-plus is licensed under the MIT License - see the LICENSE file for details
