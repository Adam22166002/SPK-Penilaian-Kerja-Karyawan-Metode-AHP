<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>@yield('title', 'Login SPK')</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
    <script data-search-pseudo-elements defer 
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" 
        crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-white">

    <main>
        @yield('auth')
    </main>

    <footer class="footer-admin mt-auto text-dark py-3">
        <div class="container text-center small">
            <p>Copyright © Designed &amp; Developed by <a href="https://synergyteam.id/" target="_blank">SynergyTeam.id</a> 2025</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    <script>
        feather.replace();
    </script>

</body>
</html>
