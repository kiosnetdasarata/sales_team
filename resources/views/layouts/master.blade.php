<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('css')
    <title>Document</title>

    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script type="text/javascript" src="{{ asset('js/style.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
      var myLink = document.querySelectorAll('a[href="#"]');
      myLink.forEach(function(link){
        link.addEventListener('click', function(e) {
          e.preventDefault();
        });
      });
     </script>
     <style>
      .mainwrapper {
          background: #fefefe;
          display: flex;
          width: 100%;
          height: 650px;
          justify-content: center;
          align-items: center;
      }

      img.thumb {
          max-width: 100px;
          max-height: 100px;
      }

      .overlay {
          width: 0;
          height: 0;
          overflow: hidden;
          position: fixed;
          top: 0;
          left: 0;
          background: rgba(0, 0, 0, 0);
          z-index: 9999;
          transition: .8s;
          text-align: center;
          padding: 150px 0;
      }

      .overlay:target {
          width: auto;
          height: auto;
          bottom: 0;
          right: 0;
          background: rgba(0, 0, 0, .7);
      }

      .overlay img {
          max-height: 100%;
          box-shadow: 2px 2px 7px rgba(0, 0, 0, .5);
      }

      .overlay:target img {
          animation: zoomDanFade 1s;
      }

      .overlay .close {
          position: absolute;
          top: 2%;
          right: 2%;
          margin-left: -20px;
          color: white;
          text-decoration: none;
          line-height: 14px;
          padding: 5px;
          opacity: 0;
      }

      .overlay:target .close {
          animation: slideDownFade .5s .5s forwards;
      }

      /* animasi */
      @keyframes zoomDanFade {
          0% {
              transform: scale(0);
              opacity: 0;
          }

          100% {
              transform: scale(1);
              opacity: 1;
          }
      }

      @keyframes slideDownFade {
          0% {
              opacity: 0;
              margin-top: -20px;
          }

          100% {
              opacity: 1;
              margin-top: 0;
          }
      }
  </style>
</head>
<body classname="snippet-body" id="body-pd">
@include('layouts.sidebar')
    <!--Container Main start-->
    
    <div class="height-100 bg-light">
      <div class="card mt-5">
        <div class="card-body">
          @yield('content')
        </div>
      </div>
    </div>
    <!--Container Main end-->

    
    <script type="text/javascript">

      $(document).ready(function(){
        $('nav div a').click(function(){
          $('div a').removeClass("active");
          $(this).addClass("active");
        });
      });
    </script>
    
    
</body>
</html>