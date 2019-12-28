          @if (Route::has('login'))
              @auth
                  <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
                  <span>Copyright © 2017 Designed by <a href="http://blueinspires.com" target="_blank" title="BlueInspires">BlueInspires</a>. All rights reserved.</span>
                  </footer>
              @else
              @endauth
          @endif
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script type="text/javascript" src="{{ asset('js/vendor.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/bundle.js') }}"></script>

      @if (Route::is('usermanagement.*'))
        <script type="text/javascript" src="{{ asset('js/usermanagement.js') }}"></script>
      @elseif (Route::name('register'))
        <script type="text/javascript" src="{{ asset('js/register.js') }}"></script>
      @endif
      @if ( Route::is('award-project.*') || Route::is('work-plan.*') )
        <script type="text/javascript" src="{{ asset('js/autoheight.js') }}"></script>
      @endif
      <script src="{{ asset('js/custom.js') }}"></script>
      <script>
        $( function() {
              $( ".form-datepicker" ).datepicker();

          } );
      </script>
   </body>
</html>
