<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

@include('layouts.partials.header') <!-- Include Header -->

<body>
    @include('layouts.partials.sidebar') <!-- Include Sidebar -->

    <main id="main" class="main">
        @yield('content') <!-- Content of the page -->
    </main>

    @include('layouts.partials.footer') <!-- Include Footer -->

    @include('layouts.partials.scripts') <!-- Include Scripts -->
</body>

</html>
