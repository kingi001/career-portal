<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your OTP Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 480px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #333;
        }
        p {
            color: #666;
            font-size: 16px;
            line-height: 1.5;
        }
        .otp {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            background: #ecf0f1;
            padding: 10px;
            display: inline-block;
            border-radius: 5px;
            margin: 10px 0;
        }
        .footer {
            font-size: 12px;
            color: #999;
            margin-top: 20px;
        }
        .btn {
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Your One-Time Password (OTP)</h2>
        <p>Hello,</p>
        <p>Your OTP code for verification is:</p>
        <p class="otp">{{ $otp }}</p>
        <p>This code is valid for <strong>10 minutes</strong>. Do not share this code with anyone.</p>
        <a href="{{ route('otp.verify') }}" class="btn">Verify Now</a>
        <p>If you did not request this, please ignore this email.</p>
        <p class="footer">This is an automated message, please do not reply.</p>
    </div>
</body>
</html>
