<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        /* ตั้งค่าพื้นฐาน */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 2px solid #ddd;
        }

        .email-header h1 {
            font-size: 24px;
            margin: 0;
            background: linear-gradient(to right, #051937, #004D7A, #008793, #00BF72, #ABEB12);
            background-clip: text;
            color: transparent;
        }


        .email-content {
            padding: 20px;
            font-size: 16px;
            color: #333;
            line-height: 1.6;
        }

        .email-content p {
            margin: 0 0 10px;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        a {
            color: #ffffff !important;
        }

        .btn {
            background: linear-gradient(90deg, #004D7A, #008793, #00BF72);
            padding: 12px 24px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            color: white;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn:hover {
            filter: brightness(0.9);
        }

        .email-footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            padding: 10px 0;
            border-top: 1px solid #ddd;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="email-container">

        <div class="email-header">
            <h1>Change Your Password</h1>
        </div>


        <div class="email-content">
            <p>Hello,</p>
            <p>We have received a request to reset your password. If you would like to change your password, please
                click the button below:</p>

            <div class="button-container">
                <a href="{{route('admin.change.password', ['token' => $token])}}" class="btn">Change Password</a>
            </div>

            <p>If you did not make this request, please ignore this email.</p>
        </div>

    </div>
</body>

</html>
