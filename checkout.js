document.addEventListener('DOMContentLoaded', () => {
    const onlineRadio = document.getElementById('online');
    const cashRadio = document.getElementById('on_delivery');
    const cardInfo = document.getElementById('card-info');

    // إظهار وإخفاء معلومات البطاقة
    onlineRadio.addEventListener('change', () => {
        if(onlineRadio.checked) cardInfo.style.display = 'block';
    });

    cashRadio.addEventListener('change', () => {
        if(cashRadio.checked) cardInfo.style.display = 'none';
    });
});

// وظيفة تأكيد الطلب (Simulation) كما في ملف المشروع
function processPayment() {
    const isOnline = document.getElementById('online').checked;
    
    if(isOnline) {
        alert("Connexion au serveur sécurisé CIB/PayPal...");
        setTimeout(() => {
            alert("Paiement réussi ! Votre commande est validée [Simulation].");
            window.location.href = "home.html"; // يرجع للرئيسية
        }, 2000);
    } else {
        alert("Commande validée ! Paiement à la réception.");
        window.location.href = "home.html";
    }
}