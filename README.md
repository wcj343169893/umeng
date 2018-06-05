# 基于umeng官方php sdk v1.4,支持cakephp 3.x

## 安装
``` bash
$ composer install "mofing/umeng":"~1.1"
```
或者修改composer.json
```
{
    "require": {
        "mofing/umeng": "~1.1"
    }
}
```

1. https://message.umeng.com/list/apps 开发者中心 创建一个应用得到app_key和app_master_secret


## 用法

Android用法:
```php

    use UmengPusher\Umeng\Pusher\UmengPusher;
    $settings = [
        "android" => [
            "app_key" => "aaa",
            "app_master_secret" => "bbbb"
        ],
        "product" => false
    ];
    $umeng = new UmengPusher($settings);
    $device_token = 'xxxx';
    $predefined = [
            "after_open" => "go_custom",
            "ticker" => "测试提示文字",
            "title" => "测试标题",
            "text" => "测试文字描述",
            "custom" => [
                "name" => "ddd"
            ]
        ];
    $extraField = array(); //other extra filed
    $umeng->android()->sendUnicast($device_token,$predefined,$extraField); //单播

```

IOS用法:

```php
    use UmengPusher\Umeng\Pusher\UmengPusher;
    $settings = [
        "ios" => [
            "app_key" => "aaa",
            "app_master_secret" => "bbbb"
        ],
        "product" => false
    ];
    
    $UmengPusher=new UmengPusher($settings);
    $device_token = 'xxxx';
    $predefined = [
        'alert' => [
            "title" => "title",
            "subtitle" => "subtitle",
            "body" => "这里是消息数据"
        ]
    ];
    $customField = array(); //other custom filed
    $UmengPusher->ios()->sendUnicast($device_token,$predefined,$customField); //单播
    
```

