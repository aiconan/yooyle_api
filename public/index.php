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

// 定义变量
define('Y_KEYWORDS', $_GET["keywords"] || $_POST["keywords"]);
define('Y_LIMIT', $_GET["limit"] || $_POST["limit"]);
define('Y_PAGE', $_GET["page"] || $_POST["page"]);
define('Y_TYPE', $_GET["type"] || $_POST["type"]);

// 引入Composer自动加载文件
require '../vendor/autoload.php';

echo constant("Y_KEYWORDS");
?>