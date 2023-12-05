<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{$session_activity?->tagline}}">
    <meta name="keywords" content="GKM, Kendari, Gerakan Kendari Mengajar, undangan">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="{{$session_activity?->title}}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{url("")}}" />
    <meta property="og:image" content="{{asset("assets/icon.png")}}" />

    <title>{{$session_activity?->title}}</title>
    <link rel="icon" type="image/x-icon" href="{{asset("assets/icon.png")}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.2/photoswipe.min.css" integrity="sha512-LFWtdAXHQuwUGH9cImO9blA3a3GfQNkpF2uRlhaOpSbDevNyK1rmAjs13mtpjvWyi+flP7zYWboqY+8Mkd42xA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        @font-face {
            font-family: 'miliondreams';
            src: url("{{asset('assets/fonts/MillionDreams.otf')}}");
        }
        @font-face {
            font-family: 'Frank Ruhl Libre';
            src: url("{{asset('assets/fonts/Frank_Ruhl_Libre/FrankRuhlLibre-VariableFont_wght.ttf')}}");
        }
        .font-latin{
            font-family: 'miliondreams';
        }
        font-base{
            font-family: 'sans-serif, mo';
        }
        .font-text{
            font-family: 'Serif','Frank Ruhl Libre';
            font-weight: 700;
        }
        #mobile{
            max-width: 500px;
            background-image: url("{{asset('assets/cover.jpg')}}");
            background-size: cover;
        }
        .text-color2{
            color: #0d4e30;
        }
        .nav-tab-bottom{
            width: 130px;
        }
        .nav-tabs .nav-link{
            border: none;
            border-radius: 0;
        }
        .nav-tabs .nav-link:hover,.nav-tabs .nav-link.active{
            background-color: #359166;
        }
        .content{
            height: calc(100% - 60px);
        }
        .nav-bottom{
            /*height: 100px;*/
        }
        .dateEvent{
            height: 80px;
            padding-left: 20px;
            padding-right: 20px;
        }
        .table-jadwal td{
            padding-bottom: 0px;
        }

        body {
            height: 100vh;
            margin: 0;
            padding: 0;
        }
        #map{
            height: 300px;
            width: 400px;
        }
    </style>
