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
    <h1>EDIT WOLF</h1>
    
    <div class="body-content">
        <hr>
        <h3>Details</h3>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $wolf->name; ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $wolf->gender; ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $wolf->birthdate; ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $wolf->location; ?>
            </li>
        </ul>
        <hr>
        <h3>Edit Fields</h3>
        <?php
            $form = ActiveForm::begin() ?>
        <div class="form-group">
           

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <?= $form->field($wolf, 'name'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <?= $form->field($wolf, 'gender'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group ">
                    <div class="col-lg-6">
                        <?= $form->field($wolf, 'birthdate')->widget(DatePicker::class, ['options' => ['placeholder' => 'Select date'], 
                'clientOptions' => ['dateFormat' => 'yyyy-mm-dd']]); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-lg-6">
                        <?= $form->field($wolf, 'location'); ?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <div class="col-lg-3">
                        <?= Html::submitButton('Edit Wolf', ['class' => 'btn btn-success']) ?>

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