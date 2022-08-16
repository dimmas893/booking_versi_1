
    <div class="sidebar" data-color="orange">
        <!--
        Tip 1: You can change the color of the fdebar using: data-color="blue | green | orange | red | yellow"
        -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          ADB
        </a>
        <a href="" class="simple-text logo-normal">
          Aplikasi Booking
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="{{ route('admin.index') }}">
              <i class="now-ui-icons sport_user-run"></i>
              <p>Akun Admin</p>
            </a>
          </li>
          <li>
            <a href="/category">
              <i class="now-ui-icons sport_user-run"></i>
              <p>Category</p>
            </a>
          </li>
          <li>
            <a href="{{ route('products') }}">
              <i class="now-ui-icons sport_user-run"></i>
              <p>Products</p>
            </a>
          </li>
          <li>
            <a href="{{ route('booking') }}">
              <i class="now-ui-icons sport_user-run"></i>
              <p>Booking</p>
            </a>
          </li>
        </ul>
      </div>
    </div>