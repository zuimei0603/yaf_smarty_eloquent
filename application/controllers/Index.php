<?php
/**
 * @name IndexController
 * @author sc-201707080048\administrator
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
use App\Models\User;
class IndexController extends Yaf\Controller_Abstract {

	/** 
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/yaf/index/index/index/name/sc-201707080048\administrator 的时候, 你就会发现不同
     */
	public function indexAction($name = "Stranger") {
		//1. fetch query
		$get = $this->getRequest()->getQuery("get", "default value");
		$moduleName = $this->getRequest()->getModuleName();
		$controllerName = $this->getRequest()->getControllerName();
		$actionName = $this->getRequest()->getActionName();

		//2. fetch model
		$model = new SampleModel();

		//3. assign
		$this->getView()->assign("content", $model->selectSample());
		$this->getView()->assign("name", $name);
		$this->getView()->assign("moduleName", $moduleName);
		$this->getView()->assign("controllerName", $controllerName);
		$this->getView()->assign("actionName", $actionName);

		//4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return TRUE;
	}

	public function smartyAction() {
	    $this->getView()->assign('content', 'hello world');
	    $this->getView()->assign('value', 'json');
	    $this->getView()->display('index/smarty.tpl');
    }

    public function userAction() {
        $users = User::find(1);
        echo "<pre>";
	    var_dump($users);
        echo "</pre>";
    }
}
