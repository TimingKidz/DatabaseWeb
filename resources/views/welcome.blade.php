
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

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                
                <div>
                    <?php
                    $someArray = json_decode($data2, true);
                    foreach ($someArray as $a) {
                        echo $a["productName"];
                        echo "<br>";
                        
                    }
                    
                    
                    
                    
                    ?>

                    
                     
                </div>

            </div>
        </div>
    </body>
</html>

<?php
                                                $arr=json_decode($jsproductlist,true);
                                                $i = 0;
                                                foreach ($arr as $a) {
                                                  echo " <tr>
                                                            <td class=\"text-center text-muted\"> $i</td>
                                                            <td>
                                                                <div class=\"widget-content p-0\">
                                                                    <div class=\"widget-content-wrapper\">
                                                                        <div class=\"widget-content-left mr-3\">
                                                                            <div class=\"widget-content-left\">
                                                                                <img width=\"40\" class=\"rounded-circle\" src=\"assets/images/avatars/4.jpg\">
                                                                                </div>
                                                                            </div>
                                                                            <div class=\"widget-content-left flex2\">
                                                                                <div class=\"widget-heading\">$a[productName]</div>
                                                                                    <div class=\"widget-subheading opacity-7\">$a[productLine]</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class=\"text-center\">$a[quantityInStock]</td>
                                                                <td class=\"text-center\">
                                                                    <div class=\"text-center\">$a[MSRP]</div>
                                                                </td>
                                                                <td class=\"text-center\">
                                                                    <button type=\"button\" id=\"PopoverCustomT-1\" class=\"btn btn-primary btn-sm\">Details</button>
                                                            </td>
                                                        </tr>";
                                                 $i = $i + 1 ;
                                                }
                                            ?>