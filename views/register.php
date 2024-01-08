<h1>
    Регистрация
</h1>
<?php $form = \app\core\form\Form::begin('', 'POST') ?>
    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'firstName') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'lastName') ?>
        </div>
    </div>
    <?php echo $form->field($model, 'login') ?>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <?php echo $form->field($model, 'password_confirm')->passwordField() ?>
<button type="submit">Отправить</button>
<?php \app\core\form\Form::end() ?>
