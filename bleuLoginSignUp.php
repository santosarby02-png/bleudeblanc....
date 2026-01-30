<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In / Sign Up</title>

    <style>
        /* ===== Page Base ===== */
        body {
            margin: 0;
            padding: 0;
            position: relative;
            min-height: 100vh;
            overflow: hidden;

            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* ===== Background ===== */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('background.JPG');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: grayscale(100%) blur(8px) brightness(0.6);
            z-index: -1;
        }

        /* ===== Login Card ===== */
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.35);
            text-align: center;
            backdrop-filter: blur(6px);
            animation: fadeIn 1s ease;
        }

        /* ===== Title ===== */
        h1 {
            font-size: 2.5em;
            margin-bottom: 30px;
            color: #000;
            letter-spacing: 1px;
        }

        /* ===== Buttons ===== */
        .bleuSignUp,
        .bleuLogIn {
            padding: 15px 40px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            min-width: 160px;
            margin: 10px;
            transition: all 0.3s ease;
        }

        /* Sign Up – White Button */
        .bleuSignUp {
            background: #ffffff;
            color: #000000;
            border: 2px solid #000000;
        }

        .bleuSignUp:hover {
            background: #000000;
            color: #ffffff;
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
        }

        /* Sign In – Black Button */
        .bleuLogIn {
            background: #000000;
            color: #ffffff;
            border: 2px solid #000000;
        }

        .bleuLogIn:hover {
            background: #ffffff;
            color: #000000;
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
        }

        /* ===== Animation ===== */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h1>Welcome to bleu de blanc</h1>

        <!-- Sign Up Button -->
        <a href="bleuRegister.php" target="mid_column">
            <button class="bleuSignUp">Sign Up</button>
        </a>

        <!-- Sign In Button -->
        <a href="bleuLogIn.php" target="mid_column">
            <button class="bleuLogIn">Sign In</button>
        </a>
    </div>

</body>
</html>
