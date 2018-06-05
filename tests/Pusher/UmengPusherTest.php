<?php
use UmengPusher\Umeng\Pusher\UmengPusher;

class UmengPusherTest extends PHPUnit_Framework_TestCase
{

    /**
     *
     * @var \UmengPusher\Umeng\Pusher\UmengPusher
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $settings = [
            "ios" => [
                "app_key" => "aa",
                "app_master_secret" => "bb"
            ],
            "android" => [
                "app_key" => "cc",
                "app_master_secret" => "dd"
            ],
            "product" => false
        ];
        $this->object = new UmengPusher($settings);
    }

    public function testAndroidSendUnicast()
    {
        // 1241464
        $device_token = '';
        $predefined = [
            'alias' => '262592', //
            'alias_type' => 'mofingid',
            'type' => 'customizedcast',
            "after_open" => "go_custom",
            
            "ticker" => "测试提示文字444",
            
            "title" => "测试标题000",
            "text" => "测试文字描述",
            "custom" => [
                "name" => "ddd"
            ]
        ];
        $customField = [
            "display_type" => "notification"
        ];
        $result = "";
        try {
            $result = $this->object->android()->sendUnicast($device_token, $predefined, $customField); // 单播
            print_r($result);
        } catch (Exception $e) {
            print_r($e->getMessage());
            print_r($e->getTraceAsString());
        }
    }

    public function testIosSendUnicast()
    {
        // 1241464
        $device_token = '';
        $predefined = [
            'alias' => '1241464', //
            'alias_type' => 'mofingid',
            'type' => 'customizedcast',
            'alert' => [
                "title" => "title好没",
                "subtitle" => "subtitle443去掉啦啦啦",
                "body" => "这里是消息数据4d"
            ]
        ];
        $customField = [
            "display_type" => "notification",
            "custom"=>[
                "name" => "ddd"
            ]
        ];
        try {
            $result = $this->object->ios()->sendUnicast($device_token, $predefined, $customField); // 单播
            print_r($result);
        } catch (Exception $e) {
            print_r($e->getMessage());
            print_r($e->getTraceAsString());
        }
    }
}