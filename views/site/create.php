<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
/* <?= $form->field($wolf, 'birthdate')->widget(DatePicker::className(), ['clientOptions' => ['dateFormat' => 'yy-mm-dd']]); ?>*/
/* @var $this yii\web\View */


$this->title = 'Wolfpack';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <h1>ADD WOLF</h1>
    <hr>
    <div class="body-content">
        <?php
        $form = ActiveForm::begin() ?>

        <div class="row">
            <div class="form-group" autofocus aria-required="true">
                <div class="col-lg-6">
                    <?= $form->field($wolf, 'name')->input('name', ['placeholder' => "Enter name"]); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">

                <div class="col-lg-6">
                <?= $form->field($wolf, 'gender')->input('gender', ['placeholder' => "Enter gender"]); ?>

                    </select>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="form-group ">
            <div class="col-lg-6">
                <?= $form->field($wolf, 'birthdate')->widget(
                    DatePicker::class,
                    [
                        'options' => ['placeholder' => 'Select date'],
                        'clientOptions' => ['dateFormat' => 'yyyy-mm-dd']
                    ]
                ); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-lg-6">
                <?= $form->field($wolf, 'location')->input('location', ['placeholder' => "Enter location"]); ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group">
            <div class="col-lg-6">
                <div class="col-lg-3">
                    <?= Html::submitButton('Add Wolf', ['class' => 'btn btn-success']) ?>

                </div>
                <div class="col-lg-2">
                    <a href=<?php echo yii::$app->homeUrl; ?> class="btn btn-primary">Cancel</a>

                </div>
            </div>
        </div>
    </div>



    <?php ActiveForm::end() ?>


    </div>
  
</div>
</div>