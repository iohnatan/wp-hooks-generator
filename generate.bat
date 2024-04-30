@REM to not print commands.
@ECHO OFF

@REM @REM wordpress.
set INPUT_DIR=D:\CloudSync\0-Dev\Wordpress\Plugins\WordPress
set PROJECT=wordpress

@REM woocommerce.
@REM set INPUT_DIR=D:\CloudSync\0-Dev\Wordpress\Plugins\woocommerce
@REM set PROJECT=woocommerce

@REM action_scheduler.
@REM set INPUT_DIR=D:\CloudSync\0-Dev\Wordpress\Plugins\action-scheduler
@REM set PROJECT=action_scheduler

php src\generate.php  ^
	--input=%INPUT_DIR% ^
	--output=generated-hooks\actions ^
	--project=%PROJECT%