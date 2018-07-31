@extends('layouts.master') @section('title') liste materiels @endsection 


@section('customCSS')
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content') 



@if(Session::has('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    <strong>
        Bien !
    </strong>
    {{Session::get('info')}}
</div>
@endif




<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Export Tools
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                        <span>
                            <i class="la la-cart-plus"></i>
                            <span>
                                New Order
                            </span>
                        </span>
                    </a>
                </li>
                <li class="m-portlet__nav-item"></li>
                
                <li class="m-portlet__nav-item">
                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                        <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                            <i class="la la-ellipsis-h m--font-brand"></i>
                        </a>
                        <div class="m-dropdown__wrapper">
                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                            <div class="m-dropdown__inner">
                                <div class="m-dropdown__body">
                                    <div class="m-dropdown__content">
                                        <ul class="m-nav">
                                            <li class="m-nav__section m-nav__section--first">
                                                <span class="m-nav__section-text">
                                                    Quick Actions
                                                </span>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                    <span class="m-nav__link-text">
                                                        Create Post
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                    <span class="m-nav__link-text">
                                                        Send Messages
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-multimedia-2"></i>
                                                    <span class="m-nav__link-text">
                                                        Upload File
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-nav__section">
                                                <span class="m-nav__section-text">
                                                    Useful Links
                                                </span>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                    <span class="m-nav__link-text">
                                                        FAQ
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                    <span class="m-nav__link-text">
                                                        Support
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="m-nav__separator m-nav__separator--fit m--hide"></li>
                                            <li class="m-nav__item m--hide">
                                                <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                                    Submit
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <div class="m-portlet__body">
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
            <thead>
                <tr>
                    <th>
                        OrderID
                    </th>
                    <th>
                        Country
                    </th>
                    <th>
                        ShipCity
                    </th>
                    <th>
                        ShipAddress
                    </th>
                    <th>
                        CompanyAgent
                    </th>
                    <th>
                        CompanyName
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Type
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        61715-075
                    </td>
                    <td>
                        China
                    </td>
                    <td>
                        Tieba
                    </td>
                    <td>
                        746 Pine View Junction
                    </td>
                    <td>
                        Nixie Sailor
                    </td>
                    <td>
                        Gleichner, Ziemann and Gutkowski
                    </td>
                    <td>
                        3
                    </td>
                    <td>
                        2
                    </td>
                </tr>
                <tr>
                    <td>
                        63629-4697
                    </td>
                    <td>
                        Indonesia
                    </td>
                    <td>
                        Cihaur
                    </td>
                    <td>
                        01652 Fulton Trail
                    </td>
                    <td>
                        Emelita Giraldez
                    </td>
                    <td>
                        Rosenbaum-Reichel
                    </td>
                    <td>
                        6
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        68084-123
                    </td>
                    <td>
                        Argentina
                    </td>
                    <td>
                        Puerto Iguazú
                    </td>
                    <td>
                        2 Pine View Park
                    </td>
                    <td>
                        Ula Luckin
                    </td>
                    <td>
                        Kulas, Cassin and Batz
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        2
                    </td>
                </tr>
                <tr>
                    <td>
                        67457-428
                    </td>
                    <td>
                        Indonesia
                    </td>
                    <td>
                        Talok
                    </td>
                    <td>
                        3050 Buell Terrace
                    </td>
                    <td>
                        Evangeline Cure
                    </td>
                    <td>
                        Pfannerstill-Treutel
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        31722-529
                    </td>
                    <td>
                        Austria
                    </td>
                    <td>
                        Sankt Andrä-Höch
                    </td>
                    <td>
                        3038 Trailsway Junction
                    </td>
                    <td>
                        Tierney St. Louis
                    </td>
                    <td>
                        Dicki-Kling
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        64117-168
                    </td>
                    <td>
                        China
                    </td>
                    <td>
                        Rongkou
                    </td>
                    <td>
                        023 South Way
                    </td>
                    <td>
                        Gerhard Reinhard
                    </td>
                    <td>
                        Gleason, Kub and Marquardt
                    </td>
                    <td>
                        5
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        43857-0331
                    </td>
                    <td>
                        China
                    </td>
                    <td>
                        Baiguo
                    </td>
                    <td>
                        56482 Fairfield Terrace
                    </td>
                    <td>
                        Englebert Shelley
                    </td>
                    <td>
                        Jenkins Inc
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        64980-196
                    </td>
                    <td>
                        Croatia
                    </td>
                    <td>
                        Vinica
                    </td>
                    <td>
                        0 Elka Street
                    </td>
                    <td>
                        Hazlett Kite
                    </td>
                    <td>
                        Streich LLC
                    </td>
                    <td>
                        6
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        0404-0360
                    </td>
                    <td>
                        Colombia
                    </td>
                    <td>
                        San Carlos
                    </td>
                    <td>
                        38099 Ilene Hill
                    </td>
                    <td>
                        Freida Morby
                    </td>
                    <td>
                        Haley, Schamberger and Durgan
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        52125-267
                    </td>
                    <td>
                        Thailand
                    </td>
                    <td>
                        Maha Sarakham
                    </td>
                    <td>
                        8696 Barby Pass
                    </td>
                    <td>
                        Obed Helian
                    </td>
                    <td>
                        Labadie, Predovic and Hammes
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        54092-515
                    </td>
                    <td>
                        Brazil
                    </td>
                    <td>
                        Canguaretama
                    </td>
                    <td>
                        32461 Ridgeway Alley
                    </td>
                    <td>
                        Sibyl Amy
                    </td>
                    <td>
                        Treutel-Ratke
                    </td>
                    <td>
                        4
                    </td>
                    <td>
                        2
                    </td>
                </tr>
                <tr>
                    <td>
                        0185-0130
                    </td>
                    <td>
                        China
                    </td>
                    <td>
                        Jiamachi
                    </td>
                    <td>
                        23 Walton Pass
                    </td>
                    <td>
                        Norri Foldes
                    </td>
                    <td>
                        Strosin, Nitzsche and Wisozk
                    </td>
                    <td>
                        3
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        21130-678
                    </td>
                    <td>
                        China
                    </td>
                    <td>
                        Qiaole
                    </td>
                    <td>
                        328 Glendale Hill
                    </td>
                    <td>
                        Myrna Orhtmann
                    </td>
                    <td>
                        Miller-Schiller
                    </td>
                    <td>
                        3
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        40076-953
                    </td>
                    <td>
                        Portugal
                    </td>
                    <td>
                        Burgau
                    </td>
                    <td>
                        52550 Crownhardt Court
                    </td>
                    <td>
                        Sioux Kneath
                    </td>
                    <td>
                        Rice, Cole and Spinka
                    </td>
                    <td>
                        4
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        36987-3005
                    </td>
                    <td>
                        Portugal
                    </td>
                    <td>
                        Bacelo
                    </td>
                    <td>
                        548 Morrow Terrace
                    </td>
                    <td>
                        Christa Jacmar
                    </td>
                    <td>
                        Brakus-Hansen
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        2
                    </td>
                </tr>
                <tr>
                    <td>
                        67510-0062
                    </td>
                    <td>
                        South Africa
                    </td>
                    <td>
                        Pongola
                    </td>
                    <td>
                        02534 Hauk Trail
                    </td>
                    <td>
                        Shandee Goracci
                    </td>
                    <td>
                        Bergnaum, Thiel and Schuppe
                    </td>
                    <td>
                        5
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        36987-2542
                    </td>
                    <td>
                        Russia
                    </td>
                    <td>
                        Novokizhinginsk
                    </td>
                    <td>
                        19427 Sloan Road
                    </td>
                    <td>
                        Jerrome Colvie
                    </td>
                    <td>
                        Kreiger, Glover and Connelly
                    </td>
                    <td>
                        3
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        11673-479
                    </td>
                    <td>
                        Brazil
                    </td>
                    <td>
                        Conceição das Alagoas
                    </td>
                    <td>
                        191 Stone Corner Road
                    </td>
                    <td>
                        Michaelina Plenderleith
                    </td>
                    <td>
                        Legros-Gleichner
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        2
                    </td>
                </tr>
                <tr>
                    <td>
                        47781-264
                    </td>
                    <td>
                        Ukraine
                    </td>
                    <td>
                        Yasinya
                    </td>
                    <td>
                        1481 Sauthoff Place
                    </td>
                    <td>
                        Lombard Luthwood
                    </td>
                    <td>
                        Haag LLC
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        2
                    </td>
                </tr>
                <tr>
                    <td>
                        42291-712
                    </td>
                    <td>
                        Indonesia
                    </td>
                    <td>
                        Kembang
                    </td>
                    <td>
                        9029 Blackbird Point
                    </td>
                    <td>
                        Leonora Chevin
                    </td>
                    <td>
                        Mann LLC
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        64679-154
                    </td>
                    <td>
                        Mongolia
                    </td>
                    <td>
                        Sharga
                    </td>
                    <td>
                        102 Holmberg Park
                    </td>
                    <td>
                        Tannie Seakes
                    </td>
                    <td>
                        Blanda Group
                    </td>
                    <td>
                        6
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        49348-055
                    </td>
                    <td>
                        China
                    </td>
                    <td>
                        Guxi
                    </td>
                    <td>
                        45 Butterfield Street
                    </td>
                    <td>
                        Yardley Wetherell
                    </td>
                    <td>
                        Gerlach-Schultz
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        2
                    </td>
                </tr>
                <tr>
                    <td>
                        47593-438
                    </td>
                    <td>
                        Portugal
                    </td>
                    <td>
                        Viso
                    </td>
                    <td>
                        97 Larry Center
                    </td>
                    <td>
                        Bryn Peascod
                    </td>
                    <td>
                        Larkin and Sons
                    </td>
                    <td>
                        6
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        54569-0175
                    </td>
                    <td>
                        Japan
                    </td>
                    <td>
                        Minato
                    </td>
                    <td>
                        077 Hoffman Center
                    </td>
                    <td>
                        Chrissie Jeromson
                    </td>
                    <td>
                        Brakus-McCullough
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        0093-1016
                    </td>
                    <td>
                        Indonesia
                    </td>
                    <td>
                        Merdeka
                    </td>
                    <td>
                        3150 Cherokee Center
                    </td>
                    <td>
                        Gusti Clamp
                    </td>
                    <td>
                        Stokes Group
                    </td>
                    <td>
                        6
                    </td>
                    <td>
                        2
                    </td>
                </tr>
                <tr>
                    <td>
                        0093-5142
                    </td>
                    <td>
                        China
                    </td>
                    <td>
                        Jianggao
                    </td>
                    <td>
                        289 Badeau Alley
                    </td>
                    <td>
                        Otis Jobbins
                    </td>
                    <td>
                        Ruecker, Leffler and Abshire
                    </td>
                    <td>
                        4
                    </td>
                    <td>
                        2
                    </td>
                </tr>
                <tr>
                    <td>
                        51523-026
                    </td>
                    <td>
                        Germany
                    </td>
                    <td>
                        Erfurt
                    </td>
                    <td>
                        132 Chive Way
                    </td>
                    <td>
                        Lonnie Haycox
                    </td>
                    <td>
                        Feest Group
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        49035-522
                    </td>
                    <td>
                        Australia
                    </td>
                    <td>
                        Eastern Suburbs Mc
                    </td>
                    <td>
                        074 Algoma Drive
                    </td>
                    <td>
                        Heddi Castelli
                    </td>
                    <td>
                        Kessler and Sons
                    </td>
                    <td>
                        5
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        58411-198
                    </td>
                    <td>
                        Ethiopia
                    </td>
                    <td>
                        Kombolcha
                    </td>
                    <td>
                        91066 Amoth Court
                    </td>
                    <td>
                        Tuck O'Dowgaine
                    </td>
                    <td>
                        Simonis, Rowe and Davis
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        27495-006
                    </td>
                    <td>
                        Portugal
                    </td>
                    <td>
                        Arrifes
                    </td>
                    <td>
                        3 Fairfield Junction
                    </td>
                    <td>
                        Vernon Cosham
                    </td>
                    <td>
                        Kreiger-Nicolas
                    </td>
                    <td>
                        4
                    </td>
                    <td>
                        2
                    </td>
                </tr>
                <tr>
                    <td>
                        55154-8284
                    </td>
                    <td>
                        Philippines
                    </td>
                    <td>
                        Talisay
                    </td>
                    <td>
                        09 Sachtjen Junction
                    </td>
                    <td>
                        Bryna MacCracken
                    </td>
                    <td>
                        Hyatt-Witting
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        62678-207
                    </td>
                    <td>
                        Libya
                    </td>
                    <td>
                        Zuwārah
                    </td>
                    <td>
                        82 Thackeray Pass
                    </td>
                    <td>
                        Freda Arnall
                    </td>
                    <td>
                        Dicki, Morar and Stiedemann
                    </td>
                    <td>
                        3
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        68428-725
                    </td>
                    <td>
                        China
                    </td>
                    <td>
                        Zhangcun
                    </td>
                    <td>
                        3 Goodland Terrace
                    </td>
                    <td>
                        Pavel Kringe
                    </td>
                    <td>
                        Goldner-Lehner
                    </td>
                    <td>
                        4
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        0363-0724
                    </td>
                    <td>
                        Morocco
                    </td>
                    <td>
                        Temara
                    </td>
                    <td>
                        9550 Weeping Birch Crossing
                    </td>
                    <td>
                        Felix Nazaret
                    </td>
                    <td>
                        Waters, Quigley and Keeling
                    </td>
                    <td>
                        5
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        37000-102
                    </td>
                    <td>
                        Paraguay
                    </td>
                    <td>
                        Los Cedrales
                    </td>
                    <td>
                        1 Ridge Oak Way
                    </td>
                    <td>
                        Penrod Allanby
                    </td>
                    <td>
                        Rodriguez Group
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        55289-002
                    </td>
                    <td>
                        Philippines
                    </td>
                    <td>
                        Dologon
                    </td>
                    <td>
                        9 Vidon Terrace
                    </td>
                    <td>
                        Hubey Passby
                    </td>
                    <td>
                        Lemke-Hermiston
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        15127-874
                    </td>
                    <td>
                        Tanzania
                    </td>
                    <td>
                        Nanganga
                    </td>
                    <td>
                        33 Anniversary Parkway
                    </td>
                    <td>
                        Magdaia Rotlauf
                    </td>
                    <td>
                        Hettinger, Medhurst and Heaney
                    </td>
                    <td>
                        3
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        49349-123
                    </td>
                    <td>
                        Indonesia
                    </td>
                    <td>
                        Pule
                    </td>
                    <td>
                        77292 Bonner Plaza
                    </td>
                    <td>
                        Alfonse Lawrance
                    </td>
                    <td>
                        Schuppe-Harber
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        17089-415
                    </td>
                    <td>
                        Palestinian Territory
                    </td>
                    <td>
                        Za‘tarah
                    </td>
                    <td>
                        42806 Ridgeview Terrace
                    </td>
                    <td>
                        Kessiah Chettoe
                    </td>
                    <td>
                        Mraz LLC
                    </td>
                    <td>
                        5
                    </td>
                    <td>
                        2
                    </td>
                </tr>
                <tr>
                    <td>
                        51327-510
                    </td>
                    <td>
                        Philippines
                    </td>
                    <td>
                        Esperanza
                    </td>
                    <td>
                        4 Linden Court
                    </td>
                    <td>
                        Natka Fairbanks
                    </td>
                    <td>
                        Mueller-Greenholt
                    </td>
                    <td>
                        3
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        0187-2201
                    </td>
                    <td>
                        Brazil
                    </td>
                    <td>
                        Rio das Ostras
                    </td>
                    <td>
                        5722 Buhler Place
                    </td>
                    <td>
                        Shaw Puvia
                    </td>
                    <td>
                        Veum LLC
                    </td>
                    <td>
                        3
                    </td>
                    <td>
                        2
                    </td>
                </tr>
                <tr>
                    <td>
                        16590-890
                    </td>
                    <td>
                        Indonesia
                    </td>
                    <td>
                        Krajan Gajahmati
                    </td>
                    <td>
                        54 Corry Street
                    </td>
                    <td>
                        Alden Dingate
                    </td>
                    <td>
                        Heidenreich Inc
                    </td>
                    <td>
                        5
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        75862-001
                    </td>
                    <td>
                        Indonesia
                    </td>
                    <td>
                        Pineleng
                    </td>
                    <td>
                        4 Messerschmidt Point
                    </td>
                    <td>
                        Cherish Peplay
                    </td>
                    <td>
                        McCullough-Gibson
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        2
                    </td>
                </tr>
                <tr>
                    <td>
                        24559-091
                    </td>
                    <td>
                        Philippines
                    </td>
                    <td>
                        Amuñgan
                    </td>
                    <td>
                        5470 Forest Parkway
                    </td>
                    <td>
                        Nedi Swetman
                    </td>
                    <td>
                        Gerhold Inc
                    </td>
                    <td>
                        5
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        0007-3230
                    </td>
                    <td>
                        Russia
                    </td>
                    <td>
                        Bilyarsk
                    </td>
                    <td>
                        5899 Basil Place
                    </td>
                    <td>
                        Ashley Blick
                    </td>
                    <td>
                        Cummings-Goodwin
                    </td>
                    <td>
                        4
                    </td>
                    <td>
                        2
                    </td>
                </tr>
                <tr>
                    <td>
                        50184-1029
                    </td>
                    <td>
                        Peru
                    </td>
                    <td>
                        Chocope
                    </td>
                    <td>
                        65560 Daystar Center
                    </td>
                    <td>
                        Saunders Harmant
                    </td>
                    <td>
                        O'Kon-Wiegand
                    </td>
                    <td>
                        3
                    </td>
                    <td>
                        2
                    </td>
                </tr>
                <tr>
                    <td>
                        10819-6003
                    </td>
                    <td>
                        France
                    </td>
                    <td>
                        Rivesaltes
                    </td>
                    <td>
                        4981 Springs Center
                    </td>
                    <td>
                        Mellisa Laurencot
                    </td>
                    <td>
                        Jacobs Group
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        62750-003
                    </td>
                    <td>
                        Mongolia
                    </td>
                    <td>
                        Jargalant
                    </td>
                    <td>
                        94 Rutledge Way
                    </td>
                    <td>
                        Orland Myderscough
                    </td>
                    <td>
                        Gutkowski Inc
                    </td>
                    <td>
                        5
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        68647-122
                    </td>
                    <td>
                        Philippines
                    </td>
                    <td>
                        Cardona
                    </td>
                    <td>
                        4765 Service Hill
                    </td>
                    <td>
                        Devi Iglesias
                    </td>
                    <td>
                        Ullrich-Dibbert
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                </tr>
                <tr>
                    <td>
                        36987-3093
                    </td>
                    <td>
                        China
                    </td>
                    <td>
                        Jiantou
                    </td>
                    <td>
                        373 Northwestern Plaza
                    </td>
                    <td>
                        Bliss Tummasutti
                    </td>
                    <td>
                        Legros-Cummings
                    </td>
                    <td>
                        5
                    </td>
                    <td>
                        1
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>
                        OrderID
                    </th>
                    <th>
                        Country
                    </th>
                    <th>
                        ShipCity
                    </th>
                    <th>
                        ShipAddress
                    </th>
                    <th>
                        CompanyAgent
                    </th>
                    <th>
                        CompanyName
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Type
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
















@endsection 

@section('customJS')

<script src="{{asset('assets/demo/default/custom/crud/metronic-datatable/base/html-table.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/custom/crud/datatables/extensions/buttons.js')}}" type="text/javascript"></script>




<script>
    /* function editUtil(elem) {
        $('#yourModalId').modal('show');
        $('#id').val(elem.dataset.id);
        $('#firstname').val(elem.dataset.firstname);
        $('#lastname').val(elem.dataset.lastname);
        $('#recrutment_date').val(elem.dataset.recrutment);
        $('#matricule').val(elem.dataset.matricule);
        $('#entite').val(elem.dataset.entity);
    } */


/* Getting infos from the table to the modal */
    $("#Edit").on('show.bs.modal',function(e){
        var id = $(e.relatedTarget).data('id');
        
        $.ajax({

          url : '/Utilisateur/editUtilisateur/'+id, //Here you will fetch records 
          type : 'get',
          dataType: "json" ,
            
          success : function(data){
              console.log(data);
            $('#id').val(data['id']);
            $('#firstname').val(data['firstname']);
            $('#lastname').val(data['lastname']);
            $('#recrutment_date').val(data['recrutment_date']);
            $('#matricule').val(data['matricule']);
            $('#entite').val(data['entity_id']);
          }
        });
    });


</script>

@endsection
