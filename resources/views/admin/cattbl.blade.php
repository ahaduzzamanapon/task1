<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>   @php

        $sitesettings= DB::table('settings')->select('sitename','titelname')->first();

        @endphp
          {{$sitesettings->titelname}}</title>

    <link href="{{url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.svg" type="image/x-icon')}}">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{'/admin'}}"><h2>{{$sitesettings->sitename}}</h2></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                @include('admin/sidebar-menu')
                {{--  menu end  --}}
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>


                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
         {{--  ss  --}}
        <div id="main">


            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-start">
                                <ol class="breadcrumb">
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Hoverable rows start -->
                <section class="section">
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">CATAGORISE</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <a href="{{url('/admin/addcat')}}" class="btn btn-primary">Add CATAGORISE</a>
                                    </div>
                                    <!-- table hover -->

                                    <div class="table-responsive">
                                        @if(Session::has('msg'))
                                        <p class="alert alert-info">{{ Session('msg') }}</p>
                                        @endif
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr class="bg-info">
                                                    <th>ID</th>
                                                    <th>CATAGORISE</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($showdatacout==0)
                                                <tr>
                                                <p class="bg-danger">There is no data to show</p>
                                                </tr>
                                                @else
                                                @foreach($showdata as $key=>$data )
                                                <tr>
                                                    <td scope="row">{{ $key+1 }}</td>
                                                    <td>{{ $data->catname }}</td>
                                                    <td>
                                                        <a href="{{ '/admin/editcat/'.$data->id }}" class="btn btn-success my-1">Edit</a>
                                                        <a href="{{ '/admin/delletdata/'.$data->id }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger my-1">Delete</a>


                                                    </td>

                                                </tr>

                                                @endforeach
                                                @endif


                                            </tbody>
                                        </table>
                                        {{ $showdata->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Hoverable rows end -->


            </div>


        </div>
    </div>

    <script src="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>

    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
