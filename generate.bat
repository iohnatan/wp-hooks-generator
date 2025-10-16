@REM to not print commands.
@ECHO OFF

@REM @REM wordpress.
@REM set INPUT_DIR=D:\CloudSync\0-Dev\wp-projects\base-projects\WordPress
@REM set PROJECT=wp

@REM woocommerce.
set INPUT_DIR=D:\CloudSync\0-Dev\wp-projects\base-projects\woocommerce\plugins\woocommerce
set PROJECT=wc

@REM action_scheduler.
@REM set INPUT_DIR=D:\CloudSync\0-Dev\wp-projects\base-projects\action-scheduler
@REM set PROJECT=as

@REM must be PHP 8
%PHP84% src\generate-iohna.php  ^
	--input=%INPUT_DIR% ^
	--output=generated-hooks\actions ^
	--project=%PROJECT%