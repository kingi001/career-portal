<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your OTP Code</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 480px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-top: 5px solid #007BFF;
        }

        .logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 0 auto 15px;
            border: 4px solid #007BFF;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
            font-size: 22px;
            font-weight: bold;
        }

        p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
            margin: 10px 0;
        }

        .otp {
            font-size: 30px;
            font-weight: bold;
            color: #2c3e50;
            background: #ecf0f1;
            padding: 14px;
            display: inline-block;
            border-radius: 6px;
            margin: 20px 0;
            letter-spacing: 3px;
        }

        .btn {
            background: linear-gradient(135deg, #007BFF 0%, #0056b3 100%);
            color: white;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 6px;
            display: inline-block;
            margin-top: 20px;
            font-size: 17px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn:hover {
            background: linear-gradient(135deg, #0056b3 0%, #003d80 100%);
        }

        .footer {
            font-size: 13px;
            color: #777;
            margin-top: 25px;
        }

        .footer a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .divider {
            height: 1px;
            background: #ddd;
            margin: 25px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Company Logo -->
        <img src="cid:logo.png" alt="Bandari Maritime Academy" class="logo">
        <h2>Your One-Time Password (OTP)</h2>

        @php
            use Illuminate\Support\Str;
        @endphp

        <p>Hello <i class="fa-solid fa-user-tag"></i> <strong>{{ Str::before(Auth::user()->name, ' ') }}</strong>,</p>

        <p class="otp">{{ $otp }}</p>

        <p>This code is valid for <strong>10 minutes</strong>. Do not share this code with anyone.</p>

        <a href="{{ route('otp.verify') }}" class="btn">Verify Now</a>

        <p>If you did not request this, please ignore this email or contact support.</p>

        <div class="divider"></div>

        <p class="footer">
            Need help? <a href="#">Contact Support</a> | <a href="#">Security Tips</a>
        </p>
        <p class="footer">This is an automated message, please do not reply.</p>
    </div>
</body>

</html>