</head>
<body>
<audio id="music" loop="loop" ><source src="https://assets.satumomen.com/musics/royalty-free-awarding-background-music-nomination-music-awards-music-royalty-free-music4video.mp3"></audio>
<div class="container h-100">
    <div class="row justify-content-center h-100 ">
        <div id="mobile" class="col-sm-12 position-relative ps-0 pe-0">
            <div class="content w-100 position-relative">

                <img alt="" src="{{asset('assets/ornamen_undangan.png')}}" class="position-absolute top-0" height="100px">
                <img alt="" src="{{asset('assets/ornamen_hijau.png')}}"  class="position-absolute bottom-0 end-0" height="100px">

                <div class="tab-content h-100">
                    <div class="tab-pane container active h-100" id="opening">
                        <div class="h-100 d-flex align-items-center justify-content-center p-3">

                            <div class="position-relative  text-success">
                                <div class="text-center mb-3">
                                    <img alt="" src="{{asset('assets/logo.png')}}" height="110px" width="110px">
                                </div>
                                <p class="text-center fs-6 mb-5">
                                    A pleasure to invite you to an<br />
                                    intimate moments of
                                </p>
                                <h6 class="text-center mb-3 fw-normal">
                                    {{$session_activity?->title}}
                                </h6>
                                <h1 class="text-center mb-5 text-color2 font-text" style="max-width: 350px">
                                    {{$session_activity?->tagline}}
                                </h1>
                                <div class="text-center fw-normal text-color2">
                                    With Pleasure
                                </div>
                                <div class="text-center fw-normal fs-5 mb-3">
                                    {{$participant?->name??"Nama Tamu"}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container fade h-100 ps-0 pe-0"  id="event">
                        <div class="h-100 d-flex align-items-center justify-content-center  w-100">
                            <div class="position-relative   text-success w-100 overflow-auto p-3" style="height: calc(100% - 50px)">

                                <div class="text-center mb-3">
                                    <img alt="" src="{{asset('assets/10th_gkm_hitam.png')}}" height="110px">
                                </div>
                                <h6 class="text-center fw-normal">
                                    {{$session_activity?->title}}
                                </h6>
                                <div class="d-flex justify-content-center  w-100">
                                    <h3 class="text-center mb-3 text-color2 font-text" style="max-width: 350px">
                                        {{$session_activity?->tagline}}
                                    </h3>
                                </div>
                                <div class="d-flex justify-content-center mb-3">
                                    <div class="dateEvent d-flex align-items-center justify-content-center">
                                        <div class="text-center fs-6">Sabtu <br/><span class="text-color2 fw-bold">s/d</span><br/>Minggu</div>
                                    </div>
                                    <div class="dateEvent d-flex align-items-center justify-content-center
                                    border border-top-0 border-bottom-0 border-success border-2">
                                        <div>
                                            <div class="text-center">
                                                <div class="fs-4 fw-bold text-color2">16 - 17</div>
                                                <div class="fs-6">Desember</div>
                                            </div>
                                        </div>
                                    </div >
                                    <div class="dateEvent d-flex align-items-center justify-content-center">
                                        <div class="fs-6 fw-bold text-color2">
                                            2023
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center fw-4 mb-3">
                                    Pukul 17.00 WITA - Selesai<br/> <span class="text-color2 fw-bold">INDONESIA</span>
                                </div>
                                <div class="mb-1">
                                    <div class="d-flex justify-content-center">
                                        <table class="table-jadwal table table-borderless" style="width: 350px">
                                            <tbody>
                                            <tr>
                                                <td colspan="2"  class="text-center fw-bold text-color2">
                                                    Rangkaian Acara
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sabtu</td>
                                                <td>: Malam Refleksi</td>
                                            </tr>
                                            <tr>
                                                <td>Minggu</td>
                                                <td>: Ramah Tamah Relawan GKM </td>
                                            </tr>
                                            <tr>
                                               <td colspan="2"  class="text-center">(Sharing Moment , Hiburan  dan Makan Siang)</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="text-center mb-3">
                                    <div class="fw-normal fs-5 fw-bold text-color2">{{$session_activity?->location}}</div>
                                    <div>{{$session_activity?->sub_location}}</div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container fade h-100 ps-0 pe-0" id="rsvp">

                        <div class="h-100 justify-content-center  w-100">
                            <div class="w-100 position-relative overflow-auto" style="padding-top: 20px; height: calc(100% - 20px)">
                                <div class="text-center mb-3">
                                    <img alt="" src="{{asset('assets/10th_gkm_hitam.png')}}" height="100px">
                                </div>
                                <h6 class="text-center fw-normal">
                                    {{$session_activity?->title}}
                                </h6>
                                <div class="d-flex justify-content-center  w-100">
                                    <h3 class="text-center mb-3 text-color2 font-text" style="max-width: 350px">
                                        {{$session_activity?->tagline}}
                                    </h3>
                                </div>
                                <div class="fs-3 text-center mb-3">
                                    Konfirmasi Kehadiran
                                </div>
                                <div class="d-flex justify-content-center mb-3" >
                                    <div class="m-1 bg-success text-white text-center ps-4 pe-4 pt-1 pb-1 rounded">
                                        <div class="fs-4 fw-bold" id="count_down_day">00</div>
                                        <div class="fs-6">
                                            Hari
                                        </div>
                                    </div>

                                    <div class="m-1 bg-success text-white text-center ps-4 pe-4 pt-1 pb-1 rounded">
                                        <div class="fs-4 fw-bold" id="count_down_hour">00</div>
                                        <div class="fs-6">
                                            Jam
                                        </div>
                                    </div>

                                    <div class="m-1 bg-success text-white text-center ps-4 pe-4 pt-1 pb-1 rounded">
                                        <div class="fs-4 fw-bold" id="count_down_minute">00</div>
                                        <div class="fs-6">
                                            Menit
                                        </div>
                                    </div>

                                    <div class="m-1 bg-success text-white text-center ps-4 pe-4 pt-1 pb-1 rounded">
                                        <div class="fs-4 fw-bold" id="count_down_second">00</div>
                                        <div class="fs-6">
                                            Detik
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center fs-6 mb-3">
                                    Tekan tombol dibawah ini <br>
                                    untuk konfirmasi kehadiran
                                </div>
                                <div class="text-center mb-3">
                                    <button class="btn btn-success mb-3" id="btnKonfirmasiKehadiran" >
                                        Klik Disini
                                    </button>
                                    <h6 class="text-danger">*Kontribusi {{$session_activity?->contribution_text}}</h6>
                                    <div>{{$session_activity?->contribution_description}}</div>
                                </div>

                                <div class="mb-1">
                                    <div class="d-flex justify-content-center">
                                        <table class="table-jadwal table table-borderless" style="width: 350px">
                                            <tbody>
                                            <tr>
                                                <td colspan="3"  class="text-left fw-bold text-color2">
                                                    Info Lebih Lanjut :
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>Putri </td>
                                                <td>(+62 823-1824-2741)</td>
                                                <td>
                                                    <a target="_blank" href="https://wa.me/+6282318242741" class="btn btn-sm btn-success"><i class="fa-brands fa-whatsapp"></i></a>
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>Mufli </td>
                                                <td>(+62 853-4287-0993) </td>
                                                <td>
                                                    <a target="_blank" href="https://wa.me/+6285342870993"  class="btn btn-sm btn-success"><i class="fa-brands fa-whatsapp"></i></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane container fade h-100 ps-0 pe-0" id="maps">
                        <div class="h-100 d-flex justify-content-center  w-100">
                            <div class="w-100 position-relative overflow-auto" style="padding-top: 20px; height: calc(100% - 20px)">
                                <div class="text-center mb-3">
                                    <img alt=""  src="{{asset('assets/10th_gkm_hitam.png')}}" height="100px">
                                </div>
                                <h6 class="text-center fw-normal">
                                    {{$session_activity?->title}}
                                </h6>
                                <div class="d-flex justify-content-center  w-100">
                                    <h3 class="text-center mb-3 text-color2 font-text" style="max-width: 350px">
                                        {{$session_activity?->tagline}}
                                    </h3>
                                </div>
                                <div id="map" class="mb-3 d-flex justify-content-center w-100">
                                    <iframe style="border-color:#0d4e30 !important;" class="border border-5 w-100 h-100 m-2" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3980.5231060098463!2d122.66135407571704!3d-3.91178634413405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d98e917391e2a79%3A0xa37b17506433f85f!2sAksa%20Villa%20Toronipa!5e0!3m2!1sid!2sid!4v1701317510003!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                                <div class="p-3 text-end mb-3">
                                    <a class="text-decoration-none text-color2 fw-normal" href="https://www.instagram.com/villa.aksa/" target="_blank"><img alt="" height="20px" src="{{asset("assets/icon_instagram.png")}}"> @villa.aksa</a>
                                </div>

                                <div class="text-center mb-3">
                                    <div class="fw-normal fs-5 fw-bold text-color2">{{$session_activity?->location}}</div>
                                    <div>{{$session_activity?->sub_location}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container fade h-100 ps-0 pe-0" id="gallery">
                        <div class="h-100 d-flex justify-content-center  w-100">
                            <div  class="w-100 position-relative overflow-auto" style="padding-top: 20px; height: calc(100%)">
                                <div class="text-center mb-3">
                                    <img alt=""  src="{{asset('assets/10th_gkm_hitam.png')}}" height="100px">
                                </div>
                                <h6 class="text-center fw-normal">
                                    {{$session_activity?->title}}
                                </h6>
                                <div class="d-flex justify-content-center  w-100">
                                    <h3 class="text-center mb-3 text-color2 font-text" style="max-width: 350px">
                                        {{$session_activity?->tagline}}
                                    </h3>
                                </div>
                                    <div class="row ms-0 me-0 pswp-gallery pswp-gallery--single-column" id="gallery--getting-started">

                                        <div class="col-4 p-0">
                                            <a  href="{{asset('assets/galleries/a.jpg')}}"
                                               data-pswp-width="1920"
                                               data-pswp-height="1080"
                                               target="_blank">
                                                <img class="w-100" src="{{asset('assets/galleries/thumb/a.jpg')}}" alt="" />
                                            </a>
                                        </div>
                                        <div class="col-4 p-0">
                                            <a  href="{{asset('assets/galleries/b1.JPG')}}"
                                               data-pswp-width="1920"
                                               data-pswp-height="1080"
                                               target="_blank">
                                                <img class="w-100" src="{{asset('assets/galleries/thumb/b1.JPG')}}" alt="" />
                                            </a>
                                        </div>

                                        <div class="col-4 p-0">
                                            <a  href="{{asset('assets/galleries/b2.JPG')}}"
                                                data-pswp-width="1920"
                                                data-pswp-height="1080"
                                                target="_blank">
                                                <img class="w-100" src="{{asset('assets/galleries/thumb/b2.JPG')}}" alt="" />
                                            </a>
                                        </div>

                                        <div class="col-4 p-0">
                                            <a  href="{{asset('assets/galleries/b3.JPG')}}"
                                                data-pswp-width="1920"
                                                data-pswp-height="1080"
                                                target="_blank">
                                                <img class="w-100" src="{{asset('assets/galleries/thumb/b3.JPG')}}" alt="" />
                                            </a>
                                        </div>

                                        <div class="col-4 p-0">
                                            <a  href="{{asset('assets/galleries/c.JPG')}}"
                                                data-pswp-width="1920"
                                                data-pswp-height="1080"
                                                target="_blank">
                                                <img class="w-100" src="{{asset('assets/galleries/thumb/c.JPG')}}" alt="" />
                                            </a>
                                        </div>
                                        <div class="col-4 p-0">
                                            <a  href="{{asset('assets/galleries/d.JPG')}}"
                                                data-pswp-width="1920"
                                                data-pswp-height="1080"
                                                target="_blank">
                                                <img class="w-100" src="{{asset('assets/galleries/thumb/d.JPG')}}" alt="" />
                                            </a>
                                        </div>

                                        <div class="col-4 p-0">
                                            <a  href="{{asset('assets/galleries/e.jpg')}}"
                                                data-pswp-width="1920"
                                                data-pswp-height="1080"
                                                target="_blank">
                                                <img class="w-100" src="{{asset('assets/galleries/thumb/e.jpg')}}" alt="" />
                                            </a>
                                        </div>

                                        <div class="col-4 p-0">
                                            <a  href="{{asset('assets/galleries/f.JPG')}}"
                                                data-pswp-width="1920"
                                                data-pswp-height="1080"
                                                target="_blank">
                                                <img class="w-100" src="{{asset('assets/galleries/thumb/f.JPG')}}" alt="" />
                                            </a>
                                        </div>

                                        <div class="col-4 p-0">
                                            <a  href="{{asset('assets/galleries/g.JPG')}}"
                                                data-pswp-width="1920"
                                                data-pswp-height="1080"
                                                target="_blank">
                                                <img class="w-100" src="{{asset('assets/galleries/thumb/g.JPG')}}" alt="" />
                                            </a>
                                        </div>
                                        <div class="col-4 p-0">
                                            <a  href="{{asset('assets/galleries/h.JPG')}}"
                                                data-pswp-width="1920"
                                                data-pswp-height="1080"
                                                target="_blank">
                                                <img class="w-100" src="{{asset('assets/galleries/thumb/h.JPG')}}" alt="" />
                                            </a>
                                        </div>

                                        <div class="col-4 p-0">
                                            <a  href="{{asset('assets/galleries/i.jpg')}}"
                                                data-pswp-width="1920"
                                                data-pswp-height="1080"
                                                target="_blank">
                                                <img class="w-100" src="{{asset('assets/galleries/thumb/i.jpg')}}" alt="" />
                                            </a>
                                        </div>

                                        <div class="col-4 p-0">
                                            <a  href="{{asset('assets/galleries/j.jpg')}}"
                                                data-pswp-width="1920"
                                                data-pswp-height="1080"
                                                target="_blank">
                                                <img class="w-100" src="{{asset('assets/galleries/thumb/j.jpg')}}" alt="" />
                                            </a>
                                        </div>

                                    </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container fade h-100 p-0" id="thanks">
                        <div class="h-100 d-flex align-items-center justify-content-center  w-100">
                            <div class="position-relative   text-success w-100 overflow-auto ">
                                <div class="text-center mb-3">
                                    <img src="{{asset('assets/logo.png')}}" height="100px">
                                </div>
                                <div class="text-center p-4 mb-3 fw-normal text-color2 font-latin" style="font-size: 40px; line-height: 1">
                                    Mari pulang sejenak, bertukar cerita, harapan, dan cita-cita. Kehadiran Kakak sekalian adalah kado istimewa untuk GKM
                                </div>

                                <div class="text-center fs-6 text-color2">
                                    <p class="mb-2">Salam Hangat GKM ,</p>
                                    <p>Mengajar, Mendidik, Menginspirasi</p>
                                </div>

                                <div class="text-justify fs-6 text-color2 ps-3 pe-3">
                                    <table class="table table-borderless">
                                        <tbody>
                                        <tr>
                                            <td class="ps-0">Donasi </td>
                                            <td >: PKBM Gerakan Kendari Mengajar</td>
                                        </tr>
                                        <tr>
                                            <td class="ps-0">Rek BNI </td>
                                            <td>: 1230620139 <button id="copy-rekening" class="btn btn-sm ms-3 border"><i class="fa-regular fa-copy"></i> Copy</button> <input type="hidden" value="1230620139" id="input-rek"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
<!--            bottom menu-->
            <div class="position-absolute bottom-0 right-0 w-100">
                <nav class="nav navbar  navbar-expand navbar-dark bg-success overflow-auto pb-0 pt-0">
                    <ul class="nav-bottom navbar-nav nav-tabs nav-justified bg-success">
                        <li class="nav-item nav-tab-bottom">
                            <a class="nav-link active" data-bs-toggle="tab" href="#opening">
                                <i class="fa-solid fa-house"></i><br/>
                                Opening
                            </a>
                        </li>
                        <li class="nav-item nav-tab-bottom">
                            <a  class="nav-link" data-bs-toggle="tab" href="#event">
                                <i class="fa-solid fa-calendar-days"></i><br/>
                                Event
                            </a>
                        </li>
                        <li class="nav-item nav-tab-bottom">
                            <a  class="nav-link" data-bs-toggle="tab" href="#rsvp">
                                <i class="fa-solid fa-comment"></i><br/>
                                RSVP
                            </a>
                        </li>
                        <li class="nav-item nav-tab-bottom">
                            <a  class="nav-link" data-bs-toggle="tab" href="#maps">
                                <i class="fa-solid fa-location-dot"></i><br/>
                                Maps
                            </a>
                        </li>
                        <li class="nav-item nav-tab-bottom">
                            <a  class="nav-link" data-bs-toggle="tab" href="#gallery">
                                <i class="fa-solid fa-images"></i> <br/>
                                Gallery
                            </a>
                        </li>

                        <li class="nav-item nav-tab-bottom">
                            <a  class="nav-link" data-bs-toggle="tab" href="#thanks">
                                <i class="fa-solid fa-square-check"></i> <br />
                                Thanks
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>


            <div id="cover-invitation" class="bg-white h-100 w-100 position-absolute left-0 top-0" style="background-image: url('{{asset("assets/bg_hijau2.jpg")}}'); background-size: cover">
                <div class="h-100 d-flex align-items-center justify-content-center">

                    <div class="position-relative  text-black">
                        <div class="text-center mb-3">
                            <img alt=""  src="{{asset('assets/logo.png')}}" height="110px" width="110px">
                        </div>
                        <p class="text-center fs-6 mb-5">
                            A pleasure to invite you to an<br />
                            intimate moments of
                        </p>
                        <h6 class="text-center mb-3 fw-normal">
                            {{$session_activity?->title}}
                        </h6>
                        <h1 class="text-center mb-5 text-color2 font-text" style="max-width: 350px">
                            {{$session_activity?->tagline}}
                        </h1>
                        <div class="text-center fw-normal text-color2">
                            With Pleasure
                        </div>
                        <div class="text-center fw-normal fs-5 mb-3">
                            {{$participant?->name??"Nama Tamu"}}
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success" id="btnOpenInvitation" >
                                Open Invitation
                            </button>
                        </div>
                    </div>
                </div>

                <img alt="" src="{{asset('assets/ornamen_undangan.png')}}" class="position-absolute top-0" height="100px" />
                <img alt="" src="{{asset('assets/ornamen_hijau.png')}}"  class="position-absolute bottom-0 end-0" height="100px" />
            </div>

            <div id="loading" class="d-none w-100 h-100 d-flex align-items-center justify-content-center  position-absolute top-0" style="background-color: #ffffffba">
                <div class="text-center">
                    <div class="mb-5 text-c">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <h5>Loading</h5>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Kehadiran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{url("confirmation-of-attendance")}}" id="confirmation-of-attendance">
                @csrf
                <input type="hidden" name="session_activity_id" value="1">
                <input type="hidden" name="key" value="{{$participant?->key??null}}">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Nama Undangan" value="{{$participant?->name}}" required/>
                    </div>
                    <div class="mb-3">
                        <div class="input-group ">

                            <input type="number" name="total_member" class="form-control " placeholder="Jumlah Peserta. Misalnya 1" value="{{$participant?->total_member}}" required/>
                            <span class="input-group-text" id="basic-addon2">Orang</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="phone_number" class="form-control" placeholder="Nomor HP yang dapat dihubungi"  value="{{$participant?->phone_number}}" required/>
                    </div>
                    <div class="d-flex justify-content-end">
                        <h6><span class="p-2 bg-success fw-normal d-none text-white" id="status-kehadiran-ok">Telah diverifikasi</span></h6>
                        <h6><span class="p-2 bg-warning fw-normal d-none" id="status-kehadiran-wait">Menunggu Konfirmasi</span></h6>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Saya Akan Hadir</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="module">
    import PhotoSwipeLightbox from 'https://unpkg.com/photoswipe/dist/photoswipe-lightbox.esm.js';

    const myModal = new bootstrap.Modal(document.getElementById("exampleModal"), {
        backdrop: 'static',
        keyboard: false
    });

    const coverinvitation = document.getElementById("cover-invitation");
    const btnOpenInvitation = document.getElementById("btnOpenInvitation");
    const music  = document.getElementById("music");
    const mobile = document.getElementById("mobile");

    const count_down_day = document.getElementById("count_down_day");
    const count_down_hour = document.getElementById("count_down_hour");
    const count_down_minute = document.getElementById("count_down_minute");
    const count_down_second = document.getElementById("count_down_second");

    const statusKehadiranOk = document.getElementById("status-kehadiran-ok");
    const statusKehadiranWait = document.getElementById("status-kehadiran-wait");
    const statusKehadiran = "{{$status}}";
    const confirmOfAttendance = document.getElementById("confirmation-of-attendance");
    const loading = document.getElementById("loading")
    updateStatusKehadiran();

    function updateStatusKehadiran(){
        if(statusKehadiran === "ok"){
            statusKehadiranOk.classList.remove("d-none")
        }else if(statusKehadiran === "wait"){
            statusKehadiranWait.classList.remove("d-none")
        }
    }

    const btnKonfirmasiKehadiran  = document.getElementById("btnKonfirmasiKehadiran");
    btnKonfirmasiKehadiran.addEventListener("click", function () {
        myModal.show();
    })

    confirmOfAttendance.addEventListener("submit",confirmDialogConfirmOfAttedance)

    function confirmOfAttedance(e){
        e.preventDefault();
        const data = serializeForm(e.target);
        const url = "{{url("confirmation-of-attendance")}}";
        loading.classList.remove("d-none");
        fetch(url,{
            method: "POST",
            body: JSON.stringify(data),
            mode: "cors", // no-cors, *cors, same-origin
            cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
            credentials: "same-origin", // include, *same-origin, omit
            headers: {
                "Content-Type": "application/json",
                // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            redirect: "follow", // manual, *follow, error
            referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        })
            .then(function (response){
                if (response.ok) {
                    return response.json();
                }
                return Promise.reject(response);
            })
            .then(function (response){
                swal("Terimakasih telah mengkonfirmasi kehadiran anda")
                    .then((value) =>{
                        console.log("response",response)
                        window.location.href = `{{url("")}}/${(response?.data?.key??null)}`;
                    });
            })
            .catch(function (error){
                console.log(error)
                Toastify({
                    text: error?.message??"Gagal melakukan konfirmasi kehadiran",
                    duration: 3000,
                    style: {
                        background: "#d90429",
                    },
                }).showToast();
            })
            .finally(function (){
                loading.classList.add("d-none");
            });
    }
    function confirmDialogConfirmOfAttedance(e){
        e.preventDefault()
        swal("Apakah data yang anda kirimkan sudah benar untuk mengkonfirmasi kehadiran anda?", {
            buttons: {
                cancel: "Tutup",
                Ya: true
            },
        })
            .then((value) => {
                switch (value) {
                    case "Ya":
                        myModal.hide()
                        confirmOfAttedance(e)
                        break;
                }
            });
    }
    var serializeForm = function (form) {
        var obj = {};
        var formData = new FormData(form);
        for (var key of formData.keys()) {
            obj[key] = formData.get(key);
        }
        return obj;
    };

    btnOpenInvitation.addEventListener("click", function (){
        coverinvitation.classList.add("fade")
        coverinvitation.classList.add("d-none")
        document.documentElement.requestFullscreen();
        music.play()
    })


    const lightbox = new PhotoSwipeLightbox({
        gallery: '#gallery--getting-started',
        children: 'a',
        pswpModule: () => import('https://unpkg.com/photoswipe'),
    });
    lightbox.init();

    document.getElementById("copy-rekening").addEventListener("click",function (){
        var copyText = document.getElementById("input-rek");

        // Select the text field
        copyText.select();
        navigator.clipboard.writeText(copyText.value);
        Toastify({
            text: `Berhasil copy text ${copyText.value}`,
            duration: 3000,
            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
            },
            onClick: function(){} // Callback after click
        }).showToast();
    });

    var countDownDate = new Date("{{date("M d, Y  H:i",strtotime($session_activity->date_start." ".$session_activity->time_start))}}");
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        count_down_day.innerHTML = Math.floor(distance / (1000 * 60 * 60 * 24));
        count_down_hour.innerHTML = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        count_down_minute.innerHTML = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        count_down_second.innerHTML = Math.floor((distance % (1000 * 60)) / 1000);

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            // document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);

</script>
</body>
</html>
