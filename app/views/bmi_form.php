<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حاسبة مؤشر كتلة الجسم</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center">حاسبة مؤشر كتلة الجسم</h3>
                    </div>
                    <div class="card-body">
                        <?php if(isset($error)): ?>
                            <div class="alert alert-danger"><?= $error ?></div>
                        <?php endif; ?>
                        
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="name" class="form-label">الاسم</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="weight" class="form-label">الوزن (كجم)</label>
                                <input type="number" step="0.1" class="form-control" id="weight" name="weight" required>
                            </div>
                            <div class="mb-3">
                                <label for="height" class="form-label">الطول (متر)</label>
                                <input type="number" step="0.01" class="form-control" id="height" name="height" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">حساب</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>