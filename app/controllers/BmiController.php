<?php
class BmiController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function calculateBmi($user_id, $name, $weight, $height) {
        // التحقق من صحة المدخلات
        if(empty($name) || empty($weight) || empty($height)) {
            return ['error' => 'جميع الحقول مطلوبة'];
        }

        if(!is_numeric($weight) || $weight <= 0) {
            return ['error' => 'يجب أن يكون الوزن رقمًا موجبًا'];
        }

        if(!is_numeric($height) || $height <= 0) {
            return ['error' => 'يجب أن يكون الطول رقمًا موجبًا'];
        }

        // حساب BMI
        $bmi = $weight / ($height * $height);
        $bmi = round($bmi, 2);

        // تحديد حالة BMI
        if($bmi < 18.5) {
            $status = 'نحافة';
        } elseif($bmi < 25) {
            $status = 'وزن طبيعي';
        } elseif($bmi < 30) {
            $status = 'زيادة وزن';
        } else {
            $status = 'سمنة';
        }

        // حفظ النتيجة
        $this->model->saveBmiRecord($user_id, $name, $weight, $height, $bmi, $status);

        return [
            'name' => $name,
            'weight' => $weight,
            'height' => $height,
            'bmi' => $bmi,
            'status' => $status
        ];
    }

    public function getHistory($user_id) {
        return $this->model->getBmiHistory($user_id);
    }
}
?>