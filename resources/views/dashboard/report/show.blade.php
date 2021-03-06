<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>{{ $project->title }}</title>
    <style>#loader{transition:all .3s ease-in-out;opacity:1;visibility:visible;position:fixed;height:100vh;width:100%;background:#fff;z-index:90000}#loader.fadeOut{opacity:0;visibility:hidden}.spinner{width:40px;height:40px;position:absolute;top:calc(50% - 20px);left:calc(50% - 20px);background-color:#333;border-radius:100%;-webkit-animation:sk-scaleout 1s infinite ease-in-out;animation:sk-scaleout 1s infinite ease-in-out}@-webkit-keyframes sk-scaleout{0%{-webkit-transform:scale(0)}100%{-webkit-transform:scale(1);opacity:0}}@keyframes sk-scaleout{0%{-webkit-transform:scale(0);transform:scale(0)}100%{-webkit-transform:scale(1);transform:scale(1);opacity:0}}</style>
    <link rel="shortcut icon" type="image/png" href="{{ URL::to('/')}}/images/smartseas-logo.jpg"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style media="screen">
      .clearfix:before, .clearfix:after {display: table; content: '';}
      .clearfix:after {clear:both;}
      table, td, th {
        border: 1px solid black;
        padding: 5px;
      }
      table {
        border-collapse: collapse;
      }
      th {
        text-align: center;
        vertical-align: middle;
      }

    </style>
  </head>
  <body id="report">
      <div class="navigation">
        <ul class="clearfix">
          <li class="active"><a href="#sheet1">AWP</a></li>
          <li><a href="#sheet2">DETAILED AWP</a></li>
          <li><a href="#sheet3">SUMMARY</a></li>
          <li><a href="#sheet4">RISK LOG</a></li>
        </ul>
      </div>
      @include('dashboard.report.info');
      <div id="excel">
        <div class="sheet active" id="sheet1">
          @include('dashboard.report.awp')
        </div>
        <div class="sheet" id="sheet2">
          @include('dashboard.report.detail')
        </div>
        <div class="sheet" id="sheet3">
          @include('dashboard.report.summary')
        </div>
        <div class="sheet" id="sheet4">
          @include('dashboard.report.risklog')
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="{{ asset('js/vendor.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/bundle.js') }}"></script>
      <script type="text/javascript">
        $('.navigation ul li a').click(function(e){
          e.preventDefault();
          $(this).parent().addClass('active').siblings().removeClass('active');
          $( $(this).attr('href') ).addClass('active').siblings().removeClass('active');
        });
      </script>
  </body>
</html>
