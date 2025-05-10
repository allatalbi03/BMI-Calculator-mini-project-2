<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نتيجة مؤشر كتلة الجسم</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h3 class="text-center">نتيجة مؤشر كتلة الجسم</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-<?= 
                            $result['status'] == 'نحافة' ? 'warning' : 
                            ($result['status'] == 'وزن طبيعي' ? 'success' : 
                            ($result['status'] == 'زيادة وزن' ? 'info' : 'danger'))
                        ?>">
                            <h4 class="alert-heading"><?= $result['name'] ?></h4>
                            <p>الوزن: <?= $result['weight'] ?> كجم</p>
                            <p>الطول: <?= $result['height'] ?> م</p>
                            <hr>
                            <p class="mb-0">مؤشر كتلة الجسم: <strong><?= $result['bmi'] ?></strong></p>
                            <p class="mb-0">الحالة: <strong><?= $result['status'] ?></strong></p>
                        </div>
                        
                        <a href="" class="btn btn-secondary w-100">حساب جديد</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<div class="card mt-4">
    <div class="card-header">
        <h4>سجل القياسات</h4>
    </div>
    <div class="card-body">
        <canvas id="bmiChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('bmiChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?= json_encode(array_column($history, 'timestamp')) ?>,
            datasets: [{
                label: 'مؤشر كتلة الجسم',
                data: <?= json_encode(array_column($history, 'bmi')) ?>,
                borderColor: '#4361ee',
                tension: 0.1
            }]
        }
    });
</script>