<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bakong Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 4 -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- QRCode -->
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        body {
            background: #fff;
            font-family: Arial, sans-serif;
        }

        .payment-wrapper {
            max-width: 420px;
            margin: 40px auto;
            border: 2px solid #e53935;
            border-radius: 16px;
            padding: 30px 20px 40px;
            position: relative;
        }

        .bakong-header {
            text-align: center;
            margin-bottom: 15px;
        }

        .bakong-header h4 {
            margin: 10px 0 0;
            font-weight: bold;
            color: #e53935;
        }

        .scan-text {
            text-align: center;
            color: #444;
            margin-bottom: 20px;
        }

        #timer {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #e53935;
            margin-bottom: 15px;
        }

        .qr-frame {
            width: 300px;
            height: 300px;
            margin: 0 auto 20px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .amount {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-top: 15px;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
            color: #888;
        }

        .expired {
            color: red;
            font-weight: bold;
            text-align: center;
        }

        .bakong-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .khqr-logo {
            max-width: 160px;
            height: auto;
            margin-bottom: 10px;
        }

        .scan-text {
            font-size: 16px;
            color: #333;
        }

    </style>
</head>

<body>

<div class="payment-wrapper">

    <!-- Header -->
    <div class="bakong-header">
        <img src="{{ asset('image/KHQR_Logo.png') }}" alt="KHQR Logo" class="khqr-logo">
        <div class="scan-text">Scan. Pay. Done.</div>
    </div>


    <!-- Timer -->
    <div id="timer">05:00</div>

    <!-- QR -->
    <div class="qr-frame">
        <div id="qrcode"></div>
    </div>

    <!-- Merchant -->
    <div class="text-center font-weight-bold">
        CHOEURN PINCHAI
    </div>

    <!-- Amount -->
    <div class="amount">
        Amount: ${{ $price }}
    </div>

    <input type="hidden" name="md5" value="{{ $qrData['md5'] }}">

    <!-- Footer -->
    <div class="footer">
        Member of KHQR
    </div>

</div>

<script>
    const qrDiv = document.getElementById("qrcode");

    new QRCode(qrDiv, {
        text: "{{ $qrData['qr'] }}",
        width: 260,
        height: 260
    });

    let time = 300;

    const timerInterval = setInterval(() => {
        let m = Math.floor(time / 60);
        let s = time % 60;

        document.getElementById("timer").innerText =
            `${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;

        if (time <= 0) {
            clearInterval(timerInterval);
            document.getElementById("timer").innerText = "EXPIRED";
            qrDiv.innerHTML = "<div class='expired'>QR Code Expired</div>";
            return;
        }

        time--;
    }, 1000);


    const checkPaymentStatus = setInterval(() => {
        let url = "{{ url('/check-transaction-status') }}?md5={{ $qrData['md5'] }}";
        axios.get(url)
            .then(function (response) {
                // handle success
                if (response.data.data == null) {
                    console.log('waiting for payment...');
                }else {
                    clearInterval(checkPaymentStatus);
                    window.location.href = "{{ url('/customer-thank') }}";
                }
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
    }, 3000);
</script>

</body>
</html>
