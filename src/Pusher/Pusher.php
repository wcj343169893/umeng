<?php


namespace UmengPusher\Umeng\Pusher;


class Pusher
{
    protected $appKey = null;
    protected $appMasterSecret = null;
    protected $timestamp = null;
    protected $production_mode = false;


    public function __construct($appKey, $masterSecret,$production_mode=false){
        $this->appKey = $appKey;
        $this->appMasterSecret = $masterSecret;
        $this->timestamp = strval(time());
        $this->production_mode = $production_mode;
    }
}
