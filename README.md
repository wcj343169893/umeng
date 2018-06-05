# 基于umeng官方php sdk v1.4,支持cakephp 3.x

## 安装
``` bash
$ composer require mofing/ument:"~1.0"
```
1. https://www.umeng.com/ 开发者中心 创建一个应用得到appkey


## 用法

Android用法:
```php

    use Umeng;
    
    $device_token = 'xxxx';
    $predefined = array('ticker' => 'android ticker' ,...);
    $extraField = array(); //other extra filed
    Umeng::android()->sendUnicast($device_token,$predefined,$extraField); //单播

```

IOS用法:

```php
    use UmengPusher;
    
    $UmengPusher=new UmengPusher([]);
    $device_token = 'xxxx';
    $predefined = array('alert' => 'ios alert' ,...);
    $customField = array(); //other custom filed
    $UmengPusher->ios()->sendUnicast($device_token,$predefined,$customField); //单播
    
```

## Api

说明: Android API跟 IOS一样

```php
    
    sendBroadcast($predefined = [], $extraField = []); //广播
    sendUnicast($device_tokens = '', $predefined= [], $extraField = []); //单播
    sendListcast($device_tokens = '', $predefined= [], $extraField = []); //列播
    sendFilecast($fileContents = '', $predefined= [],$extraField = []); //文件播
    sendGroupcast($filter = [], $predefined= [], $extraField = []); //组播
    sendCustomizedcast($alias = '', $alias_type = '', $predefined= [], $extraField = []); //自定义播,通过alias
    sendCustomizedcastFileId($file_contents = '', $predefined= [], $extraField = []); //自定义播,通过file_id
    
```

## Exception

程序不处理异常,可根据业务情况自行处理, 若抛出异常,可通过 `e->getHttpCode()` 获取http状态码, 通过 `e->getErrCode()`获取umeng返回的错误码.
使用过程中若出错,可自行查看Laravel或Lumen的Log日志# umeng

