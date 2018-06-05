<?php
namespace UmengPusher\Umeng\Pusher;

class UmengPusher
{

    private $android = null;

    private $ios = null;

    /**
     * 
     * @param array $settings
     * [
     *  "ios"=>[
     *      "app_key"=>"aaa",
     *      "app_master_secret"=>"bbb",
     *  ],
     *  "android"=>[
     *      "app_key"=>"aaa",
     *      "app_master_secret"=>"bbb",
     *  ]
     * ]
     */
    public function __construct($settings = [])
    {
        if (! empty($settings["ios"])) {
            $iosAppKey = $settings["ios"]['app_key'];
            $iosAppMasterSecret = $settings["ios"]['app_master_secret'];
            $this->ios = new IOSPusher($iosAppKey, $iosAppMasterSecret);
        }
        if (! empty($settings["android"])) {
            $androidAppKey = $settings["android"]['app_key'];
            $androidAppMasterSecret = $settings["android"]['app_master_secret'];
            $this->android = new AndroidPusher($androidAppKey, $androidAppMasterSecret);
        }
    }

    public function android()
    {
        return $this->android;
    }

    public function ios()
    {
        return $this->ios;
    }
}
