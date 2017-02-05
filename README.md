Codeigniter-Monolog
===================

Simple integration of the Monolog Package (https://github.com/JoshHighland/codeigniter-monolog) into CodeIgniter by overwriting the CI_Log class.

Based on https://github.com/pfote/Codeigniter-Monolog (who based it on https://github.com/Seldaek/monolog) but updating to support Codeigniter 3, monolog to ^1.22 and supporting file logging more akin to native CodeIgniter logging.

This library registers Monolog as the PHP error handler to catch all errors and adds support for IntrospectionProcessor for additional meta data.

Supports CI-File (native style Codeigniter errors), File (RotatingFileHandler), New Relic (NewRelicHandler), HipChat (HipChatHandler), stderr (for use with Heroku), and papertrail (log directly to papertrailapp.com)

Installation
------------
* Install monolog with ```composer require monolog/monolog```
* Make sure your config.php contains has the ```$config['composer_autoload']``` setting updated to point to ```/vendor/autoload.php```
* Copy application/core/Log.php and application/config/monolog.php into your CodeIgniter application

Usage
-----
Use log_message() as per normal in CodeIgniter to log error, debug and info messages. Log files are stored in the application/logs folder.

License
-------

codeigniter-monolog is licensed under the MIT License - see the LICENSE file for details
