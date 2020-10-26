<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;


$this->title = 'Wolfpack';
/*<tbody>
          <?php if (count($packs) > 0) :  ?>
            <?php foreach ($packs as $pack) : ?>
              <tr class="table-active">
                <th scope="row"><?php echo $pack->name ?></th>
                <td><?php echo $pack->gender ?></td>
                <td><?php echo $pack->birthdate ?></td>
                <td><?php echo $pack->location ?></td>

                <td>
                  <span><?= Html::a('Edit', ['edit', 'id' => $pack->pack_id], ['class' => 'label label-primary']) ?></span>

                  <span><?= Html::a('Delete', ['delete', 'id' => $pack->pack_id], ['class' => 'label label-danger']) ?></span>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td>
                No Wolves Found in this pack.
                          </td>
            </tr>
          <?php endif; ?>
        </tbody> */
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
    <h1>VIEW PACK</h1>
    <h4>Here you can see the list of wolves within this pack. And you can also add more wolves or remove them.</h4>
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
          <?php if (count($models->wolves) > 0) :  ?>
            <?php foreach ($models->wolves as $wolf) : ?>
              <tr class="table-active">
                <th scope="row"><?php echo $wolf->name ?></th>
                <td><?php echo $wolf->gender ?></td>
                <td><?php echo $wolf->birthdate ?></td>
                <td><?php echo $wolf->location ?></td>

                <td>
                  <span><?= Html::a('Delete', ['del', 'id' => $wolf->id], ['class' => 'label label-danger']) ?></span>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td>
                No Wolves Found in this pack.
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
                        <?= Html::a('Add Wolf to Pack',['pack/edit', 'id' => $models->id],['class' => 'btn btn-success']) ?>

                    </div>
                    <div class="col-lg-2">
                        <a href=<?php echo Yii::$app->homeUrl ?> class="btn btn-primary">Cancel</a>

                    </div>
                </div>
            </div>
        </div>


        <?php ActiveForm::end() ?>
    </div>

</div>