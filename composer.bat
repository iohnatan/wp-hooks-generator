@REM to not print commands.
@ECHO OFF

@REM composer update: upgrade our project packages (development).
@REM composer install: install the same dependencies stored in the composer.lock (production).
%COMPOSER74% update