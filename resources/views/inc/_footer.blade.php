<footer class="page-footer font-small pt-1" style="border-bottom: 3px solid #000">
  <div class="container-fluid text-center text-md-left">
    <!-- Grid row -->
    <div class="row">
      <!-- Grid column -->
      <div class="col-sm-6 mt-md-0 mt-4">
        <!-- Content -->
        <h5 class="text-uppercase">Beth's Nautral Pets</h5>
        <p>For help with the website, call 800-123-4567.</p>
      </div>
      <!-- <hr class="clearfix w-100 d-md-none pb-1">
      <div class="col-sm-2 mb-md-0 mb-2"> -->
          <!-- <p>2018 Beth Salvatore</p>
        Links
        <h5 class="text-uppercase">Links</h5>
        <ul class="list-unstyled">
          <li>
            <a href="#!">Number of Cats .....</a>
          </li>
        </ul>
      </div>
           Grid column
      <div class="col-sm-2 mb-md-0 mb-2">
        <h5 class="text-uppercase">Links</h5>
        <ul class="list-unstyled">
          <li>
            <a href="#!">Number of dogs....</a>
          </li>
        </ul>
      </div> -->


          @if(Request::is('login') || Request::is('register') || Request::is('email') || Request::is('rest'))
            @include('inc._animation1')
          @endif

        <div class="footer-copyright text-left m-4 py-3">Beth Salvatore 2018</div>
      </div>
    </div>
  </div>
</footer>
