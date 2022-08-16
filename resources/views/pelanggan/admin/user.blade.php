<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="{{ asset('swal/dist/sweetalert2.min.css') }}" rel="stylesheet">
  </head>
  <body>
     <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">{{ Auth::user()->name }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                            this.closest('form').submit();"> {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>
<div class="container">
    @yield('content')
</div>




    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="{{ asset('swal/dist/sweetalert2.min.js') }}"></script>

  @if(session('tambah'))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Data berhasil ditambah',
          showConfirmButton: false,
          timer: 2000
        })
    </script>
  @endif

  @if(session('edit'))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Data berhasil diedit',
          showConfirmButton: false,
          timer: 2000
        })
    </script>
  @endif

  @if(session('delete'))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Data berhasil didelete',
          showConfirmButton: false,
          timer: 2000
        })
    </script>
  @endif

    @if(session('errorboking'))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Maaf Kamar sudah penuh',
          showConfirmButton: false,
          timer: 2000
        })
    </script>
  @endif

      @if(session('bookingberhasil'))
    <script type="text/javascript">
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Boking berhasil',
          showConfirmButton: false,
          timer: 2000
        })
    </script>
  @endif
    
  </body>
</html>
