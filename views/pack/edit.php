<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;


$this->title = 'Packs';

        $this->title = 'Packs';
        $this->params['breadcrumbs'][] = $this->title;
?>
<div class="pack-index">
<?php if (yii::$app->session->hasFlash('message')) : ?>
    <div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php echo yii::$app->session->getFlash('message'); ?>
</div>
    <?php elseif(yii::$app->session->hasFlash('failed')) :  ?>
      <div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php echo yii::$app->session->getFlash('failed'); ?>
  </div>
  <?php endif; ?>
    <h1>EDIT PACK</h1>
    <h4>Below is the list of available wolves that can be added to the specific pack.</h4>
    <hr>
    <div class="body-content">

        <?php
        $form = ActiveForm::begin() ?>

      
            
<div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">NAME</th>
            <th scope="col">GENDER</th>
            <th scope="col">BIRTH DATE</th>
            <th scope="col">LOCATION</th>
            <th scope="col">ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($model) > 0) :  ?>
            <?php foreach ($model as $wolf) : ?>
              <tr class="table-active">
                <th scope="row"><?php echo $wolf->name ?></th>
                <td><?php echo $wolf->gender ?></td>
                <td><?php echo $wolf->birthdate ?></td>
                <td><?php echo $wolf->location ?></td>

                <td>
                <?= Html::a('Add',['add', 'id' => $wolf->id,'packid' => $packModel->id],['class' => 'btn btn-success']) ?>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td>
                No Wolves Available.
                          </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

        
<hr>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <div class="col-lg-3">
                      
                    <a href=<?php echo Yii::$app->request->referrer ?: Yii::$app->homeUrl; ?> class="btn btn-primary">Cancel</a>
                    </div>
                    <div class="col-lg-2">
                        

                    </div>
                </div>
            </div>
        </div>


        <?php ActiveForm::end() ?>
    </div>

</div>