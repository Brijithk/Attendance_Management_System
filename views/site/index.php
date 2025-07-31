<?php

use yii\helpers\Html;

$this->title = 'Dashboard';
?>
<div class="site-index">
  

  <div class="row mt-0">
    <div class="col-md-4">
      <div class="card bg-primary text-white">
        <div class="card-body">
          <h4>Total Students</h4>
          <p style="font-size: 28px;"><?= $studentCount ?></p> <!-- Replace with dynamic count -->
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-success text-white">
        <div class="card-body">
          <h4>Total Attendance Records</h4>
          <p style="font-size: 28px;"><?= $attendanceCount ?></p> <!-- Replace with dynamic count -->
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-warning text-dark">
        <div class="card-body">
          <h4>Today's Attendance</h4>
          <p style="font-size: 28px;"><?= $todayAttendance ?></p> <!-- Replace with dynamic count -->
        </div>
      </div>
    </div>
  </div>


  <?php
$this->registerJsFile('https://cdn.jsdelivr.net/npm/chart.js', ['position' => \yii\web\View::POS_END]);
?>
<div class="row mt-1">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header bg-dark text-white">📊 Attendance Trend (Last 7 Days)</div>
      <div class="card-body">
        <canvas id="attendanceChart" height="100"></canvas>
      </div>
    </div>
  </div>
</div>

</div>
<?php
$labels = json_encode($chartLabels);
$data = json_encode($chartData);


$js = <<<JS
const ctx = document.getElementById('attendanceChart').getContext('2d');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: $labels,
    datasets: [{
      label: 'Attendance Count',
      data: $data,
      backgroundColor: 'rgba(54, 162, 235, 0.7)',
      borderColor: 'rgba(54, 162, 235, 1)',
      borderWidth: 2
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
JS;

$this->registerJs($js);
?>
