<!-- resources/views/emails/contact.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>رسالة تواصل جديدة</title>
</head>
<body>
    <h2>تفاصيل الرسالة:</h2>
    <p><strong>الاسم:</strong> {{ $data['name'] }}</p>
    <p><strong>البريد:</strong> {{ $data['email'] }}</p>
    <p><strong>الرسالة:</strong> {{ $data['message'] }}</p>
</body>
</html>