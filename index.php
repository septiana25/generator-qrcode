<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">

<head>
    <title>QRCode Generator</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="qrcode.js"></script>
    <style>
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 20px;
            color: #333333;
            background-color: #ffffff;
            padding: 0;
        }

        .qrHead {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #text {
            display: none;
        }
    </style>
</head>

<?php
$value = isset($_GET['value']) && !empty($_GET['value']) ? $_GET['value'] : 'Generate QR Code Gagal, Silahkan Coba Lagi';
?>

<body>
    <input id="text" type="text" value="<?= $value ?>" style="width:100%" /><br />
    <div class="qrHead">
        <div id="qrcode2"></div>
        <div id="qrcode"></div>
    </div>

    <script type="text/javascript">
        // Create a new QRCode object
        const qrcode = new QRCode(document.getElementById("qrcode"), {
            width: 400,
            height: 400
        });

        // Function to generate QR code
        function makeCode() {
            let elText = document.getElementById("text");
            let title = document.getElementById("qrcode2");

            // Set the title to the input text
            title.innerHTML = `<h1>${elText.value}</h1>`;

            // Check if the input text is empty
            if (!elText.value) {
                alert("Input a text");
                elText.focus();
                return;
            }

            // Generate the QR code
            qrcode.makeCode(elText.value);
        }

        // Call the function initially
        makeCode();

        // Add event listeners to the text input
        document.getElementById("text").addEventListener("blur", makeCode);
        document.getElementById("text").addEventListener("keydown", function(e) {
            // Check if the key pressed was 'Enter'
            if (e.keyCode === 13) {
                makeCode();
            }
        });
    </script>
</body>