<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield("title",config("app.name"))</title>
    @include("layouts.partials.header")
    @yield("head")
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body id="commerce">
@include("layouts.partials.navbar")
@yield("content")
@include("layouts.partials.footer")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@yield("footer")
</body>
</html>
