<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body{
                margin:0
            }
            a{
                background-color:transparent;
                color:inherit;
            }
           

            .h-8{height:2rem}
            .h-16{height:4rem}
            .text-sm{font-size:.875rem}
            .text-lg{font-size:1.125rem}
            .leading-7{line-height:1.75rem}
            .mx-auto{margin-left:auto;margin-right:auto}
            .ml-1{margin-left:.25rem}
            .mt-2{margin-top:.5rem}
            .mr-2{margin-right:.5rem}
            .ml-2{margin-left:.5rem}
            .mt-4{margin-top:1rem}
            .ml-4{margin-left:1rem}
            .mt-8{margin-top:2rem}
            .ml-12{margin-left:3rem}
            .-mt-px{margin-top:-1px}
            .max-w-6xl{max-width:72rem}
            .min-h-screen{min-height:100vh}
            .overflow-hidden{overflow:hidden}
            .p-6{padding:1.5rem}
            .py-4{padding-top:1rem;padding-bottom:1rem}
            .px-6{padding-left:1.5rem;padding-right:1.5rem}
            .pt-8{padding-top:2rem}
            .fixed{position:fixed}
            .relative{position:relative}
            .top-0{top:0}.right-0{right:0}
            .shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}
            .text-center{text-align:center}
            .text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}
            .text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}
            .text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}
            .text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}
            .text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}
            .text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}
            .text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}
            .underline{text-decoration:underline}
            .antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
            .w-5{width:1.25rem}.w-8{width:2rem}
            .w-auto{width:auto}
            .grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}
      
            @media (prefers-color-scheme:dark){
                .dark\:bg-gray-800{
                    --bg-opacity:1;
                    background-color:#2d3748;
                    background-color:rgba(45,55,72,var(--bg-opacity))
                }
                .dark\:bg-gray-900{
                    --bg-opacity:1;
                    background-color:#1a202c;
                    background-color:rgba(26,32,44,var(--bg-opacity))
                }
                .dark\:border-gray-700{
                    --border-opacity:1;
                    border-color:#4a5568;
                    border-color:rgba(74,85,104,var(--border-opacity))
                }
                .dark\:text-white{
                    --text-opacity:1;color:#fff;
                    color:rgba(255,255,255,var(--text-opacity))
                }
                .dark\:text-gray-400{
                    --text-opacity:1;
                    color:#cbd5e0;
                    color:rgba(203,213,224,var(--text-opacity))
                }
                .dark\:text-gray-500{
                    --tw-text-opacity:1;
                    color:#6b7280;
                    color:rgba(107,114,128,var(--tw-text-opacity))
                }
            }
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .w-5{
                display: none;
            }
        </style>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
           

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                

                <div class="flex justify-center">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div>
                            <a>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <div class="flex items-center">
                           <h1><a href={{ "home" }}>Main Event</a> / <a href={{ "university" }}>University API<a></h1>
                           <br>
                        </div>
                        <br><br>
                        <form name="autocomplete-textbox" id="autocomplete-textbox" method="post" action="#">
                            @csrf
                            <div class="form-group">
                                <label>Search Event</label>
                                <input type="text" name="search" id="search" placeholder="Enter search name" class="form-control" onfocus="this.value=''">
                            </div>
                            <div id="search_event_list"></div>
                        </form>
                     
                        
                
                        <br><br>
                        <div id="event_list">
                            <table class="table table-bordered" width="1200px">
                                <thead>
                                    <tr>
                                    <th scope="col"><h2>ID</h2></th>
                                    <th scope="col"><h2>Name</h2></th>
                                    <th scope="col"><h2>Slug</h2></th>
                                    <th scope="col"><h2>startAt</h2></th>
                                    <th scope="col"><h2>endAt</h2></th>
                                    <th scope="col"><h2><a href={{ "create" }}>Create Event</button></h2></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($eventsList as $key => $eventList)
                                    <tr>
                                        <!-- <th scope="row">{{ $key+1 }}</th> -->
                                        <th scope="row">{{ $eventList['id'] }}</th>
                                        <td>{{ $eventList['name'] }}</td>
                                        <td>{{ $eventList['slug'] }}</td>
                                        <td>{{ $eventList['startAt'] }}</td>
                                        <td>{{ $eventList['endAt'] }}</td>
                                        <td>
                                            <a href={{ "event/".$eventList['id'] }}>View</a> 
                                            &nbsp;&nbsp;
                                            <a href={{ "delete/".$eventList['id'] }}>Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>           
                            <br><br> 
                            <div width="100px">
                            {{ $eventsList->links()}}
                            </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function(){
            $('#search').on('keyup',function(){
                var query= $(this).val();
                $.ajax({
                    url:"search",
                    type:"GET",
                    data:{'search':query},
                    success:function(data){
                        if(data == null){
                            document.getElementById("event_list").style.display = "block";
                        }else{
                            $('#search_event_list').html(data);
                            document.getElementById("event_list").style.display = "none";
                        }
                    }
            });
            //end of ajax call
            });
            });
        </script>
    </body>
</html>
