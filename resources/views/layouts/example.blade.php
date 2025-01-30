<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        .id-card {
            width: 300px;
            height: 500px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            padding: 20px;
            text-align: center;
            border: 2px solid black;
        }

        .photo {
            width: 150px;
            height: 150px;
            border-radius: 8px;
            /* Slight rounding for a soft square effect */
            margin: 15px 73px 15px;
            border: 2px solid black;

        }

        .name {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin: 15px auto;
        }

        .designation {
            font-size: 14px;
            color: black;
            margin: 10px auto;

        }

        .ir-id {
            font-size: 16px;
            font-weight: bold;
            color: #007BFF;
            margin-top: 20px;
        }

        .border-line {
            border-top: 2px solid #007BFF;
            margin: 10px 0;
        }

        .logo1 {
            margin-top: 35px;
        }
    </style>
</head>

<body>

    <div class="id-card">
        <div class="logo1">
            <img src="/dist/img/logo1.jpg" height="60" width="60" alt="">
        </div>
        <div class="logo">
            <img src="/dist/img/netambit.jpg" width="200" height="45" alt="Logo">
        </div>
        <div class="photo">
            <!-- Insert photo here -->
            <img src="/dist/img/dora.png" width="150" height="150" alt="">
        </div>
        <div class="name">Doraemon</div>
        <div class="designation"><b>Software Engineer</b></div>
        .client
        <div class="border-line"></div>
        <div class="ir-id">IR-123456789</div>
    </div>
</body>

</html>