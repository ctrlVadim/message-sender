<?php

namespace app\bootstrap;


use app\services\Messenger\MessengerInterface;
use app\services\Messenger\Telegram;
use Yii;
use yii\base\BootstrapInterface;

class SetUp implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $container = Yii::$container;

        $container->setSingleton(MessengerInterface::class, new Telegram([
            'token' => '5468953526:AAGGvDaOloYQKcwkT3iQiZTwIZln05a3SPs',
            'user_name' => 'inspectrum_clinic_bot'
        ]));
    }
}