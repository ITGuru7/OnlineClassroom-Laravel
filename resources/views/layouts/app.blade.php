<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>

    <div id="app">

        @include('layouts.header')

        <main class="container">

            <header>
                @yield('navbar')
            </header>

            <div id="main">
                <div class="card">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>

            <footer>
                <div class="card">
                    <div class="card-header">
                        About Us & Contact Us
                    </div>
                    <div class="card-body">
                        <a href="mailto:yahia8nasir@gmail.como">yahia8nasir@gmail.com</a><br>
                        +60 18-224 0017<br>
                        Working hours (8am-5pm)
                    </div>
                </div>
            </footer>

        </main>

    </div>

</body>
</html>
