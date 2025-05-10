<?php
require __DIR__.'/../config/database.php';
require __DIR__.'/../app/models/BmiModel.php';
require __DIR__.'/../app/controllers/BmiController.php';

// إنشاء اتصال بقاعدة البيانات
$database = new Database();
$db = $database->getConnection();

// إنشاء النموذج والمتحكم
$model = new BmiModel($db);
$controller = new BmiController($model);

// معالجة الطلب
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // في الواقع العملي، user_id يجب أن يأتي من نظام المصادقة
    $user_id = 1; // افتراضي للاختبار
    
    $result = $controller->calculateBmi(
        $user_id,
        $_POST['name'],
        $_POST['weight'],
        $_POST['height']
    );
    
    if(isset($result['error'])) {
        $error = $result['error'];
        include __DIR__.'/../app/views/bmi_form.php';
    } else {
        include __DIR__.'/../app/views/bmi_result.php';
    }
} else {
    include __DIR__.'/../app/views/bmi_form.php';
}
?>