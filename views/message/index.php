<div class="container">
    <?php

    use yii\widgets\ActiveForm;

    $form = ActiveForm::begin([
        'action' => 'message',
        'method' => 'post'
    ])
    ?>

    <?= $form->field($model, 'message')->textInput()->label('Message') ?>

    <button class="btn btn-success" type="submit">Send</button>

    <?php ActiveForm::end() ?>
</div>



