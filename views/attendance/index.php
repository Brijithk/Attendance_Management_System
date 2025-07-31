<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Student; // adjust this if your Student model namespace is different

$students = Student::find()->all();
?>

<h2>Mark Attendance</h2>

<?php $form = ActiveForm::begin(); ?>

<div class="form-group">
    <?= $form->field($model, 'student_id')->dropDownList(
        ArrayHelper::map($students, 'id', 'name'),
        ['prompt' => 'Select a student']
    ) ?>
</div>

<div class="form-group">
    <?= $form->field($model, 'date')->input('date') ?>
</div>

<div class="form-group">
    <?= $form->field($model, 'status')->dropDownList([
        'Present' => 'Present',
        'Absent' => 'Absent'
    ], ['prompt' => 'Select status']) ?>
</div>

<div class="form-group">
    <?= Html::submitButton('Save Attendance', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
<h2>Attendance Summary</h2>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Total Days Present</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($attendanceSummary as $record): ?>
            <tr>
                <td><?= htmlspecialchars($record['student_name']) ?></td>
                <td><?= $record['total_present'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
