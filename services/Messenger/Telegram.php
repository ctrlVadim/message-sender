<?php

namespace app\services\Messenger;


use Yii;
use yii\httpclient\Client;
use yii\httpclient\Response;

class Telegram implements MessengerInterface
{
    protected array $bot;

    const URL = 'https://api.tlgr.org/bot';

    public function __construct(array $bot)
    {
        $this->bot = $bot;
    }

    public function sendMessage(int $chat_id, string $text): Response
    {
        $client = new Client();

        $url = self::URL . $this->bot['token'] . '/sendMessage';
        $data = [
            'chat_id' => $chat_id,
            'text' => $text
        ];

        $response = $client->post($url, $data)->setFormat(Client::FORMAT_JSON)->send();

        if ($response->isOk) {
            return $response;
        }

        throw new \yii\web\ServerErrorHttpException('Telegram server error');
    }
}