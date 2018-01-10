<?php
/**
 * @name ErrorController
 * @desc 错误控制器, 在发生未捕获的异常时刻被调用
 * @see http://www.php.net/manual/en/yaf-dispatcher.catchexception.php
 * @author sc-201707080048\administrator
 */
class ErrorController extends Yaf\Controller_Abstract {

	//从2.1开始, errorAction支持直接通过参数获取异常
	public function errorAction($exception) {
	    echo $exception->getMessage() . '<br/>';
//	    echo $this->getView()->getScriptPath();
		//1. assign to view engine
		$this->getView()->assign("exception", $exception->getMessage());
		//5. render by Yaf
        $this->getView()->display('error/error.tpl');
	}
}
