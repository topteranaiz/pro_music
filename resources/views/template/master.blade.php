<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>music</title>

  <!-- FAVICON -->
  <link href="data/S__48234500.jpg" rel="shortcut icon">
  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="/template/pro_music/themes/classimax-premium/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/template/pro_music/themes/classimax-premium/plugins/bootstrap/css/bootstrap-slider.css">
  <!-- Font Awesome -->
  <link href="/template/pro_music/themes/classimax-premium/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="/template/pro_music/themes/classimax-premium/plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="/template/pro_music/themes/classimax-premium/plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="/template/pro_music/themes/classimax-premium/plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="/template/pro_music/themes/classimax-premium/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="/template/pro_music/themes/classimax-premium/css/style.css" rel="stylesheet">
  @yield('css')


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="body-wrapper">

@include('template.partials.header')

  @yield('content')



{{-- @include('template.partials.footer') --}}


<!-- JAVASCRIPTS -->
<script src="/template/pro_music/themes/classimax-premium/plugins/jQuery/jquery.min.js"></script>
<script src="/template/pro_music/themes/classimax-premium/plugins/bootstrap/js/popper.min.js"></script>
<script src="/template/pro_music/themes/classimax-premium/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/template/pro_music/themes/classimax-premium/plugins/bootstrap/js/bootstrap-slider.js"></script>
  <!-- tether js -->
<script src="/template/pro_music/themes/classimax-premium/plugins/tether/js/tether.min.js"></script>
<script src="/template/pro_music/themes/classimax-premium/plugins/raty/jquery.raty-fa.js"></script>
<script src="/template/pro_music/themes/classimax-premium/plugins/slick-carousel/slick/slick.min.js"></script>
<script src="/template/pro_music/themes/classimax-premium/plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="/template/pro_music/themes/classimax-premium/plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="/template/pro_music/themes/classimax-premium/plugins/smoothscroll/SmoothScroll.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="/template/pro_music/themes/classimax-premium/plugins/google-map/gmap.js"></script>
<script src="/template/pro_music/themes/classimax-premium/js/script.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
@yield('js')

</body>

</html>



