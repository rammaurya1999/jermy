<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Mail</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <style>
        .outer-div {
            max-width: 680px;
            margin: 0 auto;
            padding: 45px 30px 60px;
            background: #f4f7ff;
            background-image: url(https://archisketch-resources.s3.ap-northeast-2.amazonaws.com/vrstyler/1661497957196_595865/email-template-background-banner);
            background-repeat: no-repeat;
            background-size: 800px 452px;
            background-position: top center;
            font-size: 14px;
            color: #434343;
        }

        .otp {
            margin: 0;
            margin-top: 60px;
            font-size: 40px;
            font-weight: 600;
            letter-spacing: 25px;
            color: #ba3d4f;
        }

        @media(max-width:768px) {
            .outer-div {
                width: auto;
            }

            .otp {
                font-size: 30px;
                letter-spacing: 20px;
            }
        }
    </style>
</head>

<body
    style="
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #ffffff;
      font-size: 14px;
    ">
    <div class="outer-div">
        <header>
            <table style="width: 100%;">
                <tbody>
                    <tr style="height: 0;">
                        <td>
                            @if (isset($settingImg))
                                <img alt=""
                                    src="https://www.smartfarm.ag/wp-content/themes/smartfarm/img/logo.png"
                                    height="30px" />
                            @endif
                        </td>
                        <td style="text-align: right;">
                            <span style="font-size: 16px; line-height: 30px; color: #ffffff;">{{ date('Y-m-d') }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </header>

        <main>
            <div
                style="
            margin: 0;
            margin-top: 70px;
            padding: 92px 30px 115px;
            background: #ffffff;
            border-radius: 30px;
            text-align: center;
          ">
                <div style="width: 100%; max-width: 489px; margin: 0 auto;">
                    <h1
                        style="
                margin: 0;
                font-size: 24px;
                font-weight: 500;
                color: #1f1f1f;
              ">
                        Your OTP
                    </h1>
                    <p
                        style="
                margin: 0;
                margin-top: 17px;
                font-size: 16px;
                font-weight: 500;
              ">
                        @if (isset($name))
                            {{ $name }}
                        @endif
                    </p>
                    <p
                        style="
                margin: 0;
                margin-top: 17px;
                font-weight: 500;
                letter-spacing: 0.56px;
              ">
                        @if (isset($msg))
                            {{ $msg }}
                        @endif

                    </p>
                    <p class="otp">
                        @if (isset($otp))
                            {{ $otp }}
                        @endif
                    </p>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
