<?php

use yii\helpers\html;

/* @var $this yii\web\View */

$this->title = 'Wolfpack';

//button to add wolf, test
//<p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Add Wolf</a></p>
?>
<div class="site-index">
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
  

  <div class="jumbotron">
    <h1>Welcome to Wolfpack</h1>
    <hr>


  </div>
  <div class="row">
    <span style="margin-bottom: 20px"><?= Html::a('ADD WOLF', ['/site/create'], ['class' => 'btn btn-success']) ?></span>
  </div>
  <div class="body-content">
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
          <?php if (count($wolves) > 0) :  ?>
            <?php foreach ($wolves as $wolf) : ?>
              <tr class="table-active">
                <th scope="row"><?php echo $wolf->name ?></th>
                <td><?php echo $wolf->gender ?></td>
                <td><?php echo $wolf->birthdate ?></td>
                <td><?php echo $wolf->location ?></td>

                <td>
                  <span><?= Html::a('Edit', ['edit', 'id' => $wolf->id], ['class' => 'label label-primary']) ?></span>

                  <span><?= Html::a('Delete', ['delete', 'id' => $wolf->id], ['class' => 'label label-danger']) ?></span>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td>
                No Wolves Found
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>