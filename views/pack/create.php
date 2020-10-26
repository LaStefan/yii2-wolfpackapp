<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;



$this->title = 'Packs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pack-index">
    <h1>ADD PACK</h1>
    <hr>
    <div class="body-content">
        <?php
        $form = ActiveForm::begin() ?>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($pack, 'pack_name')->input('pack_name', ['placeholder' => "Enter name"]); ?>
                </div>
            </div>
        </div>
       
      <hr>
   
    <div class="row">
        <div class="form-group">
            <div class="col-lg-6">
                <div class="col-lg-3">
                    <?= Html::submitButton('Add Pack', ['class' => 'btn btn-success']) ?>

                </div>
                <div class="col-lg-2">
                    <a href=<?php echo Yii::$app->request->referrer ?: Yii::$app->homeUrl; ?> class="btn btn-primary">Cancel</a>

                </div>
            </div>
        </div>
    </div>



    <?php ActiveForm::end() ?>


    </div>
  
</div>
</div>