<?php

namespace app\useCases;

use app\forms\MessageForm;
use app\models\Message;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Telegram;

class MessageService
{
    public function store(MessageForm $form) : Message
    {
        $message = new Message();
        $message->message = $form->message;
        $message->save();

        return $message;
    }

    public function sendMessage($data) : ServerResponse
    {
        $telegram = new Telegram('5468953526:AAGGvDaOloYQKcwkT3iQiZTwIZln05a3SPs', 'inspectrum_clinic_bot');

        return Request::sendMessage($data);
    }
}