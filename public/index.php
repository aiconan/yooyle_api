<?php
// +----------------------------------------------------------------------
// | Yooyle [ An Aggregate Aearch Engine ]
// +----------------------------------------------------------------------
// | Copyright (c) 2019 Yooyle All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: aiconan (aiconan666@gmail.com)
// +----------------------------------------------------------------------

// 应用入口文件

// 基本参数
error_reporting(0);
header('Content-type: application/json');
header('Y-Powered-By: Yooyle');

// 定义变量
define('Y_KEYWORDS', $_GET["keywords"]);
define('Y_LIMIT', $_GET["limit"]);
define('Y_PAGE', $_GET["page"]);
define('Y_TYPE', $_GET["type"]);

// 引入文件，加载插件
require '../vendor/autoload.php';
use QL\QueryList;
use QL\Ext\Baidu;
use liesauer\QLPlugin\BingSearcher;
use QL\Ext\Google;
$ql = QueryList::getInstance();
$ql->use([
    Baidu::class,
    BingSearcher::class,
    Google::class
]);

// 引入搜索引擎
if (constant("Y_TYPE") == "baidu") {
    // For Baidu
    $data = $ql->
        baidu(constant("Y_LIMIT"))->
        search(constant("Y_KEYWORDS"))->
        page(constant("Y_PAGE"), true)->
        all();
} else if (constant("Y_TYPE") == "bing") {
    // For Bing
    $data = $ql->
        BingSearcher(constant("Y_LIMIT"))->
        search(constant("Y_KEYWORDS"))->
        page(constant("Y_PAGE"));
}else if (constant("Y_TYPE") == "google") {
    // For Google
    $data = $ql->
        google(constant("Y_LIMIT"))->
        search(constant("Y_KEYWORDS"))->
        page(constant("Y_PAGE"))->
        all();
}

// 输出结果
$data = json_encode($data, JSON_UNESCAPED_UNICODE);
$callback = !empty($_GET['cb']) ? trim($_GET['cb']) : '';
if(!empty($callback)) {
    print_r("{$callback}({$data})");
} else {
    print_r($data);
}
?>