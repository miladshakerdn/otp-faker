<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>pre{background-color: #eeeeee;padding: 10px;border-radius: 5px; color: #c92121;}</style>
</head>
<body>
List of API, send otp
<ul>
    <li>send otp, <pre>method get, https://your-domin.dev/otp/send/{PHONE-NUMBER}</pre></li>
    <li>show otp, <pre>method get, https://your-domin.dev/otp/show/{PHONE-NUMBER}</pre></li>
    <li>verify otp, <pre>method get, https://your-domin.dev/otp/verify/{PHONE-NUMBER}/{OTP-CODE}</pre></li>
    <li>show all otp, <pre>method get, https://your-domin.dev/otp/all</pre></li>
    <li>delete otp, <pre>method get, https://your-domin.dev/otp/delete/{PHONE-NUMBER}</pre></li>
</ul>
</body>
</html>