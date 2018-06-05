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
                "app_key" => "5afe4922f29d983844000068",
                "app_master_secret" => "d3mnhbgi3ejtpcp7vb1lb7tajhyv2wqm"
            ],
            "android" => [
                "app_key" => "5afd15a18f4a9d7504000026",
                "app_master_secret" => "b4jxlgbd07djfsjrmmgll9brhto1vf0t"
            ],
            "product" => false
        ];
        $this->object = new UmengPusher($settings);
    }

    public function testAndroidSendUnicast()
    {
        // 1241464
        $device_token = '3f36cf00ee202b945faad6ed43562f07cafce11851e2da615f1d7c17d572c508';
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
            // 'alert' => 'customizedcast',
        ];
        $customField = [
            "display_type" => "notification"
        ];
        $result = "";
        try {
            // $result = $this->object->android()->sendUnicast($device_token, $predefined, $customField); // 单播
            print_r($result);
        } catch (Exception $e) {
            print_r($e->getMessage());
            print_r($e->getTraceAsString());
        }
    }

    public function testIosSendUnicast()
    {
        // 1241464
        $device_token = '3f36cf00ee202b945faad6ed43562f07cafce11851e2da615f1d7c17d572c508';
        $predefined = [
            'alias' => '1241464', //
            'alias_type' => 'mofingid',
            'type' => 'customizedcast',
            'alert' => [
                "title" => "title",
                "subtitle" => "subtitle",
                "body" => "这里是消息数据"
            ]
        ];
        $customField = [
            "display_type" => "notification",
            "body" => [
                "after_open" => "go_custom",
                "ticker" => "测试提示文字444",
                "title" => "测试标题000",
                "text" => "测试文字描述",
                "custom" => [
                    "name" => "ddd"
                ]
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