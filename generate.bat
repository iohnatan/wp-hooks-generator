@REM to not print commands.
@ECHO OFF

@REM @REM wordpress.
@REM set INPUT_DIR=D:\CloudSync\0-Dev\Wordpress\Plugins\WordPress
@REM set PROJECT=wordpress

@REM woocommerce.
@REM set INPUT_DIR=D:\CloudSync\0-Dev\Wordpress\Plugins\woocommerce
@REM set PROJECT=woocommerce

@REM action_scheduler.
set INPUT_DIR=D:\CloudSync\0-Dev\Wordpress\Plugins\action-scheduler
set PROJECT=action_scheduler

@REM must be PHP 7
%PHP74% src\generate_new.php  ^
	--input=%INPUT_DIR% ^
	--output=generated-hooks\actions ^
	--project=%PROJECT%