<?php

namespace System;

class App
{
    // 控制器
    private $url_controller = null;

    // 上述控制器的方法，通常也称为 "action"
    private $url_action = null;

    // URL 参数
    private $url_params = [];

    /**
     * 启动应用程序：
     * 分析URL元素并调用相应的 controller/method 或回退
     */
    public function __construct()
    {
        // 使用 $URL 中的 URL 部分创建数组
        $this->splitUrl();
        $this->route();
    }

    /**
     * 获取并拆分 URL
     */
    private function splitUrl()
    {
        if (isset($_GET['url'])) {

            // 拆分 URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // 将 URL 部分放入相应的属性中
            $this->url_controller = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;

            // 从拆分 URL 中删除控制器和操作
            unset($url[0], $url[1]);

            // 重新设置数组键的基址并存储URL参数
            $this->url_params = array_values($url);

            // 用于调试。如果 URL 有问题，请取消对此的注释
            //echo '控制器: ' . $this->url_controller . '<br>';
            //echo '方　法: ' . $this->url_action . '<br>';
            //echo '参　数: ' . print_r($this->url_params, true) . '<br>';
        }
    }

    private function route()
    {
        // 检查控制器：是否未提供控制器？然后加载起始页
        if (!$this->url_controller) {
            $page = new \App\Controllers\HomeController();
            $page->index();
        } elseif (file_exists(APP_PATH . 'Controllers/' . ucfirst($this->url_controller) . 'Controller.php')) {
            // 这里我们检查了控制器：这样的控制器存在吗？
            // 如果是，则加载此文件并创建此控制器
            // 类似 \App\Controller\UserController
            $controller = "\\App\\Controllers\\" . ucfirst($this->url_controller) . 'Controller';
            $this->url_controller = new $controller();

            // 检查方法：控制器中是否存在此类方法？
            if (
                method_exists($this->url_controller, $this->url_action) &&
                is_callable(array($this->url_controller, $this->url_action))
            ) {

                if (!empty($this->url_params)) {
                    // 调用该方法并向其传递参数
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    // 如果没有参数，只需调用不带参数的方法
                    // 如 $this->home->method()；
                    $this->url_controller->{$this->url_action}();
                }
            } else {
                if (strlen($this->url_action) == 0) {
                    // 未定义操作：调用所选控制器的默认 index() 方法
                    $this->url_controller->index();
                } else {
                    $page = new \App\Controllers\ErrorController();
                    $page->index();
                }
            }
        } else {
            $page = new \App\Controllers\ErrorController();
            $page->index();
        }
    }
}
