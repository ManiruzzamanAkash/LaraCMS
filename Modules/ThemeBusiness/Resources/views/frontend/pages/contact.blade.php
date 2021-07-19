@extends('themebusiness::frontend.layouts.master')

@section('title')
Home | {{ config('app.name') }}
@endsection

@section('main-content')

<div role="main" class="main">

    <section class="page-header page-header-modern page-header-lg bg-tertiary border-0 my-0">
        <div class="container my-3">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-10">contact</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li>
                            <a href="">Home</a>
                        </li>
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section border-0 py-0 m-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="row py-5 my-5">
                        <div class="col-md-6">
                            <h2 class="
                      font-weight-bold
                      text-color-secondary text-6 text-lg-5 text-xl-6
                      mb-3
                      appear-animation
                      animated
                      fadeInUpShorter
                      appear-animation-visible
                    " data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300" style="animation-delay: 300ms">
                                Get In Touch
                            </h2>
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
                                <h3 class="
                        font-weight-bold
                        text-color-secondary
                        text-transform-none
                        text-4
                        text-lg-3
                        mb-0
                      ">
                                    Work Inquiries
                                </h3>
                                <a href="tel:+1234567890" class="
                        d-inline-block
                        text-color-default
                        text-color-hover-primary
                        text-decoration-none
                        mb-4
                      ">(800) 123-4567</a>
                            </div>
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">
                                <h3 class="
                        font-weight-bold
                        text-color-secondary
                        text-transform-none
                        text-4
                        text-lg-3
                        mb-0
                      ">
                                    Careers &amp; Press
                                </h3>
                                <a href="tel:+1234567890" class="
                        d-inline-block
                        text-color-default
                        text-color-hover-primary
                        text-decoration-none
                        mb-4
                      ">(800) 123-4567</a>
                            </div>
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
                                <h3 class="
                        font-weight-bold
                        text-color-secondary
                        text-transform-none
                        text-4
                        text-lg-3
                        mb-0
                      ">
                                    Assistance Hours
                                </h3>
                                <p>
                                    Mon - Sat 9:00am - 8:00pm<br />
                                    Sunday - CLOSED
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2 class="
                      font-weight-bold
                      text-color-secondary text-6 text-lg-5 text-xl-6
                      mb-3
                      appear-animation
                      animated
                      fadeInUpShorter
                      appear-animation-visible
                    " data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100" style="animation-delay: 1100ms">
                                Post Address and Mail
                            </h2>
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300">
                                <h3 class="
                        font-weight-bold
                        text-color-secondary
                        text-transform-none
                        text-4
                        text-lg-3
                        mb-0
                      ">
                                    Address
                                </h3>
                                <p>
                                    12345 . <br />Suite 1500 <br />Los Angeles,
                                    California 90000
                                </p>
                            </div>
                            <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1500">
                                <h3 class="
                        font-weight-bold
                        text-color-secondary
                        text-transform-none
                        text-4
                        text-lg-3
                        mb-0
                      ">
                                    Email
                                </h3>
                                <a href="mailto:mail@example.com" class="
                        text-color-default
                        text-color-hover-primary
                        text-decoration-underline
                        mb-4
                      ">mail@example.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 fluid-col-lg-5 p-0">
                    <div class="fluid-col h-100">
                        <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
                        <div id="googlemaps" class="google-map h-100 m-0" style="
                    min-height: 400px;
                    position: relative;
                    overflow: hidden;
                  ">
                            <div style="
                      height: 100%;
                      width: 100%;
                      position: absolute;
                      top: 0px;
                      left: 0px;
                      background-color: rgb(229, 227, 223);
                    ">
                                <div class="gm-style" style="
                        position: absolute;
                        z-index: 0;
                        left: 0px;
                        top: 0px;
                        height: 100%;
                        width: 100%;
                        padding: 0px;
                        border-width: 0px;
                        margin: 0px;
                      ">
                                    <div>
                                        <button draggable="false" aria-label="Keyboard shortcuts" title="Keyboard shortcuts" type="button" style="
                            background: none transparent;
                            display: block;
                            border: none;
                            margin: 0px;
                            padding: 0px;
                            text-transform: none;
                            appearance: none;
                            position: absolute;
                            cursor: pointer;
                            user-select: none;
                            z-index: 1000002;
                            left: -100000px;
                            top: -100000px;
                          "></button>
                                    </div>
                                    <div tabindex="0" aria-label="Map" aria-roledescription="map" role="group" style="
                          position: absolute;
                          z-index: 0;
                          left: 0px;
                          top: 0px;
                          height: 100%;
                          width: 100%;
                          padding: 0px;
                          border-width: 0px;
                          margin: 0px;
                          cursor: url('https://maps.gstatic.com/mapfiles/openhand_8_8.cur'),
                            default;
                          touch-action: pan-x pan-y;
                        ">
                                        <div style="
                            z-index: 1;
                            position: absolute;
                            left: 50%;
                            top: 50%;
                            width: 100%;
                            transform: translate(0px, 0px);
                          ">
                                            <div style="
                              position: absolute;
                              left: 0px;
                              top: 0px;
                              z-index: 100;
                              width: 100%;
                            ">
                                                <div style="
                                position: absolute;
                                left: 0px;
                                top: 0px;
                                z-index: 0;
                              ">
                                                    <div style="
                                  position: absolute;
                                  z-index: 987;
                                  transform: matrix(1, 0, 0, 1, -199, -220);
                                ">
                                                        <div style="
                                    position: absolute;
                                    left: 0px;
                                    top: 0px;
                                    width: 256px;
                                    height: 256px;
                                  ">
                                                            <div style="width: 256px; height: 256px"></div>
                                                        </div>
                                                        <div style="
                                    position: absolute;
                                    left: -256px;
                                    top: 0px;
                                    width: 256px;
                                    height: 256px;
                                  ">
                                                            <div style="width: 256px; height: 256px"></div>
                                                        </div>
                                                        <div style="
                                    position: absolute;
                                    left: -256px;
                                    top: -256px;
                                    width: 256px;
                                    height: 256px;
                                  ">
                                                            <div style="width: 256px; height: 256px"></div>
                                                        </div>
                                                        <div style="
                                    position: absolute;
                                    left: 0px;
                                    top: -256px;
                                    width: 256px;
                                    height: 256px;
                                  ">
                                                            <div style="width: 256px; height: 256px"></div>
                                                        </div>
                                                        <div style="
                                    position: absolute;
                                    left: 256px;
                                    top: -256px;
                                    width: 256px;
                                    height: 256px;
                                  ">
                                                            <div style="width: 256px; height: 256px"></div>
                                                        </div>
                                                        <div style="
                                    position: absolute;
                                    left: 256px;
                                    top: 0px;
                                    width: 256px;
                                    height: 256px;
                                  ">
                                                            <div style="width: 256px; height: 256px"></div>
                                                        </div>
                                                        <div style="
                                    position: absolute;
                                    left: 256px;
                                    top: 256px;
                                    width: 256px;
                                    height: 256px;
                                  ">
                                                            <div style="width: 256px; height: 256px"></div>
                                                        </div>
                                                        <div style="
                                    position: absolute;
                                    left: 0px;
                                    top: 256px;
                                    width: 256px;
                                    height: 256px;
                                  ">
                                                            <div style="width: 256px; height: 256px"></div>
                                                        </div>
                                                        <div style="
                                    position: absolute;
                                    left: -256px;
                                    top: 256px;
                                    width: 256px;
                                    height: 256px;
                                  ">
                                                            <div style="width: 256px; height: 256px"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="
                              position: absolute;
                              left: 0px;
                              top: 0px;
                              z-index: 101;
                              width: 100%;
                            "></div>
                                            <div style="
                              position: absolute;
                              left: 0px;
                              top: 0px;
                              z-index: 102;
                              width: 100%;
                            "></div>
                                            <div style="
                              position: absolute;
                              left: 0px;
                              top: 0px;
                              z-index: 103;
                              width: 100%;
                            ">
                                                <div style="
                                position: absolute;
                                left: 0px;
                                top: 0px;
                                z-index: -1;
                              ">
                                                    <div style="
                                  position: absolute;
                                  z-index: 987;
                                  transform: matrix(1, 0, 0, 1, -199, -220);
                                ">
                                                        <div style="
                                    width: 256px;
                                    height: 256px;
                                    overflow: hidden;
                                    position: absolute;
                                    left: 0px;
                                    top: 0px;
                                  "></div>
                                                        <div style="
                                    width: 256px;
                                    height: 256px;
                                    overflow: hidden;
                                    position: absolute;
                                    left: -256px;
                                    top: 0px;
                                  "></div>
                                                        <div style="
                                    width: 256px;
                                    height: 256px;
                                    overflow: hidden;
                                    position: absolute;
                                    left: -256px;
                                    top: -256px;
                                  "></div>
                                                        <div style="
                                    width: 256px;
                                    height: 256px;
                                    overflow: hidden;
                                    position: absolute;
                                    left: 0px;
                                    top: -256px;
                                  "></div>
                                                        <div style="
                                    width: 256px;
                                    height: 256px;
                                    overflow: hidden;
                                    position: absolute;
                                    left: 256px;
                                    top: -256px;
                                  "></div>
                                                        <div style="
                                    width: 256px;
                                    height: 256px;
                                    overflow: hidden;
                                    position: absolute;
                                    left: 256px;
                                    top: 0px;
                                  "></div>
                                                        <div style="
                                    width: 256px;
                                    height: 256px;
                                    overflow: hidden;
                                    position: absolute;
                                    left: 256px;
                                    top: 256px;
                                  "></div>
                                                        <div style="
                                    width: 256px;
                                    height: 256px;
                                    overflow: hidden;
                                    position: absolute;
                                    left: 0px;
                                    top: 256px;
                                  "></div>
                                                        <div style="
                                    width: 256px;
                                    height: 256px;
                                    overflow: hidden;
                                    position: absolute;
                                    left: -256px;
                                    top: 256px;
                                  "></div>
                                                    </div>
                                                </div>
                                                <div style="
                                width: 31px;
                                height: 40px;
                                overflow: hidden;
                                position: absolute;
                                left: -14px;
                                top: -40px;
                                z-index: 0;
                              ">
                                                    <img alt="" src="img/map-pin.png" draggable="false" style="
                                  position: absolute;
                                  left: 0px;
                                  top: 0px;
                                  user-select: none;
                                  border: 0px;
                                  padding: 0px;
                                  margin: 0px;
                                  max-width: none;
                                  width: 31px;
                                  height: 40px;
                                " />
                                                </div>
                                            </div>
                                            <div style="
                              position: absolute;
                              left: 0px;
                              top: 0px;
                              z-index: 0;
                            ">
                                                <div style="
                                position: absolute;
                                z-index: 987;
                                transform: matrix(1, 0, 0, 1, -199, -220);
                              ">
                                                    <div style="
                                  position: absolute;
                                  left: 0px;
                                  top: 0px;
                                  width: 256px;
                                  height: 256px;
                                  transition: opacity 200ms linear 0s;
                                ">
                                                        <img draggable="false" alt="" role="presentation" src="img/vt" style="
                                    width: 256px;
                                    height: 256px;
                                    user-select: none;
                                    border: 0px;
                                    padding: 0px;
                                    margin: 0px;
                                    max-width: none;
                                  " />
                                                    </div>
                                                    <div style="
                                  position: absolute;
                                  left: -256px;
                                  top: 0px;
                                  width: 256px;
                                  height: 256px;
                                  transition: opacity 200ms linear 0s;
                                ">
                                                        <img draggable="false" alt="" role="presentation" src="img/vt(1)" style="
                                    width: 256px;
                                    height: 256px;
                                    user-select: none;
                                    border: 0px;
                                    padding: 0px;
                                    margin: 0px;
                                    max-width: none;
                                  " />
                                                    </div>
                                                    <div style="
                                  position: absolute;
                                  left: -256px;
                                  top: -256px;
                                  width: 256px;
                                  height: 256px;
                                  transition: opacity 200ms linear 0s;
                                ">
                                                        <img draggable="false" alt="" role="presentation" src="img/vt(2)" style="
                                    width: 256px;
                                    height: 256px;
                                    user-select: none;
                                    border: 0px;
                                    padding: 0px;
                                    margin: 0px;
                                    max-width: none;
                                  " />
                                                    </div>
                                                    <div style="
                                  position: absolute;
                                  left: 0px;
                                  top: -256px;
                                  width: 256px;
                                  height: 256px;
                                  transition: opacity 200ms linear 0s;
                                ">
                                                        <img draggable="false" alt="" role="presentation" src="img/vt(3)" style="
                                    width: 256px;
                                    height: 256px;
                                    user-select: none;
                                    border: 0px;
                                    padding: 0px;
                                    margin: 0px;
                                    max-width: none;
                                  " />
                                                    </div>
                                                    <div style="
                                  position: absolute;
                                  left: 256px;
                                  top: -256px;
                                  width: 256px;
                                  height: 256px;
                                  transition: opacity 200ms linear 0s;
                                ">
                                                        <img draggable="false" alt="" role="presentation" src="img/vt(4)" style="
                                    width: 256px;
                                    height: 256px;
                                    user-select: none;
                                    border: 0px;
                                    padding: 0px;
                                    margin: 0px;
                                    max-width: none;
                                  " />
                                                    </div>
                                                    <div style="
                                  position: absolute;
                                  left: 256px;
                                  top: 0px;
                                  width: 256px;
                                  height: 256px;
                                  transition: opacity 200ms linear 0s;
                                ">
                                                        <img draggable="false" alt="" role="presentation" src="img/vt(5)" style="
                                    width: 256px;
                                    height: 256px;
                                    user-select: none;
                                    border: 0px;
                                    padding: 0px;
                                    margin: 0px;
                                    max-width: none;
                                  " />
                                                    </div>
                                                    <div style="
                                  position: absolute;
                                  left: 256px;
                                  top: 256px;
                                  width: 256px;
                                  height: 256px;
                                  transition: opacity 200ms linear 0s;
                                ">
                                                        <img draggable="false" alt="" role="presentation" src="img/vt(6)" style="
                                    width: 256px;
                                    height: 256px;
                                    user-select: none;
                                    border: 0px;
                                    padding: 0px;
                                    margin: 0px;
                                    max-width: none;
                                  " />
                                                    </div>
                                                    <div style="
                                  position: absolute;
                                  left: 0px;
                                  top: 256px;
                                  width: 256px;
                                  height: 256px;
                                  transition: opacity 200ms linear 0s;
                                ">
                                                        <img draggable="false" alt="" role="presentation" src="img/vt(7)" style="
                                    width: 256px;
                                    height: 256px;
                                    user-select: none;
                                    border: 0px;
                                    padding: 0px;
                                    margin: 0px;
                                    max-width: none;
                                  " />
                                                    </div>
                                                    <div style="
                                  position: absolute;
                                  left: -256px;
                                  top: 256px;
                                  width: 256px;
                                  height: 256px;
                                  transition: opacity 200ms linear 0s;
                                ">
                                                        <img draggable="false" alt="" role="presentation" src="img/vt(8)" style="
                                    width: 256px;
                                    height: 256px;
                                    user-select: none;
                                    border: 0px;
                                    padding: 0px;
                                    margin: 0px;
                                    max-width: none;
                                  " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gm-style-pbc" style="
                            z-index: 2;
                            position: absolute;
                            height: 100%;
                            width: 100%;
                            padding: 0px;
                            border-width: 0px;
                            margin: 0px;
                            left: 0px;
                            top: 0px;
                            opacity: 0;
                          ">
                                            <p class="gm-style-pbt"></p>
                                        </div>
                                        <div style="
                            z-index: 3;
                            position: absolute;
                            height: 100%;
                            width: 100%;
                            padding: 0px;
                            border-width: 0px;
                            margin: 0px;
                            left: 0px;
                            top: 0px;
                            touch-action: pan-x pan-y;
                          ">
                                            <div style="
                              z-index: 4;
                              position: absolute;
                              left: 50%;
                              top: 50%;
                              width: 100%;
                              transform: translate(0px, 0px);
                            ">
                                                <div style="
                                position: absolute;
                                left: 0px;
                                top: 0px;
                                z-index: 104;
                                width: 100%;
                              "></div>
                                                <div style="
                                position: absolute;
                                left: 0px;
                                top: 0px;
                                z-index: 105;
                                width: 100%;
                              "></div>
                                                <div style="
                                position: absolute;
                                left: 0px;
                                top: 0px;
                                z-index: 106;
                                width: 100%;
                              ">
                                                    <div title="" role="button" tabindex="0" style="
                                  width: 31px;
                                  height: 40px;
                                  overflow: hidden;
                                  position: absolute;
                                  cursor: pointer;
                                  touch-action: none;
                                  left: -14px;
                                  top: -40px;
                                  z-index: 0;
                                ">
                                                        <img alt="" src="img/transparent.png" draggable="false" style="
                                    width: 31px;
                                    height: 40px;
                                    user-select: none;
                                    border: 0px;
                                    padding: 0px;
                                    margin: 0px;
                                    max-width: none;
                                  " />
                                                    </div>
                                                </div>
                                                <div style="
                                position: absolute;
                                left: 0px;
                                top: 0px;
                                z-index: 107;
                                width: 100%;
                              "></div>
                                            </div>
                                        </div>
                                    </div>
                                    <iframe aria-hidden="true" frameborder="0" tabindex="-1" style="
                          z-index: -1;
                          position: absolute;
                          width: 100%;
                          height: 100%;
                          top: 0px;
                          left: 0px;
                          border: none;
                        " src="./Contact_files/saved_resource.html"></iframe>
                                    <div style="
                          pointer-events: none;
                          width: 100%;
                          height: 100%;
                          box-sizing: border-box;
                          position: absolute;
                          z-index: 1000002;
                          opacity: 0;
                          border: 2px solid rgb(26, 115, 232);
                        "></div>
                                    <div>
                                        <div class="gmnoprint" style="
                            margin: 10px;
                            z-index: 0;
                            position: absolute;
                            cursor: pointer;
                            left: 0px;
                            top: 0px;
                          ">
                                            <div class="gm-style-mtc" style="float: left; position: relative">
                                                <button draggable="false" aria-label="Show street map" title="Show street map" type="button" aria-pressed="false" style="
                                background: none padding-box
                                  rgb(255, 255, 255);
                                display: table-cell;
                                border: 0px;
                                margin: 0px;
                                padding: 0px 17px;
                                text-transform: none;
                                appearance: none;
                                position: relative;
                                cursor: pointer;
                                user-select: none;
                                direction: ltr;
                                overflow: hidden;
                                text-align: center;
                                height: 40px;
                                vertical-align: middle;
                                color: rgb(86, 86, 86);
                                font-family: Roboto, Arial, sans-serif;
                                font-size: 18px;
                                border-bottom-left-radius: 2px;
                                border-top-left-radius: 2px;
                                box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;
                                min-width: 35px;
                              " id="354F2D80-9928-4013-BF5D-F1ED60B5FE76" aria-expanded="false">
                                                    Map
                                                </button>
                                                <ul role="menu" aria-labelledby="354F2D80-9928-4013-BF5D-F1ED60B5FE76" style="
                                background-color: white;
                                list-style: none;
                                padding: 2px;
                                margin: 0px;
                                z-index: -1;
                                border-bottom-left-radius: 2px;
                                border-bottom-right-radius: 2px;
                                box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;
                                position: absolute;
                                left: 0px;
                                top: 40px;
                                text-align: left;
                                display: none;
                              ">
                                                    <li tabindex="-1" role="menuitemcheckbox" aria-label="Show street map with terrain" draggable="false" title="Show street map with terrain" aria-checked="false" style="
                                  color: black;
                                  font-family: Roboto, Arial, sans-serif;
                                  user-select: none;
                                  font-size: 18px;
                                  background-color: rgb(255, 255, 255);
                                  padding: 5px 8px 5px 5px;
                                  direction: ltr;
                                  text-align: left;
                                  white-space: nowrap;
                                ">
                                                        <span><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22/%3E%3Cpath%20d%3D%22M19%203H5c-1.11%200-2%20.9-2%202v14c0%201.1.89%202%202%202h14c1.11%200%202-.9%202-2V5c0-1.1-.89-2-2-2zm-9%2014l-5-5%201.41-1.41L10%2014.17l7.59-7.59L19%208l-9%209z%22/%3E%3C/svg%3E" alt="" style="
                                      height: 1em;
                                      width: 1em;
                                      transform: translateY(0.15em);
                                      display: none;
                                    " /><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M19%205v14H5V5h14m0-2H5c-1.1%200-2%20.9-2%202v14c0%201.1.9%202%202%202h14c1.1%200%202-.9%202-2V5c0-1.1-.9-2-2-2z%22/%3E%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22/%3E%3C/svg%3E" alt="" style="
                                      height: 1em;
                                      width: 1em;
                                      transform: translateY(0.15em);
                                    " /></span><label style="cursor: inherit">Terrain</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="gm-style-mtc" style="float: left; position: relative">
                                                <button draggable="false" aria-label="Show satellite imagery" title="Show satellite imagery" type="button" aria-pressed="false" style="
                                background: none padding-box
                                  rgb(255, 255, 255);
                                display: table-cell;
                                border: 0px;
                                margin: 0px;
                                padding: 0px 17px;
                                text-transform: none;
                                appearance: none;
                                position: relative;
                                cursor: pointer;
                                user-select: none;
                                direction: ltr;
                                overflow: hidden;
                                text-align: center;
                                height: 40px;
                                vertical-align: middle;
                                color: rgb(86, 86, 86);
                                font-family: Roboto, Arial, sans-serif;
                                font-size: 18px;
                                border-bottom-right-radius: 2px;
                                border-top-right-radius: 2px;
                                box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;
                                min-width: 64px;
                              " id="DCC9EEE4-603C-4B04-BEC3-97A2CA700D17" aria-expanded="false">
                                                    Satellite
                                                </button>
                                                <ul role="menu" aria-labelledby="DCC9EEE4-603C-4B04-BEC3-97A2CA700D17" style="
                                background-color: white;
                                list-style: none;
                                padding: 2px;
                                margin: 0px;
                                z-index: -1;
                                border-bottom-left-radius: 2px;
                                border-bottom-right-radius: 2px;
                                box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;
                                position: absolute;
                                right: 0px;
                                top: 40px;
                                text-align: left;
                                display: none;
                              ">
                                                    <li tabindex="-1" role="menuitemcheckbox" aria-label="Show imagery with street names" draggable="false" title="Show imagery with street names" aria-checked="true" style="
                                  color: black;
                                  font-family: Roboto, Arial, sans-serif;
                                  user-select: none;
                                  font-size: 18px;
                                  background-color: rgb(255, 255, 255);
                                  padding: 5px 8px 5px 5px;
                                  direction: ltr;
                                  text-align: left;
                                  white-space: nowrap;
                                ">
                                                        <span><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22/%3E%3Cpath%20d%3D%22M19%203H5c-1.11%200-2%20.9-2%202v14c0%201.1.89%202%202%202h14c1.11%200%202-.9%202-2V5c0-1.1-.89-2-2-2zm-9%2014l-5-5%201.41-1.41L10%2014.17l7.59-7.59L19%208l-9%209z%22/%3E%3C/svg%3E" alt="" style="
                                      height: 1em;
                                      width: 1em;
                                      transform: translateY(0.15em);
                                    " /><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20d%3D%22M19%205v14H5V5h14m0-2H5c-1.1%200-2%20.9-2%202v14c0%201.1.9%202%202%202h14c1.1%200%202-.9%202-2V5c0-1.1-.9-2-2-2z%22/%3E%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22/%3E%3C/svg%3E" alt="" style="
                                      height: 1em;
                                      width: 1em;
                                      transform: translateY(0.15em);
                                      display: none;
                                    " /></span><label style="cursor: inherit">Labels</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div>
                                        <button draggable="false" aria-label="Toggle fullscreen view" title="Toggle fullscreen view" type="button" class="gm-control-active gm-fullscreen-control" style="
                            background: none rgb(255, 255, 255);
                            border: 0px;
                            margin: 10px;
                            padding: 0px;
                            text-transform: none;
                            appearance: none;
                            position: absolute;
                            cursor: pointer;
                            user-select: none;
                            border-radius: 2px;
                            height: 40px;
                            width: 40px;
                            box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;
                            overflow: hidden;
                            display: none;
                            top: 0px;
                            right: 0px;
                          ">
                                            <img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px" /><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px" /><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px" />
                                        </button>
                                    </div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div>
                                        <div class="
                            gmnoprint
                            gm-bundled-control gm-bundled-control-on-bottom
                          " draggable="false" controlwidth="40" controlheight="153" style="
                            margin: 10px;
                            user-select: none;
                            position: absolute;
                            bottom: 167px;
                            right: 40px;
                          ">
                                            <div class="gm-svpc" dir="ltr" title="Drag Pegman onto the map to open Street View" controlwidth="40" controlheight="40" style="
                              background-color: rgb(255, 255, 255);
                              box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;
                              border-radius: 2px;
                              width: 40px;
                              height: 40px;
                              cursor: url('https://maps.gstatic.com/mapfiles/openhand_8_8.cur'),
                                default;
                              touch-action: none;
                              position: absolute;
                              left: 0px;
                              top: 0px;
                            ">
                                                <div style="position: absolute; left: 50%; top: 50%"></div>
                                                <div style="position: absolute; left: 50%; top: 50%">
                                                    <img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2023%2038%22%3E%3Cpath%20d%3D%22M16.6%2038.1h-5.5l-.2-2.9-.2%202.9h-5.5L5%2025.3l-.8%202a1.53%201.53%200%2001-1.9.9l-1.2-.4a1.58%201.58%200%2001-1-1.9v-.1c.3-.9%203.1-11.2%203.1-11.2a2.66%202.66%200%20012.3-2l.6-.5a6.93%206.93%200%20014.7-12%206.8%206.8%200%20014.9%202%207%207%200%20012%204.9%206.65%206.65%200%2001-2.2%205l.7.5a2.78%202.78%200%20012.4%202s2.9%2011.2%202.9%2011.3a1.53%201.53%200%2001-.9%201.9l-1.3.4a1.63%201.63%200%2001-1.9-.9l-.7-1.8-.1%2012.7zm-3.6-2h1.7L14.9%2020.3l1.9-.3%202.4%206.3.3-.1c-.2-.8-.8-3.2-2.8-10.9a.63.63%200%2000-.6-.5h-.6l-1.1-.9h-1.9l-.3-2a4.83%204.83%200%20003.5-4.7A4.78%204.78%200%200011%202.3H10.8a4.9%204.9%200%2000-1.4%209.6l-.3%202h-1.9l-1%20.9h-.6a.74.74%200%2000-.6.5c-2%207.5-2.7%2010-3%2010.9l.3.1L4.8%2020l1.9.3.2%2015.8h1.6l.6-8.4a1.52%201.52%200%20011.5-1.4%201.5%201.5%200%20011.5%201.4l.9%208.4zm-10.9-9.6zm17.5-.1z%22%20style%3D%22isolation%3Aisolate%22%20fill%3D%22%23333%22%20opacity%3D%22.7%22/%3E%3Cpath%20d%3D%22M5.9%2013.6l1.1-.9h7.8l1.2.9%22%20fill%3D%22%23ce592c%22/%3E%3Cellipse%20cx%3D%2210.9%22%20cy%3D%2213.1%22%20rx%3D%222.7%22%20ry%3D%22.3%22%20style%3D%22isolation%3Aisolate%22%20fill%3D%22%23ce592c%22%20opacity%3D%22.5%22/%3E%3Cpath%20d%3D%22M20.6%2026.1l-2.9-11.3a1.71%201.71%200%2000-1.6-1.2H5.699999999999999a1.69%201.69%200%2000-1.5%201.3l-3.1%2011.3a.61.61%200%2000.3.7l1.1.4a.61.61%200%2000.7-.3l2.7-6.7.2%2016.8h3.6l.6-9.3a.47.47%200%2001.44-.5h.06c.4%200%20.4.2.5.5l.6%209.3h3.6L15.7%2020.3l2.5%206.6a.52.52%200%2000.66.31l1.2-.4a.57.57%200%2000.5-.7z%22%20fill%3D%22%23fdbf2d%22/%3E%3Cpath%20d%3D%22M7%2013.6l3.9%206.7%203.9-6.7%22%20style%3D%22isolation%3Aisolate%22%20fill%3D%22%23cf572e%22%20opacity%3D%22.6%22/%3E%3Ccircle%20cx%3D%2210.9%22%20cy%3D%227%22%20r%3D%225.9%22%20fill%3D%22%23fdbf2d%22/%3E%3C/svg%3E" aria-label="Street View Pegman Control" style="
                                  height: 30px;
                                  width: 30px;
                                  position: absolute;
                                  transform: translate(-50%, -50%);
                                  pointer-events: none;
                                " /><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2038%22%3E%3Cpath%20d%3D%22M22%2026.6l-2.9-11.3a2.78%202.78%200%2000-2.4-2l-.7-.5a6.82%206.82%200%20002.2-5%206.9%206.9%200%2000-13.8%200%207%207%200%20002.2%205.1l-.6.5a2.55%202.55%200%2000-2.3%202s-3%2011.1-3%2011.2v.1a1.58%201.58%200%20001%201.9l1.2.4a1.63%201.63%200%20001.9-.9l.8-2%20.2%2012.8h11.3l.2-12.6.7%201.8a1.54%201.54%200%20001.5%201%201.09%201.09%200%2000.5-.1l1.3-.4a1.85%201.85%200%2000.7-2zm-1.2.9l-1.2.4a.61.61%200%2001-.7-.3l-2.5-6.6-.2%2016.8h-9.4L6.6%2021l-2.7%206.7a.52.52%200%2001-.66.31l-1.1-.4a.52.52%200%2001-.31-.66l3.1-11.3a1.69%201.69%200%20011.5-1.3h.2l1-.9h2.3a5.9%205.9%200%20113.2%200h2.3l1.1.9h.2a1.71%201.71%200%20011.6%201.2l2.9%2011.3a.84.84%200%2001-.4.7z%22%20fill%3D%22%23333%22%20fill-opacity%3D%22.2%22/%3E%26quot%3B%3C/svg%3E" aria-label="Pegman is on top of the Map" style="
                                  display: none;
                                  height: 30px;
                                  width: 30px;
                                  position: absolute;
                                  transform: translate(-50%, -50%);
                                  pointer-events: none;
                                " /><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2040%2050%22%3E%3Cpath%20d%3D%22M34-30.4l-2.9-11.3a2.78%202.78%200%2000-2.4-2l-.7-.5a6.82%206.82%200%20002.2-5%206.9%206.9%200%2000-13.8%200%207%207%200%20002.2%205.1l-.6.5a2.55%202.55%200%2000-2.3%202s-3%2011.1-3%2011.2v.1a1.58%201.58%200%20001%201.9l1.2.4a1.63%201.63%200%20001.9-.9l.8-2%20.2%2012.8h11.3l.2-12.6.7%201.8a1.54%201.54%200%20001.5%201%201.09%201.09%200%2000.5-.1l1.3-.4a1.85%201.85%200%2000.7-2zm-1.2.9l-1.2.4a.61.61%200%2001-.7-.3L28.4-36l-.2%2016.8h-9.4L18.6-36l-2.7%206.7a.52.52%200%2001-.66.31l-1.1-.4a.52.52%200%2001-.31-.66l3.1-11.3a1.69%201.69%200%20011.5-1.3h.2l1-.9h2.3a5.9%205.9%200%20113.2%200h2.3l1.1.9h.2a1.71%201.71%200%20011.6%201.2l2.9%2011.3a.84.84%200%2001-.4.7zM34%2029.6l-2.9-11.3a2.78%202.78%200%2000-2.4-2l-.7-.5a6.82%206.82%200%20002.2-5%206.9%206.9%200%2000-13.8%200%207%207%200%20002.2%205.1l-.6.5a2.55%202.55%200%2000-2.3%202s-3%2011.1-3%2011.2v.1a1.58%201.58%200%20001%201.9l1.2.4a1.63%201.63%200%20001.9-.9l.8-2%20.2%2012.8h11.3l.2-12.6.7%201.8a1.54%201.54%200%20001.5%201%201.09%201.09%200%2000.5-.1l1.3-.4a1.85%201.85%200%2000.7-2zm-1.2.9l-1.2.4a.61.61%200%2001-.7-.3L28.4%2024l-.2%2016.8h-9.4L18.6%2024l-2.7%206.7a.52.52%200%2001-.66.31l-1.1-.4a.52.52%200%2001-.31-.66l3.1-11.3a1.69%201.69%200%20011.5-1.3h.2l1-.9h2.3a5.9%205.9%200%20113.2%200h2.3l1.1.9h.2a1.71%201.71%200%20011.6%201.2l2.9%2011.3a.84.84%200%2001-.4.7z%22%20fill%3D%22%23333%22%20fill-opacity%3D%22.2%22/%3E%3Cpath%20d%3D%22M15.4%2038.8h-4a1.64%201.64%200%2001-1.4-1.1l-3.1-8a.9.9%200%2001-.5.1l-1.4.1a1.62%201.62%200%2001-1.6-1.4L2.3%2015.4l1.6-1.3a6.87%206.87%200%2001-3-4.6A7.14%207.14%200%20012%204a7.6%207.6%200%20014.7-3.1A7.14%207.14%200%200112.2%202a7.28%207.28%200%20012.3%209.6l2.1-.1.1%201c0%20.2.1.5.1.8a2.41%202.41%200%20011%201s1.9%203.2%202.8%204.9c.7%201.2%202.1%204.2%202.8%205.9a2.1%202.1%200%2001-.8%202.6l-.6.4a1.63%201.63%200%2001-1.5.2l-.6-.3a8.93%208.93%200%2000.5%201.3%207.91%207.91%200%20001.8%202.6l.6.3v4.6l-4.5-.1a7.32%207.32%200%2001-2.5-1.5l-.4%203.6zm-10-19.2l3.5%209.8%202.9%207.5h1.6V35l-1.9-9.4%203.1%205.4a8.24%208.24%200%20003.8%203.8h2.1v-1.4a14%2014%200%2001-2.2-3.1%2044.55%2044.55%200%2001-2.2-8l-1.3-6.3%203.2%205.6c.6%201.1%202.1%203.6%202.8%204.9l.6-.4c-.8-1.6-2.1-4.6-2.8-5.8-.9-1.7-2.8-4.9-2.8-4.9a.54.54%200%2000-.4-.3l-.7-.1-.1-.7a4.33%204.33%200%2000-.1-.5l-5.3.3%202.2-1.9a4.3%204.3%200%2000.9-1%205.17%205.17%200%2000.8-4%205.67%205.67%200%2000-2.2-3.4%205.09%205.09%200%2000-4-.8%205.67%205.67%200%2000-3.4%202.2%205.17%205.17%200%2000-.8%204%205.67%205.67%200%20002.2%203.4%203.13%203.13%200%20001%20.5l1.6.6-3.2%202.6%201%2011.5h.4l-.3-8.2z%22%20fill%3D%22%23333%22/%3E%3Cpath%20d%3D%22M3.35%2015.9l1.1%2012.5a.39.39%200%2000.36.42h.14l1.4-.1a.66.66%200%2000.5-.4l-.2-3.8-3.3-8.6z%22%20fill%3D%22%23fdbf2d%22/%3E%3Cpath%20d%3D%22M5.2%2028.8l1.1-.1a.66.66%200%2000.5-.4l-.2-3.8-1.2-3.1z%22%20fill%3D%22%23ce592b%22%20fill-opacity%3D%22.25%22/%3E%3Cpath%20d%3D%22M21.4%2035.7l-3.8-1.2-2.7-7.8L12%2015.5l3.4-2.9c.2%202.4%202.2%2014.1%203.7%2017.1%200%200%201.3%202.6%202.3%203.1v2.9m-8.4-8.1l-2-.3%202.5%2010.1.9.4v-2.9%22%20fill%3D%22%23e5892b%22/%3E%3Cpath%20d%3D%22M17.8%2025.4c-.4-1.5-.7-3.1-1.1-4.8-.1-.4-.1-.7-.2-1.1l-1.1-2-1.7-1.6s.9%205%202.4%207.1a19.12%2019.12%200%20001.7%202.4z%22%20style%3D%22isolation%3Aisolate%22%20fill%3D%22%23cf572e%22%20opacity%3D%22.6%22/%3E%3Cpath%20d%3D%22M14.4%2037.8h-3a.43.43%200%2001-.4-.4l-3-7.8-1.7-4.8-3-9%208.9-.4s2.9%2011.3%204.3%2014.4c1.9%204.1%203.1%204.7%205%205.8h-3.2s-4.1-1.2-5.9-7.7a.59.59%200%2000-.6-.4.62.62%200%2000-.3.7s.5%202.4.9%203.6a34.87%2034.87%200%20002%206z%22%20fill%3D%22%23fdbf2d%22/%3E%3Cpath%20d%3D%22M15.4%2012.7l-3.3%202.9-8.9.4%203.3-2.7%22%20fill%3D%22%23ce592b%22/%3E%3Cpath%20d%3D%22M9.1%2021.1l1.4-6.2-5.9.5%22%20style%3D%22isolation%3Aisolate%22%20fill%3D%22%23cf572e%22%20opacity%3D%22.6%22/%3E%3Cpath%20d%3D%22M12%2013.5a4.75%204.75%200%2001-2.6%201.1c-1.5.3-2.9.2-2.9%200s1.1-.6%202.7-1%22%20fill%3D%22%23bb3d19%22/%3E%3Ccircle%20cx%3D%227.92%22%20cy%3D%228.19%22%20r%3D%226.3%22%20fill%3D%22%23fdbf2d%22/%3E%3Cpath%20d%3D%22M4.7%2013.6a6.21%206.21%200%20008.4-1.9v-.1a8.89%208.89%200%2001-8.4%202z%22%20fill%3D%22%23ce592b%22%20fill-opacity%3D%22.25%22/%3E%3Cpath%20d%3D%22M21.2%2027.2l.6-.4a1.09%201.09%200%2000.4-1.3c-.7-1.5-2.1-4.6-2.8-5.8-.9-1.7-2.8-4.9-2.8-4.9a1.6%201.6%200%2000-2.17-.65l-.23.15a1.68%201.68%200%2000-.4%202.1s2.3%203.9%203.1%205.3c.6%201%202.1%203.7%202.9%205.1a.94.94%200%20001.24.49l.16-.09z%22%20fill%3D%22%23fdbf2d%22/%3E%3Cpath%20d%3D%22M19.4%2019.8c-.9-1.7-2.8-4.9-2.8-4.9a1.6%201.6%200%2000-2.17-.65l-.23.15-.3.3c1.1%201.5%202.9%203.8%203.9%205.4%201.1%201.8%202.9%205%203.8%206.7l.1-.1a1.09%201.09%200%2000.4-1.3%2057.67%2057.67%200%2000-2.7-5.6z%22%20fill%3D%22%23ce592b%22%20fill-opacity%3D%22.25%22/%3E%3C/svg%3E" aria-label="Street View Pegman Control" style="
                                  display: none;
                                  height: 40px;
                                  width: 40px;
                                  position: absolute;
                                  transform: translate(-60%, -45%);
                                  pointer-events: none;
                                " />
                                                </div>
                                            </div>
                                            <div class="gmnoprint" controlwidth="40" controlheight="81" style="position: absolute; left: 0px; top: 72px">
                                                <div draggable="false" style="
                                user-select: none;
                                box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;
                                border-radius: 2px;
                                cursor: pointer;
                                background-color: rgb(255, 255, 255);
                                width: 40px;
                                height: 81px;
                              ">
                                                    <button draggable="false" aria-label="Zoom in" title="Zoom in" type="button" class="gm-control-active" style="
                                  background: none;
                                  display: block;
                                  border: 0px;
                                  margin: 0px;
                                  padding: 0px;
                                  text-transform: none;
                                  appearance: none;
                                  position: relative;
                                  cursor: pointer;
                                  user-select: none;
                                  overflow: hidden;
                                  width: 40px;
                                  height: 40px;
                                  top: 0px;
                                  left: 0px;
                                ">
                                                        <img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px" /><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px" /><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px" />
                                                    </button>
                                                    <div style="
                                  position: relative;
                                  overflow: hidden;
                                  width: 30px;
                                  height: 1px;
                                  margin: 0px 5px;
                                  background-color: rgb(230, 230, 230);
                                  top: 0px;
                                "></div>
                                                    <button draggable="false" aria-label="Zoom out" title="Zoom out" type="button" class="gm-control-active" style="
                                  background: none;
                                  display: block;
                                  border: 0px;
                                  margin: 0px;
                                  padding: 0px;
                                  text-transform: none;
                                  appearance: none;
                                  position: relative;
                                  cursor: pointer;
                                  user-select: none;
                                  overflow: hidden;
                                  width: 40px;
                                  height: 40px;
                                  top: 0px;
                                  left: 0px;
                                ">
                                                        <img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px" /><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px" /><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px" />
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div style="
                            margin-left: 5px;
                            margin-right: 5px;
                            z-index: 1000000;
                            position: absolute;
                            left: 0px;
                            bottom: 0px;
                          ">
                                            <a target="_blank" rel="noopener" href="https://maps.google.com/maps?ll=40.75198,-73.96978&amp;z=13&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" title="Open this area in Google Maps (opens a new window)" style="
                              position: static;
                              overflow: visible;
                              float: none;
                              display: inline;
                            ">
                                                <div style="
                                width: 66px;
                                height: 26px;
                                cursor: pointer;
                              ">
                                                    <img alt="" src="img/google_white5.png" draggable="false" style="
                                  position: absolute;
                                  left: 0px;
                                  top: 0px;
                                  width: 66px;
                                  height: 26px;
                                  user-select: none;
                                  border: 0px;
                                  padding: 0px;
                                  margin: 0px;
                                " />
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div></div>
                                    <div>
                                        <div class="gmnoprint" style="
                            z-index: 1000001;
                            position: absolute;
                            right: 302px;
                            bottom: 0px;
                          ">
                                            <div draggable="false" class="gm-style-cc" style="
                              user-select: none;
                              height: 14px;
                              line-height: 14px;
                            ">
                                                <div style="
                                opacity: 0.7;
                                width: 100%;
                                height: 100%;
                                position: absolute;
                              ">
                                                    <div style="width: 1px"></div>
                                                    <div style="
                                  background-color: rgb(245, 245, 245);
                                  width: auto;
                                  height: 100%;
                                  margin-left: 1px;
                                "></div>
                                                </div>
                                                <div style="
                                position: relative;
                                padding-right: 6px;
                                padding-left: 6px;
                                box-sizing: border-box;
                                font-family: Roboto, Arial, sans-serif;
                                font-size: 10px;
                                color: rgb(0, 0, 0);
                                white-space: nowrap;
                                direction: ltr;
                                text-align: right;
                                vertical-align: middle;
                                display: inline-block;
                              ">
                                                    <button draggable="false" aria-label="Keyboard shortcuts" title="Keyboard shortcuts" type="button" style="
                                  background: none;
                                  display: inline-block;
                                  border: 0px;
                                  margin: 0px;
                                  padding: 0px;
                                  text-transform: none;
                                  appearance: none;
                                  position: relative;
                                  cursor: pointer;
                                  user-select: none;
                                  color: rgb(0, 0, 0);
                                  font-family: inherit;
                                  line-height: inherit;
                                ">
                                                        Keyboard shortcuts
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gmnoprint" style="
                            z-index: 1000001;
                            position: absolute;
                            right: 181px;
                            bottom: 0px;
                            width: 121px;
                          ">
                                            <div draggable="false" class="gm-style-cc" style="
                              user-select: none;
                              height: 14px;
                              line-height: 14px;
                            ">
                                                <div style="
                                opacity: 0.7;
                                width: 100%;
                                height: 100%;
                                position: absolute;
                              ">
                                                    <div style="width: 1px"></div>
                                                    <div style="
                                  background-color: rgb(245, 245, 245);
                                  width: auto;
                                  height: 100%;
                                  margin-left: 1px;
                                "></div>
                                                </div>
                                                <div style="
                                position: relative;
                                padding-right: 6px;
                                padding-left: 6px;
                                box-sizing: border-box;
                                font-family: Roboto, Arial, sans-serif;
                                font-size: 10px;
                                color: rgb(0, 0, 0);
                                white-space: nowrap;
                                direction: ltr;
                                text-align: right;
                                vertical-align: middle;
                                display: inline-block;
                              ">
                                                    <button draggable="false" aria-label="Map Data" title="Map Data" type="button" style="
                                  background: none;
                                  display: none;
                                  border: 0px;
                                  margin: 0px;
                                  padding: 0px;
                                  text-transform: none;
                                  appearance: none;
                                  position: relative;
                                  cursor: pointer;
                                  user-select: none;
                                  color: rgb(0, 0, 0);
                                  font-family: inherit;
                                  line-height: inherit;
                                ">
                                                        Map Data</button><span>Map data ©2021 Google</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="
                            position: absolute;
                            user-select: none;
                            height: 14px;
                            line-height: 14px;
                            right: 71px;
                            bottom: 0px;
                          " draggable="false" class="gm-style-cc">
                                            <div style="
                              opacity: 0.7;
                              width: 100%;
                              height: 100%;
                              position: absolute;
                            ">
                                                <div style="width: 1px"></div>
                                                <div style="
                                background-color: rgb(245, 245, 245);
                                width: auto;
                                height: 100%;
                                margin-left: 1px;
                              "></div>
                                            </div>
                                            <div style="
                              position: relative;
                              padding-right: 6px;
                              padding-left: 6px;
                              box-sizing: border-box;
                              font-family: Roboto, Arial, sans-serif;
                              font-size: 10px;
                              color: rgb(0, 0, 0);
                              white-space: nowrap;
                              direction: ltr;
                              text-align: right;
                              vertical-align: middle;
                              display: inline-block;
                            ">
                                                <span>1 km&nbsp;</span>
                                                <div style="
                                position: relative;
                                display: inline-block;
                                height: 8px;
                                bottom: -1px;
                                width: 73px;
                              ">
                                                    <div style="
                                  width: 100%;
                                  height: 4px;
                                  position: absolute;
                                  left: 0px;
                                  top: 0px;
                                "></div>
                                                    <div style="
                                  width: 4px;
                                  height: 8px;
                                  left: 0px;
                                  top: 0px;
                                  background-color: rgb(255, 255, 255);
                                "></div>
                                                    <div style="
                                  width: 4px;
                                  height: 8px;
                                  position: absolute;
                                  background-color: rgb(255, 255, 255);
                                  right: 0px;
                                  bottom: 0px;
                                "></div>
                                                    <div style="
                                  position: absolute;
                                  background-color: rgb(102, 102, 102);
                                  height: 2px;
                                  left: 1px;
                                  bottom: 1px;
                                  right: 1px;
                                "></div>
                                                    <div style="
                                  position: absolute;
                                  width: 2px;
                                  height: 6px;
                                  left: 1px;
                                  top: 1px;
                                  background-color: rgb(102, 102, 102);
                                "></div>
                                                    <div style="
                                  width: 2px;
                                  height: 6px;
                                  position: absolute;
                                  background-color: rgb(102, 102, 102);
                                  bottom: 1px;
                                  right: 1px;
                                "></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gmnoprint gm-style-cc" draggable="false" style="
                            z-index: 1000001;
                            user-select: none;
                            height: 14px;
                            line-height: 14px;
                            position: absolute;
                            right: 0px;
                            bottom: 0px;
                          ">
                                            <div style="
                              opacity: 0.7;
                              width: 100%;
                              height: 100%;
                              position: absolute;
                            ">
                                                <div style="width: 1px"></div>
                                                <div style="
                                background-color: rgb(245, 245, 245);
                                width: auto;
                                height: 100%;
                                margin-left: 1px;
                              "></div>
                                            </div>
                                            <div style="
                              position: relative;
                              padding-right: 6px;
                              padding-left: 6px;
                              box-sizing: border-box;
                              font-family: Roboto, Arial, sans-serif;
                              font-size: 10px;
                              color: rgb(0, 0, 0);
                              white-space: nowrap;
                              direction: ltr;
                              text-align: right;
                              vertical-align: middle;
                              display: inline-block;
                            ">
                                                <a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" rel="noopener" style="
                                text-decoration: none;
                                cursor: pointer;
                                color: rgb(0, 0, 0);
                              ">Terms of Use</a>
                                            </div>
                                        </div>
                                        <div draggable="false" class="gm-style-cc" style="
                            user-select: none;
                            height: 14px;
                            line-height: 14px;
                            display: none;
                            position: absolute;
                            right: 0px;
                            bottom: 0px;
                          ">
                                            <div style="
                              opacity: 0.7;
                              width: 100%;
                              height: 100%;
                              position: absolute;
                            ">
                                                <div style="width: 1px"></div>
                                                <div style="
                                background-color: rgb(245, 245, 245);
                                width: auto;
                                height: 100%;
                                margin-left: 1px;
                              "></div>
                                            </div>
                                            <div style="
                              position: relative;
                              padding-right: 6px;
                              padding-left: 6px;
                              box-sizing: border-box;
                              font-family: Roboto, Arial, sans-serif;
                              font-size: 10px;
                              color: rgb(0, 0, 0);
                              white-space: nowrap;
                              direction: ltr;
                              text-align: right;
                              vertical-align: middle;
                              display: inline-block;
                            ">
                                                <a target="_blank" rel="noopener" title="Report errors in the road map or imagery to Google" dir="ltr" href="https://www.google.com/maps/@40.75198,-73.96978,13z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="
                                font-family: Roboto, Arial, sans-serif;
                                font-size: 10px;
                                color: rgb(0, 0, 0);
                                text-decoration: none;
                                position: relative;
                              ">Report a map error</a>
                                            </div>
                                        </div>
                                        <div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px">
                                            <div style="
                              font-family: Roboto, Arial, sans-serif;
                              font-size: 11px;
                              color: rgb(0, 0, 0);
                              direction: ltr;
                              text-align: right;
                              background-color: rgb(245, 245, 245);
                            ">
                                                Map data ©2021 Google
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container py-5 mt-5">
        <div class="row pb-2 mb-4">
            <div class="col">
                <div class="d-flex align-items-center mb-2">
                    <span class="custom-line appear-animation" data-appear-animation="customLineAnimation" appear-animation-duration="1s"></span>
                    <div class="overflow-hidden ms-3">
                        <h2 class="text-color-primary font-weight-semibold line-height-3 text-4 mb-0 appear-animation" data-appear-animation="maskRight" data-appear-animation-delay="1000">GET IN TOUCH</h2>
                    </div>
                </div>
                <h3 class="text-color-secondary font-weight-bold text-transform-none line-height-2 text-8 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">Send Us a Message</h3>
            </div>
        </div>
        <div class="row pb-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400">
            <div class="col">
                <form class="contact-form custom-form-style-1" action="/php/contact-form.php" method="POST" novalidate="novalidate">
                    <div class="contact-form-success alert alert-success d-none mt-4">
                        <strong>Success!</strong> Your message has been sent to us.
                    </div>

                    <div class="contact-form-error alert alert-danger d-none mt-4">
                        <strong>Error!</strong> There was an error sending your message.
                        <span class="mail-error-message text-1 d-block"></span>
                    </div>

                    <div class="row row-gutter-sm">
                        <div class="form-group col-lg-6 mb-4">
                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required="" placeholder="Your Name">
                        </div>
                        <div class="form-group col-lg-6 mb-4">
                            <input type="text" value="" data-msg-required="Please enter your phone number." maxlength="100" class="form-control" name="phone" id="phone" required="" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="row row-gutter-sm">
                        <div class="form-group col-lg-6 mb-4">
                            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required="" placeholder="Your Name">
                        </div>
                        <div class="form-group col-lg-6 mb-4">
                            <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required="" placeholder="Subject">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col mb-4">
                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message" required="" placeholder="Your Message"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col mb-0">
                            <button type="submit" class="btn btn-primary btn-modern font-weight-bold text-3 px-5 py-3" data-loading-text="Loading...">SEND MESSAGE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
