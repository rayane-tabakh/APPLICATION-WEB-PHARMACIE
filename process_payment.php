<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // نأخذ معرف المستخدم (للتجربة سنضعه 1، وفي الحقيقة يأتي من الـ Session)
    $user_id = 1; 
    $total = 1500.00; // مبلغ تجريبي
    $payment_method = $_POST['pay_method']; // 'online' أو 'cash'

    // 1. إدخال الطلب في جدول orders
    $sql_order = "INSERT INTO orders (user_id, total, statut_commande) VALUES ('$user_id', '$total', 'en attente')";
    
    if ($conn->query($sql_order) === TRUE) {
        $order_id = $conn->insert_id; // الحصول على رقم الطلب الذي تم إنشاؤه

        // 2. إدخال معلومات الدفع في جدول payments
        $type_p = ($payment_method == 'online') ? 'en ligne' : 'sur place';
        $statut_p = ($payment_method == 'online') ? 'payé' : 'non payé';

        $sql_payment = "INSERT INTO payments (order_id, type_paiement, statut_paiement, date_paiement) 
                        VALUES ('$order_id', '$type_p', '$statut_p', NOW())";

        if ($conn->query($sql_payment) === TRUE) {
            echo "<div style='color: #00f2ff; background: #0c1a2c; padding: 20px; border-radius: 10px; border: 2px solid #00f2ff; font-family: sans-serif; text-align: center;'>";
            echo "<h2>✅ تمت العملية بنجاح!</h2>";
            echo "<p>رقم طلبك هو: #$order_id</p>";
            if ($payment_method == 'online') {
                echo "<p>[محاكاة] تم التحقق من بطاقة CIB/PayPal بنجاح.</p>";
            }
            echo "<p>سيتم توجيهك للرئيسية بعد قليل...</p>";
            echo "</div>";
            header("refresh:4;url=home.html");
        }
    } else {
        echo "خطأ: " . $conn->error;
    }
}
?>