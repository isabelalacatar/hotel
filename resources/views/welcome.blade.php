<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <!-- Index-->

        <title>W3.CSS Template</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
        </style>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


                <!-- Header -->
                <header class="w3-display-container w3-content" style="max-width:1500px;">
                    <img class="w3-image" src="/images/bg_1.jpg" alt="The Hotel" style="min-width:1000px" width="1500" height="800">
                    <div class="w3-display-left w3-padding w3-col l6 m8">
                        <div class="w3-container w3-red">
                            <h2><i class="fa fa-bed w3-margin-right"></i>Hotel Name</h2>
                        </div>
                        <div class="w3-container w3-white w3-padding-16">
                            <form action="/action_page.php" target="_blank">
                                <div class="w3-row-padding" style="margin:0 -16px;">
                                    <div class="w3-half w3-margin-bottom">
                                        <label><i class="fa fa-calendar-o"></i> Check In</label>
                                        <input class="w3-input w3-border" type="text" placeholder="DD MM YYYY" name="CheckIn" required>
                                    </div>
                                    <div class="w3-half">
                                        <label><i class="fa fa-calendar-o"></i> Check Out</label>
                                        <input class="w3-input w3-border" type="text" placeholder="DD MM YYYY" name="CheckOut" required>
                                    </div>
                                </div>
                                <div class="w3-row-padding" style="margin:8px -16px;">
                                    <div class="w3-half w3-margin-bottom">
                                        <label><i class="fa fa-male"></i> Adults</label>
                                        <input class="w3-input w3-border" type="number" value="1" name="Adults" min="1" max="6">
                                    </div>
                                    <div class="w3-half">
                                        <label><i class="fa fa-child"></i> Kids</label>
                                        <input class="w3-input w3-border" type="number" value="0" name="Kids" min="0" max="6">
                                    </div>
                                </div>
                                <button class="w3-button w3-dark-grey" type="submit"><i class="fa fa-search w3-margin-right"></i> Search availability</button>
                                <a href="#contact" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Book Now</a>
                            </form>
                        </div>
                    </div>
                </header>


                    <!-- End page content -->
                </div>




        </div>
    </body>
</html>
