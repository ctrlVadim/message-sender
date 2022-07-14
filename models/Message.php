<?php


namespace app\models;


use yii\db\ActiveRecord;

/**
 * Class Message
 * @package app\models
 * @property $id int
 * @property $message string
 */
class Message extends ActiveRecord
{
    public static function tableName()
    {
        return 'message';
    }
}