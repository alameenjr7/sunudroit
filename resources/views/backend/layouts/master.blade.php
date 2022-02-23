<!DOCTYPE html>
<html lang="en" dir="">

<head>
    @include('backend.layouts.head')
    <style>
        /* .no-overflow{
            white-space: no-wrap;
            text-overflow: ellipsis;
            overflow: hidden;
        } */
    </style>
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-compact sidebar-dark-purple sidenav-open clearfix">

        @include('backend.layouts.sidebar')

        <div class="main-content-wrap d-flex flex-column">
            <div class="main-header">
                @include('backend.layouts.header')
            </div>

            @yield('content')
        </div>
    </div>

    @include('backend.layouts.script')
</body>
</html>