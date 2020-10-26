<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

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
    <h1><?= Html::encode($this->title) ?></h1>
    <h5>Here you can add packs, and you can press view and see wolves within specific pack.</h5>
<hr>
   
   
  
  <div class="body-content">
    <div class="row">
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">PACK NAME</th>
           
           
          </tr>
        </thead>
        <tbody>
          <?php if (count($packs) > 0) :  ?>
            <?php foreach ($packs as $pack) : ?>
              <tr class="table-active">
                <th scope="row"><?php echo $pack->id ?></th>
                <td><?php echo $pack->pack_name ?></td>
                

                <td>
                  <span><?= Html::a('View', ['pack/view', 'id' => $pack->id], ['class' => 'label label-primary']) ?></span>

                  <span><?= Html::a('Delete', ['pack/delete', 'id' => $pack->id], ['class' => 'label label-danger']) ?></span>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td>
                No Packs Found
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <hr>
    <div class="row">
    <span style="margin-bottom: 20px"><?= Html::a('ADD PACK', ['/pack/create'], ['class' => 'btn btn-success']) ?></span>
  </div>
  </div>
    
</div>
