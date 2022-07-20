<?php

namespace app\useCases;

use app\entities\Message;
use app\forms\MessageForm;
use app\services\Messenger\MessengerInterface;
use yii\httpclient\Response;

class MessageService
{
    public MessengerInterface $messenger;

    public function __construct(MessengerInterface $messenger)
    {
        $this->messenger = $messenger;
    }

    public function store(MessageForm $form): Message
    {
        $message = new Message();
        $message->message = $form->message;
        $message->save();

        return $message;
    }

    public function sendMessage(int $chat_id, string $text): Response
    {
        return $this->messenger->sendMessage($chat_id, $text);
    }
}