<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Event | CMC Polines</title>
    <style>
        .melayang {
            z-index: 10;
            position: absolute;
        }


        .containercuy:hover .event-image {
            -webkit-filter: brightness(50%);
            filter: brightness(50%)
        }

        .containercuy:hover .text-detail-event {
            color: white;
        }

        .event-image {
            -webkit-transition: all 300ms ease;
            transition: all 300ms ease;
        }

        .event-image:active {
            -webkit-filter: brightness(50%);
            filter: brightness(50%)
        }

        /* .event-image:hover {
            -webkit-filter: brightness(50%);
            filter: brightness(50%)
        } */

    </style>
</head>

<body class="bg-black bg-opacity-10">
    <div class="container bg-white col-xl-4 col-md-6 col-12">
        <div class="container">
            <div class="row">
                <span class="d-flex p-2">On Going Event</span>
                <div class="d-xs-flex d-lg-flex align-items-center containercuy justify-content-center col-md-12 mb-2 px-0"
                    style="position: relative">
                    <div class="container melayang">
                        <div class="d-flex flex-column">
                            <p class="m-0 text-detail-event text-wrap"><strong>Seminar Nasional : Komodo Bukan Keajaiban
                                    Dunia</strong></p>
                            <p class="m-0 text-detail-event"><span><i class="fa-solid fa-location-dot"></i></span> RSG
                                Politeknik Negeri Semarang</p>
                            <p class="m-0 text-detail-event"><span><i class="fa-solid fa-calendar-days"></i></span> 12
                                Agustus 2021</p>
                            <p class="m-0">
                                <a
                                    class="btn d-lg-inline-flex text-detail-event shadow d-none d-sm-block btn-sm btn-outline-secondary btn-pill">Beli
                                    Tiket</a>
                                <a class="btn d-inline-flex d-block d-sm-none btn-sm btn-secondary btn-pill">Beli
                                    Tiket</a>
                            </p>
                        </div>
                    </div>
                    <img src="https://dummyimage.com/popunder" class="event-image bg-dark img-fluid" alt="...">
                </div>
                <span class="d-flex p-2">On Going Event</span>
                <div class="d-flex align-items-center justify-content-center col-md-12 mb-2 px-0"
                    style="position: relative">
                    <button class="btn melayang btn-secondary mt-2">Click Me</button>
                    <img src="https://dummyimage.com/popunder" class="event-image img-fluid" alt="...">
                </div>
                <div class="d-flex align-items-center justify-content-center col-md-12 mb-2 px-0"
                    style="position: relative">
                    <button class="btn melayang btn-secondary mt-2">Click Me</button>
                    <img src="https://dummyimage.com/popunder" class="event-image img-fluid" alt="...">
                </div>
                <div class="d-flex align-items-center justify-content-center col-md-12 mb-2 px-0"
                    style="position: relative">
                    <button class="btn melayang btn-secondary mt-2">Click Me</button>
                    <img src="https://dummyimage.com/popunder" class="event-image img-fluid" alt="...">
                </div>
                <div class="d-flex align-items-center justify-content-center col-md-12 mb-2 px-0"
                    style="position: relative">
                    <button class="btn melayang btn-secondary mt-2">Click Me</button>
                    <img src="https://dummyimage.com/popunder" class="event-image img-fluid" alt="...">
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
