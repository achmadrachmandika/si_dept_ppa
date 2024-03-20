<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <style>

body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 50vh;
        margin: 0;
        background-color: #ffffff;
    }

.container{

    display: flex;
        justify-content: space-evenly;
        flex-direction: column;
        align-items: center;
        min-height: 50vh;
        background-color: #f0f0f0;
    }
        .plan {
  border-radius: 16px;
  box-shadow: 0 30px 30px -25px rgba(0, 38, 255, 0.205);
  padding: 10px;
  background-color: #fff;
  color: #697e91;
  max-width: 500px;
  font-family: 'Trebuchet MS', sans-serif;
  align-content: center;
}

.plan strong {
  font-weight: 600;
  color: #425275;
}

.plan .inner {
  align-items: center;
  padding: 20px;
  padding-top: 40px;
  background-color: #ecf0ff;
  border-radius: 12px;
  position: relative;
}

.plan .pricing {
  position: absolute;
  top: 0;
  right: 0;
  background-color: #bed6fb;
  border-radius: 99em 0 0 99em;
  display: flex;
  align-items: center;
  padding: 0.625em 0.75em;
  font-size: 1.25rem;
  font-weight: 600;
  color: #425475;
}

.plan .pricing small {
  color: #707a91;
  font-size: 0.75em;
  margin-left: 0.25em;
}

.plan .title {
  font-weight: 600;
  font-size: 1.25rem;
  color: #425675;
}

.plan .title + * {
  margin-top: 0.75rem;
}

.plan .info + * {
  margin-top: 1rem;
}

.plan .features {
  display: flex;
  flex-direction: column;
}

.plan .features li {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.plan .features li + * {
  margin-top: 0.75rem;
}

.plan .features .icon {
  background-color: #1FCAC5;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  border-radius: 50%;
  width: 20px;
  height: 20px;
}

.plan .features .icon svg {
  width: 14px;
  height: 14px;
}

.plan .features + * {
  margin-top: 1.25rem;
}

.plan .action {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: end;
}

.plan .button {
  background-color: #6558d3;
  border-radius: 6px;
  color: #fff;
  font-weight: 500;
  font-size: 1.125rem;
  text-align: center;
  border: 0;
  outline: 0;
  width: 100%;
  padding: 0.625em 0.75em;
  text-decoration: none;
}

.plan .button:hover, .plan .button:focus {
  background-color: #4133B7;
}
    </style>
</head>
<body>
        <div class="plan">
            <div class="inner">
                <span class="pricing">
                    <span>
                      No. SPR : {{$noSprUser}}
                    </span>
                </span>
                <p class="title">Halo {{$name}}</p>
                <p class="info">Nomor SPR Berhasil Dibuat! Nomor SPR anda berada di pojok atas kanan kartu!</p>
                <div class="action">
                    <a class="button" href="{{url('/dashboard')}}">
                        Ke Halaman Utama
                    </a>
                </div>
                <br>
                <p class="info text-center">Semoga Harimu Menyenangkan!</p>
            </div>
        </div>
</body>
</html>