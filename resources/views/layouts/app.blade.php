<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
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
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
    @livewireScripts
    <script src="{{asset('js/jquery_ajax.js')}}"></script>
    <script>

      // Ajax Setup Start 
        $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
      // Ajax Setup End 




           // Adding Data Start 
        // $('#add_student_submit').click(function(e){        
        //     e.preventDefault(); 
 
        //       var first_namee = $('#first_namee').val();
        //       alert(first_namee);
        //     //   var roll = $('#roll').val();
        //     //   $('#nameError').text('');
        //     //   $('#rollError').text('');
             
        //     //   $.ajax({
        //     //       type: "POST",
        //     //       dataType: "json",
        //     //       data:{name:name, roll:roll},
        //     //       url: "/student/add",
        //     //       success: function(response){ 

        //     //         $('#addForm').each(function(){
        //     //           this.reset();
        //     //         });

        //     //         $('#addModal').modal('hide');
                
        //     //         $('#add_tbody').prepend(`
        //     //             <tr data-id="`+response.id+`">
        //     //               <td>`+response.id+`</td>
        //     //               <td>`+response.name+`</td>
        //     //               <td>`+response.roll+`</td>
        //     //               <td>
        //     //                 <button data-toggle="modal" data-target="#editModal" id="edit_Modal_show" class='btn btn-warning'>Edit</button>
        //     //                 <button data-toggle="modal" data-target="#deleteModal" onclick="delete_student(`+response.id+`)" class='btn btn-danger'>Delete</button>
        //     //               </td>
        //     //             </tr>
        //     //           `)
        //     //         iziToast.success({
        //     //             title: 'Done',
        //     //             message: "Student Added Successfully",
        //     //         });

                   
        //     //       },
        //     //       error: function(error){                
        //     //         $('#nameError').text(error.responseJSON.errors.name);
        //     //         $('#rollError').text(error.responseJSON.errors.roll);
        //     //          iziToast.error({
        //     //             title: 'Sorry',
        //     //             message: "Something went wrong",
        //     //         });
        //     //       },
                 
        //     //   })

        //   });

      // Adding Data End 

    
    
    </script>


</body>
</html>
