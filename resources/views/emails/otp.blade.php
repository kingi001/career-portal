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
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 500px;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            border-top: 6px solid #007BFF;
            text-align: center;
        }

        .logo {
            width: 140px;
            height: auto;
            display: block;
            margin: 0 auto 20px;
        }

        h2 {
            color: #2c3e50;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
            margin: 10px 0;
        }

        .otp {
            font-size: 34px;
            font-weight: bold;
            color: #007BFF;
            background: #eaf2ff;
            padding: 16px 28px;
            display: inline-block;
            border-radius: 8px;
            margin: 20px 0;
            letter-spacing: 4px;
        }

        .btn {
            background: #007BFF;
            color: white;
            text-decoration: none;
            padding: 16px 36px;
            border-radius: 8px;
            display: inline-block;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
            text-transform: uppercase;
            box-shadow: 0px 4px 10px rgba(0, 123, 255, 0.3);
        }

        .btn:hover {
            background: #0056b3;
        }

        .footer {
            font-size: 14px;
            color: #777;
            margin-top: 30px;
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
            margin: 30px 0;
        }

        @media (max-width: 600px) {
            .container {
                padding: 30px;
            }

            .otp {
                font-size: 28px;
                padding: 14px 24px;
            }

            .btn {
                font-size: 16px;
                padding: 14px 32px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Company Logo -->
        <img src="cid:logo.png" alt="Bandari Maritime Academy" class="logo">

        <h2>Your One-Time Password (OTP)</h2>

        <p class="otp">{{ $otp }}</p>

        <p>This code is valid for <strong>10 minutes</strong>. Please do not share this code with anyone.</p>

        <a href="{{ route('verify.index') }}" class="btn">Verify Now</a>

        <p>If you did not request this, please ignore this email or contact support.</p>

        <div class="divider"></div>

        <p class="footer">
            Need help? <a href="#">Contact Support</a> | <a href="#">Security Tips</a>
        </p>
        <p class="footer">This is an automated message, please do not reply.</p>
    </div>
</body>

</html>
