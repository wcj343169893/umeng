<?php
namespace UmengPusher\Umeng\Pusher;

/**
 * 推送父类
 * @author Wenchaojun <343169893@qq.com>
 *
 */
class Pusher
{

    protected $appKey = null;

    protected $appMasterSecret = null;

    protected $timestamp = null;

    protected $production_mode = true;

    public function __construct($appKey, $masterSecret)
    {
        $this->appKey = $appKey;
        $this->appMasterSecret = $masterSecret;
        $this->timestamp = strval(time());
    }
}
