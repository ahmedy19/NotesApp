<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap , Fontawesome & summernote -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/mystyle.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap , Fontawesome & summernote -->
    <script src="{{asset('bootstrap/js/jquery-3.4.1.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('fontawesome/js/all.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script>

        $(document).ready(function() {
            $('#content').summernote();
        });

        $(document).ready(function() {
            $('.contentdetails').summernote();
        });

        //Edit modal 

        $('#showModal').on('show.bs.modal', function(e){
    
        var button = $(e.relatedTarget);
        
        var job = button.data('job');    // job is id of modal input 
        var biography = button.data('biography');
        var profile_id = button.data('profile_id');

        var modal = $(this);

        modal.find('.modal-title').text('Profile');

        modal.find('.modal-body #profile_id').val(profile_id);
        modal.find('.modal-body #job').val(job);
        modal.find('.modal-body #biography').val(biography);


        });


        //Show Note modal 
        $('#showNoteModal').on('show.bs.modal', function(e){
    
        var button = $(e.relatedTarget);
        
        var title = button.data('title');    // title is id of modal input 
        var subtitle = button.data('subtitle');
        var details = button.data('details');
        var note_id = button.data('note_id');

        var modal = $(this);

        modal.find('.modal-title').text('Note');

        modal.find('.modal-body #note_id').html(note_id);
        modal.find('.modal-body #title').html(title);
        modal.find('.modal-body #subtitle').html(subtitle);
        modal.find('.modal-body #details').html(details);

        });


        //Edit Note modal 
        $('#editNoteModal').on('show.bs.modal', function(e){
    
        var button = $(e.relatedTarget);
        
        var title = button.data('title');    // title is id of modal input 
        var subtitle = button.data('subtitle');
        var details = button.data('details');
        var note_id = button.data('note_id');

        var modal = $(this);

        modal.find('.modal-title').text('Note');

        modal.find('.modal-body #note_id').val(note_id);
        modal.find('.modal-body #title').val(title);
        modal.find('.modal-body #subtitle').val(subtitle);
        modal.find('.modal-body #details').html(details);

        });





        







    </script>

</body>
</html>
