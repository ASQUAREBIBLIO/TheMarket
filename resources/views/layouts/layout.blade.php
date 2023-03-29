<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ __('Astore | Find & Publish Your Thing') }}</title>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Font awesome -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- Booststrap icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            h4{font-weight: bold;}
            button{border: 0;}
            *{font-family:sans-serif;margin: 0; padding: 0; list-style: none; color: #141414;}
            body{background-color: #fafafc;}
            .header{width: 100%;background-image: url('jonny-caspari-KuudDjBHIlA-unsplash.jpg');background-size: cover;background-position: center;background-repeat: no-repeat;}
            .header-container{width: 100%;height: 100%;padding: 0;}
            .top-nav{position: sticky;top: 0;background-color: #fff; width: 100%;max-height: fit-content; overflow: hidden;line-height: 35px; padding: 25px;box-shadow: 0 1px 5px #ccc;}
            .top-nav a{float: left;font-size: 17px;}
            .top-nav a.active{color: #141414;font-size: 27px;letter-spacing: 1px;font-weight: 500;display: inline-flex;}
            .top-nav a.active span{font-family: Matura MT Script Capitals;}
            .top-nav a.active div{width: 50px;padding: 0 5px;}
            .top-nav a.active div img{max-width: 100%;object-fit: contain;}
            .right-top-nav{float: right;}
            .right-top-nav a{padding: 0 7px;color: #fff;margin-right: 7px;}
            .sign_btn{background-color: #3369c7;border-radius: 3px;}
            .login_btn span, .login_btn i{color: #141414;}
            #check{display: none;}
            .right-top-nav .icon-toggle i{color: #141414;border: 1px solid #141414;border-radius: 2px;padding: 4px;font-size: 16px;}
            .icon-toggle .vanish{right: 25px;margin-top: 3px;opacity: 0}
            .drop-menu{background-color: #ccc;width: 300px;height: 100vh;top: 86px; right: -100%;display: flex;justify-content: center;text-align: left;transition: transform .3s;}
            .drop-menu div .profile_avatar{line-height: 35px; background-color: #ddd;width: 300px;padding: 20px;}
            .icon-angle{right: 20px;}
            .drop-menu-items{display: flex;flex-direction: column;justify-content: left;padding: 20px;}
            .drop-menu-items a{line-height: 45px;text-decoration: none;color: #141414;font-size: 16px;font-weight: bold;}
            a.create_btn{background-color: #141414;color: #fff;text-align: center}
            .drop-menu-items a:hover{color: #fff;transition: .2s ease-in;}
            #check:checked ~ .drop-menu{right: 0;transition: .5s;}
            #check:checked ~ .icon-toggle .bars-icon{opacity: 0;transition: opacity ease-in .2s;}
            #check:checked ~ .vanish{opacity: 1;transition: opacity ease-out .2s;}
            .header-card{display: flex;justify-content: center;width: 100%;}
            .card-content{display: flex;justify-content: center;width: 100%;max-height: 100%;padding: 100px;background-color: #14141465;}
            .card-content .content-container{text-align: center;padding: 35px;color: #fff;}
            .card-content h1{font-size: 65px;font-weight: 500;color: #fff;font-family: Matura MT Script Capitals;}
            .card-content p{font-size: 30px;color: rgba(255, 255, 255, 0.67);}
            .card-content button{border: 0;}
            .card-content a{background-color: #fff;border-radius: 3px;text-decoration: none;padding: 10px 7px;color: #141414;font-size: 18px;font-weight: bold;}
            .card-content a.prm_btn{background-color: #141414;color: #fff;}
            .card-content .sign_btn{color: #fff;padding: 7px 10px; border-radius: 3px;justify-content: center;}
            .card-content .sign_btn span, .card-content .sign_btn i{color: #fff;}
            section{margin: 0;width: 100%;font-size: 16px;}
            a.publish_btn{padding: 10px 15px;color: #fff;background: linear-gradient(90deg, #3369c7, #1a202c);}
            .banner_container article img{object-fit: cover;height: 100%;padding: 50px 0;}
            .actors-container{display: flex;justify-content: center;padding: 100px;color: #fff;background-color: #141414;}
            .actors-grid{display: grid;grid-template-columns: repeat(2, 1fr);grid-gap: 50px;text-align: center;}
            .actors-flex span{font-size: 25px;font-weight: bold;color: #fff;}
            .actors-flex p{font-size: 20px;font-weight: 500;color: #fff;}
            .actors-flex a{color:#141414;background-color: #fff;border-radius: 3px;text-decoration: none;padding: 10px 7px;}
            .actors-flex a:hover{color:#fff;background-color: #3369c7;transition: .2s ease-in;}
            .features{padding: 100px 50px;display: flex;flex-direction: column;justify-content: center;text-align: center;}
            .features-grid{display: grid;grid-template-columns: repeat(2, 1fr);grid-gap: 120px;padding-top: 20px;}
            .features h2, .subscribe h2{font-size: 27px;font-weight: bold;}
            .features-flex{text-align: left; display: inline-flex;align-items: center;padding: 20px;}
            .features-flex i{background-color: #141414; border: 0;border-radius: 55% 52% 48% 45% / 52% 48% 56% 44% ;padding: 25px;color: #fff;font-size: 25px;font-weight: bold;}
            .features-flex p{font-size: 20px;font-weight: bold;margin-left: 10px;}
            .subscribe{padding: 0 100px 50px;text-align: center;}
            .subscribe p{padding: 10px 0 0 0;font-size: 17px;text-align: center;}
            .subscribe form{padding: 10px;display: grid;grid-gap: 30px;justify-content: center;}
            .subscribe form article{display: inline-flex;width: 400px;height: 45px;text-align: left;transition: transform .3s;box-shadow: 0 0 3px #ccc;}
            .subscribe form article input{border: none;width: 300px;color: #141414;padding: 0 10px;}
            .subscribe form article button{background: #141414;border: none;width: 100px;color: #FFF;padding: 0 7px;}
            .footer_container{display: flex;justify-content: center;background: #ccc;padding:20px;}
            .socials{padding: 50px;}
            .socials h2{color: #141414;font-size: 27px;margin-bottom: 10px;text-align: center;}
            .fb{color: #fff;background-color: #3369c7;padding: 5px 10px;margin-right: 10px;}
            .ig{color: #fff;background:linear-gradient(20deg,#fad412,#e41f1f,#dc74b9,#663688);padding: 5px 10px;margin-right: 10px;}
            .copyrights p{color: #141414;text-align: center;}
            .grid_head{padding: 20px 40px; font-size: 20px;font-weight: bold;}
            .most-liked{padding: 100px 0;text-align: center;}
            .like-grid-list{display: flex;justify-content: center;padding: 0;}
            .like-grid{display: grid;grid-template-columns: repeat(3, 1fr);grid-gap: 50px;justify-content: center;}
            .like-grid > div{width: 100%;height: 100%;padding: 0; text-decoration: none;}
            .like-grid > div img{width: 100%;height: 50vh;border: 15px groove #ccc; border-radius: 5px;}
            .grid-list{padding: 40px;}
            .grid{display: grid;grid-template-columns: repeat(5, 1fr);grid-gap: 20px;justify-content: center;text-align: center;}
            .grid > article{width: 100%;height: 100%;background-color: #fff; border-radius: 7px;box-shadow: 0 0 3px #ddd;}
            .grid > article .product{background-color: #ddd;border-radius: 7px 7px 0 0;padding: 20px 0;}
            .grid > article img{height: 22vh;object-position: center;transition: transform .7s;}
            .grid > article img:hover{-ms-transform: scale(1.5);-webkit-transform: scale(1.2);transform: scale(1.6);}
            .gridtext{color: #141414;padding: 20px 10px; text-align: left;}
            em{display: flex;justify-content: center}
            .gridtext h5{font-weight: bold;max-width: 100%;}
            .success{padding: 5px;margin-bottom: 5px;}
            .success p{color: green;text-align: center;font-weight: bold;}
            .success p a{text-decoration: underline;color: #141414;font-weight: bold;}
            .rem-mssge{position: fixed;background-color: lightgreen;border-radius: 5px;bottom: 10px; right: 10px;padding: 0 20px;}
            .rem-mssge p{color: #141414;font-weight: bold;}
            .tools_btns{background-color: red;position: absolute;}
            .tools_btns a{color: #141414;position: relative;bottom: 0;}
            .flex{padding: 20px 40px;}
            .flex_card{background-color: #fff;width: 100%; height: 100%;display: flex; justify-content: center; box-shadow: 0 0 3px #ccc;}
            .flex_card article{width: 50%;height: 100%;display: flex;text-align: left;}
            .flex_card article.artwork-img{background-color: #ddd;padding: 30px;display: flex;justify-content: center;height: 100%;}
            .flex_card article.artwork-img img{height: 37vh;object-position: center;object-fit: cover;transition: transform .7s;}
            .flex_card article.artwork-img img:hover{-ms-transform: scale(1.5);-webkit-transform: scale(1.2);transform: scale(1.6);}
            .card_content{justify-content: left;padding: 40px 20px;}
            .card_content div{text-align: left; margin-bottom: 30px;}
            .card_content div h5{font-weight: 520;}
            .card_content div h5 a{font-weight: bold;}
            .card_content strong{background-color: #ddd;border-radius: 5px;padding: 10px;}
            .card_content div p{font-size: 17px;text-align: left;color: #141414;padding: 10px;border-left: 5px solid #ddd;}
            .card-content a:hover{color: #fff;}
            .thumbs-up{background-color: #3369c7;border-radius: 3px;padding: 5px 10px;color: #fff;}
            .thumbs-up i{color: #fff;}
            .profile{display: flex;justify-content: center;padding: 0 40px;width: 100%;}
            .profile div.profile_flex, div.profile_banner{display: flex;flex-direction: column;justify-content: center;width: 100%;}
            .profile_banner h5{font-weight: bold;}
            .profile_banner_head{position: relative;display: flex;flex-direction: column;width: 100%;height: 180px;}
            .profile .cover{height: 100%;width: 100%;object-fit: cover;border-radius: 5px;}
            .profile .image{width: 100px;height: 100px;border: 4px solid #fafafc;border-radius: 100%;position: absolute;display:inline-flex;justify-content: center;bottom: -45px;left: calc(50% - 50px);background-color: #ddd;}
            .rb,.accueil{background-color: #ddd;color: #fff;border-radius: 3px;text-decoration: none;padding: 5px 10px;}
            .rb img,.tp img{width: 20px;object-fit: contain;}
            .accueil i{color: #141414;}
            .tp{background-color: #ddd;color: #fff;border-radius: 3px;text-decoration: none;padding: 5px 10px;margin-left: 5px;}
            .edit{background-color: #141414;color: #fff;border-radius: 3px;text-decoration: none;padding: 5px 10px;font-weight: bold;}
            .add{background-color: #3369c7;color: #fff;border-radius: 3px;text-decoration: none;padding: 5px 10px;font-weight: bold;}
            .add span{color: #fff;}
            .add:hover{color: #fff;}
            .add i,.edit i{color: #fff;}
            .home-icon i{background-color: #141414;border-radius: 100%;color: #fff;padding: 7px;}
            .profile_avatar{display: flex;}
            .profile_avatar div{width: 35px;padding: 0 5px;background-color: #ddd;border-radius:50%;}
            .profile_avatar img{max-width: 100%;margin-left:0;border-radius: 50%;}
            .profile_avatar span{margin-left: 5px;}
            .likes-btn{background-color: rgb(168, 200, 213);border-radius: 7px;padding: 0 5px;color: blue;font-weight: bold;}
            .likes-btn i{color: blue;}
            .del-btn{background-color: rgb(207, 184, 184);border-radius: 50%;padding: 0 5px;margin-left: 5px;}
            .del-btn i{color: #e41f1f}
            .edit-btn{background-color: rgb(223, 217, 187);border-radius: 50%;padding: 0 5px;margin-left: 5px;}
            .edit-btn i{color: #483c01}
            .del-btn-prev{background-color: #141414;border-radius: 3px;padding: 5px 10px;color: #fff;}
            .del-btn-prev i{color: #fff;}
            .edit-btn-prev{background-color: #ddd;border-radius: 3px;padding: 5px 10px;color: #141414;}
            .edit-btn-prev a, .edit-btn-prev a:hover{color: #141414;}
            .footer-slug{width: 100%;color: #fff;padding-top: 10px;margin: 0;border-top: 1px solid #ddd;}
            .socials-btn div{display: flex;justify-content: center;}
            .socials-btn a{margin: 5px;}
            .socials-btn a i{background-color: #141414;padding: 5px;font-size: 16px; font-weight: 500;color: #fff;}
            .avatar-card{padding: 40px;}
            .publishers-profiles{padding: 10px 0;overflow: auto;white-space: nowrap;}
            .publishers-profiles div{display: inline-block;background-color: #fff;width: 50px;max-height: 100%;border-radius: 50%;
                box-shadow: 0 0 5px #ddd;padding: 5px;margin-right: 10px;}
            .publishers-profiles div img{max-width: 100%;position: relative;object-fit: cover;border-radius: 50%;}
            .card-profile{position: relative;left: calc(50% - 170px);width: 340px;padding: 40px;background-color: #fff;
                border-radius: 5px;box-shadow: 0 0 5px #ddd;margin-top: 20px;}
            .card-profile-cover{position: relative;display: flex;flex-direction: column;width: 100%;height: 120px;}
            .card-profile-cover .cover{height: 100%;max-width: 100%;object-fit: cover;border-radius: 5px 5px 0 0;}
            .card-profile-cover .image{width: 60px;height:60px;border: 4px solid #fafafc;border-radius: 100%;position: relative;
                display:inline-flex;justify-content: center;bottom: 30px;left: calc(50% - 30px);background-color: #ddd;}
            .card-details{display: flex;justify-content: center;text-align: center;margin-top: 25px;}
            .set-list{list-style: none;}
            @media (max-width: 1600px){
                .grid{grid-template-columns: repeat(5, 1fr);}
            }
            @media (max-width: 1300px){
                .grid{grid-template-columns: repeat(4, 1fr);}
            }
            @media (max-width: 1000px){
                .grid{grid-template-columns: repeat(3, 1fr);}
            }
            @media (max-width: 925px){
                .features-grid{grid-template-columns: repeat(1, 1fr);}
                .like-grid{grid-template-columns: repeat(2, 1fr);}
            }
            @media (max-width: 745px){
                .features-grid{grid-template-columns: repeat(1, 1fr);}
                .grid{grid-template-columns: repeat(2, 1fr);}
            }
            @media (max-width: 710px){
                .banner_content h1, .banner_content p, .banner_content div{text-align: center;}
                .banner_container article img{display:none; overflow: hidden;}
                .actors-container{padding: 100px 20px;}
                .features{padding: 100px 20px;}
                .subscribe{padding: 0 20px 100px 20px;}
                .grid_search form, .profile{padding: 0 20px;}
                .flex, .grid-list, .grid_head{padding: 20px;}
                .actors-grid, .features-grid{grid-template-columns: repeat(1, 1fr);}
                .grid_search article{width: 100%;}
                .flex_card{flex-direction: column;}
                .flex_card article{width: 100%;height: 100%;display: flex;text-align: left;flex-direction: column;}
                .flex_card article.artwork-img img{height: 100%;object-position: center;}
            }
            @media (max-width: 625px){
                .like-grid{grid-template-columns: repeat(1, 1fr);}
                .content-container button.publish-ic{margin-top: 17px;}
            }
            @media (max-width: 535px){
                .subscribe form article{width: 300px;}
                .subscribe form article input{width: 200px;}
                .subscribe form article button{width: 100px;}
                .sign_btn{display: none;overflow: hidden;}
                .grid{grid-template-columns: repeat(1, 1fr);}
            }
            @media (max-width: 420px){
                .top-nav a.active span{display: none;overflow: hidden;opacity: 0;}
                .profile_avatar span{display: none;}
                .card-content p{font-size: 25px;}
                .subscribe form article{width: 330px;}
                .subscribe form article input{width: 240px;}
                .subscribe form article button{width: 90px;}
                .avatar-card{padding: 20px;}
                .add span{display: none;opacity: 0;overflow: hidden;}
            }
            @media (max-width: 360px){
                .card-profile{width: 320px;left: calc(50% - 160px)}
            }
            .rb-store{overflow: auto;white-space: nowrap;}
        </style>
    </head>
    <body class="welcome bg-light">
        @yield('content')
    </body>
</html>
