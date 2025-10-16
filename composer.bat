@REM to not print commands.
@ECHO OFF

@REM composer update: upgrade our project packages (development).
@REM composer install: install the same dependencies stored in the composer.lock (production).
@REM --with-all-dependencies (-W) to allow upgrades, downgrades and removals for packages
@REM   currently locked to specific versions.
%COMPOSER84% update