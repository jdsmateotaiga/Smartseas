<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>{{ $progress_report->title }}</title>
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
  <body id="progress_report">
      @if (\Session::has('success'))
        <div class="container mT-30">
          <div class="alert alert-success pX-30 pY-20 alert-dismissible" role="alert">
            <strong>Success!</strong> {!! \Session::get('success') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      @endif
      @if($progress_report->submitted == 0)
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#submit-report">
        Submit Report
      </button>
      <div class="modal fade" id="submit-report" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 400px!important;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 style="margin-bottom: 0">Are you sure to submit this report ?</h5>
            </div>
            <div class="modal-body">
              <form action="{{ action('ProgressReportController@submit_report', ['id' => Helper::encrypt_id($progress_report->id)]) }}" method="post">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <a type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endif
      @include('dashboard.project.progress-report.report.info')
      @include('dashboard.project.progress-report.report.report')
      @include('dashboard.project.progress-report.partnership-forged.index', ['project' => $progress_report->project])
      @include('dashboard.project.progress-report.management.index', ['project' => $progress_report->project])
      @include('dashboard.project.risk-log.index', ['project' => $progress_report->project])

      <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="{{ asset('js/vendor.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/bundle.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
      <script type="text/javascript">
        $('.navigation ul li a').click(function(e){
          e.preventDefault();
          $(this).parent().addClass('active').siblings().removeClass('active');
          $( $(this).attr('href') ).addClass('active').siblings().removeClass('active');
        });
      </script>
  </body>
</html>
