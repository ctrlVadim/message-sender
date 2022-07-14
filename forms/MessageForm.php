<?php

namespace app\forms;


use yii\base\Model;

class MessageForm extends Model
{
    public $message;

    public function rules()
    {
        return [
            [['message'], 'string'],
            [['message'], 'required']
        ];
    }

}