<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'All Students';
?>
<div class="site-index">
  <h1>All Students</h1>

  <p>
      <?= Html::a('➕ Add New Student', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

 <?= Html::beginForm(['index'], 'get') ?>
<div class="form-row">
  <div class="form-group col-md-3">
    <?= Html::textInput('name', Yii::$app->request->get('name'), ['class' => 'form-control', 'placeholder' => 'Filter by Name']) ?>
  </div>
  <div class="form-group col-md-3">
    <?= Html::textInput('roll', Yii::$app->request->get('roll'), ['class' => 'form-control', 'placeholder' => 'Filter by Roll Number']) ?>
  </div>
  <div class="form-group col-md-2">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
  </div>
</div>
<?= Html::endForm() ?>

<div class="site-index">
  

  <table class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Roll Number</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($students as $index => $student): ?>
        <tr>
          <td><?= $index + 1 ?></td>
          <td><?= Html::encode($student->name) ?></td>
          <td><?= Html::encode($student->roll_number) ?></td>
          <td><?= Html::encode($student->email) ?></td>
          <td>
            <?= Html::a('View', ['view', 'id' => $student->id], ['class' => 'btn btn-info btn-sm']) ?>
            <?= Html::a('Edit', ['update', 'id' => $student->id], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $student->id], [
              'class' => 'btn btn-danger btn-sm',
              'data' => ['confirm' => 'Are you sure?', 'method' => 'post']
            ]) ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
