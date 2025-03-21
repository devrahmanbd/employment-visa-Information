<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Electronic Visa - State of Kuwait</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/visa/visa-global.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/visa/visa-style.css') }}" />
    <style>


        .visa-number {
            position: absolute;
            top: 29%;
            left: 68%;
            transform: translate(-50%, -50%);
            font-size: 11px;
        }
        </style>
</head>

<body
    style="background-image: url('{{ asset('images/Main-file.png') }}'); 
             background-repeat: no-repeat; 
             background-size: contain; 
             background-position: top; 
             width: 100%;
             min-height: 100vh;">
    <main class="main-file">
    </main>

    @php
        $visa_number = '1234567890';
    @endphp

    <div class="visa-number">
        <span>{{ $visa_number }}</span>
    </div>
</body>



</html>
