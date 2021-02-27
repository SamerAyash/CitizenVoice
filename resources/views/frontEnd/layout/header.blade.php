<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @if(app()->getLocale() == 'ar')
        <link  rel="stylesheet" href="{{asset('/assets/css/animate.min.css')}}">
        <link  rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link rel="stylesheet" href="{{asset('/assets/css/swiper.min.css')}}">
        <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('/assets/css/style_ar.css')}}">
        <title>صوت المواطن</title>
    @else
    <!-- Bootstrap CSS -->
        <link  rel="stylesheet" href="{{asset('/assets/css/animate.min.css')}}">
        <link  rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <title>Citizen Voice</title>
    @endif
</head>
