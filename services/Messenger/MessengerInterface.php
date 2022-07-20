<?php


namespace app\services\Messenger;

use yii\httpclient\Response;

interface MessengerInterface
{
    public function sendMessage(int $chat_id, string $text): Response;
}