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
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .logo {
            width: 100px;
            /* Adjust size as needed */
            height: 100px;
            /* Maintain circular shape */
            border-radius: 50%;
            /* Makes it a perfect circle */
            object-fit: cover;
            /* Ensures image fills the circular frame */
            display: block;
            margin: 0 auto 15px;
            /* Centers the logo */
            border: 3px solid #007BFF;
            /* Optional: Add border */
        }


        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            font-size: 16px;
            line-height: 1.5;
            margin: 8px 0;
        }

        .otp {
            font-size: 28px;
            font-weight: bold;
            color: #2c3e50;
            background: #ecf0f1;
            padding: 12px;
            display: inline-block;
            border-radius: 5px;
            margin: 15px 0;
            letter-spacing: 2px;
        }

        .btn {
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 15px;
            font-size: 16px;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .footer {
            font-size: 12px;
            color: #999;
            margin-top: 20px;
        }

        .footer a {
            color: #007BFF;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .divider {
            height: 1px;
            background: #ddd;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">

        <!-- Company Logo -->
        <img src="cid:logo.png" alt="Bandari Maritime Academy" class="logo">
        <h2>Your One-Time Password (OTP)</h2>
        <p>Hello,</p>
        <p>Your OTP code for verification is:</p>

        <p class="otp">{{ $otp }}</p>

        <p>This code is valid for <strong>10 minutes</strong>. Do not share this code with anyone.</p>

        <a href="{{ route('otp.verify') }}" class="btn">Verify Now</a>

        <p>If you did not request this, please ignore this email or contact support.</p>

        <div class="divider"></div>

        <p class="footer">
            Need help? <a href="#">Contact Support</a> |
            <a href="#">Security Tips</a>
        </p>
        <p class="footer">This is an automated message, please do not reply.</p>
    </div>
</body>

</html>
