<?php


namespace app\controllers;


use app\forms\MessageForm;
use app\useCases\MessageService;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

class MessageController extends Controller
{
    public MessageService $service;

    public function __construct($id, $module, MessageService $service, $config = [])
    {
        $this->service = $service;

        parent::__construct($id, $module, $config);
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class'=> VerbFilter::class,
                'actions' => [
                    'index' => ['GET'],
                    'message' => ['POST']
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $model = new MessageForm();

        return $this->render('index', compact('model'));
    }

    public function actionMessage()
    {
        $data = Yii::$app->request->post();
        $form = new MessageForm();
        $form->load($data);

        if ($form->validate())
        {
            $message = $this->service->store($form);
            $response = $this->service->sendMessage([
                'chat_id' => 1897849402,
                'text' => $message->message
            ]);

            if ($response->isOk())
            {
                Yii::$app->session->setFlash('success', 'Message successfully sent');
            } else
            {
                Yii::$app->session->setFlash('danger', $response->getRawData()['description']);
            }
        } else
        {
            Yii::$app->session->setFlash('danger', 'Given data is not valid');
        }

        return $this->redirect(Yii::$app->request->referrer);
    }
}