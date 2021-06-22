
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ramex</title>

     <!-- Custom fonts for this template-->
     <link href="{{asset('/customAuth/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    


    <!-- Custom styles for this template-->
    <link href="{{asset('customAuth/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/maxcdn.css')}}" rel="stylesheet">
    

    {{-- <style>
        /* Set the body to occupy the
           whole browser window
           when there is less content */
        body {
            height: 100vh;
            margin: 0;
        }
    </style> --}}

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('homeopcallcenter')}}">
                <div class="sidebar-brand-icon" style="margin-top:30px">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div  class="sidebar-brand-text mx-3" style="margin-top:30px">{{ Auth::user()->profil }}</div>
            </a>
            
              <!-- Divider -->
             
              

              <!-- Nav Item - Dashboard -->
             <li class="nav-item active" style="margin-top:70px">
                <a class="nav-link" href="{{route('homeopcallcenter')}}">
                   <i class="fas fa-home" style="font-size:20px"></i>
                   <span style="font-size:17px">Accueil</span>
                </a>
             </li>

             <li class="nav-item" >
                <a class="nav-link" href="{{route('showClientsCallCenter')}}">
                   <i class="fas fa-fw fa-cog" style="font-size:20px"></i>
               <span style="font-size:15px">Gestion des clients</span>   
                </a>
             </li>

             <li class="nav-item" >
                <a class="nav-link"  href="{{route('showCommandsCallCenter')}}">
                   <i class="fas fa-fw fa-cog" style="font-size:20px"></i>
                   <span style="font-size:14px">Gestion des demandes</span>
                </a>
             </li>
           


            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-blue topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('project/public/photos/'.Auth::user()->image) }}" >
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changesettingsModal">
                                    <i class="fas fa-users-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Identification
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Déconnexion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
                        </div>
    
                        <!-- Content Row -->
                        <div class="row">
    
    
                              <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                                                Demandes de ramassage d'aujourd'hui </div>
                                           <center><div id="dem" class="h3 mb-0 font-weight-bold text-gray-800"></div></center>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-box fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
    
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div id="nv_dem_title" class="text-lg font-weight-bold text-uppercase mb-1">
                                                    Demandes en attente d'affectation</div>
                                             <center><div id="nv_dem" class="h3 mb-0 font-weight-bold text-gray-800"></div></center>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-tasks fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div id="af_dem_title" class="text-lg font-weight-bold text-uppercase mb-1">
                                                    Demandes en attente de confirmation</div>
                                                <center><div id="af_dem" class="h3 mb-0 font-weight-bold text-gray-800"></div></center>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-check fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg font-weight-bold text-danger text-uppercase mb-1">
                                                Demandes annulées </div><br>
                                            <center><div id="an_dem" class="h3 mb-0 font-weight-bold text-gray-800"></div></center>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-close fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                            
    
                        </div> <!-- Content Row -->
                       
    
                        <div class="row">
    
                            <!-- Area Chart -->
                            <div class="col-lg-12">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">L'évolution de notre activité au cours des trois derniers mois</h6>
                                        
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                    
                                        <!--my chart-->             
                                        <div id="chart" class="chart-area">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                           
                        </div>
    
                       
    
                    </div>
                    <!-- /.container-fluid -->
    


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ramex 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

     <!-- Logout Modal-->
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
            
             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-4"> <img src="{{ asset('customAuth/images/logout.jpg') }}" alt="" style="width:130px;height:130px"></div>
                     <div class="col-md-8" style="padding-top:50px;padding-left:50px"><center><h5>voulez-vous vraiment vous déconnecter ?</h5></center></div>
                 </div>

                 
                  <center>  
                     <a class="btn btn-primary " href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                         {{ __('Se Déconnecter') }}</a>
                                         <button class="btn btn-secondary " type="button" data-dismiss="modal">Quitter</button>
                                     </center>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                         @csrf
                                     </form>
                                 
             </div>
             
         </div>
     </div>
 </div>


   <!--edit user modal begin-->
<!-- Modal -->
<div class="modal fade" id="changesettingsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#4e73df; color:white">
          <h5 class="modal-title" id="exampleModalLabel">Modifier votre paramètres</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color:white">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!--begin of my form-->
          <div class="col-lg-12">
      
                      <form id="editform2" enctype="multipart/form-data">
                       @csrf
                       {{method_field('PUT')}}
                       
                          <div class="form-group">
                                  <label for="">Changer votre image de profil</label>
                                  <input id="modimage2" type="file" class="form-control"
                                   name="modimage2">
                          </div>
  
                         
  
                          <div class="form-group">
                            <label for="">Changer votre mot de passe</label>
                                   <input id="modpassword2" type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                    name="modpassword2" placeholder="Nouveau mot de passe" autocomplete="Nouveau mot de passe">
                                    <small id="modpassword_error" class="form-text text-danger"></small>
                          </div>
  
                        <center>
                          <button type="submit" class="btn btn-primary">Enregistrer </button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </center>
                      </form>
                  
              </div>
          <!--end of my form-->
        </div>
      </div>
    </div>
  </div>
      <!--edit user modal end-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('customAuth/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('customAuth/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('customAuth/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('customAuth/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('customAuth/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('customAuth/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('customAuth/js/demo/chart-pie-demo.js')}}"></script>


    
    <!--chart scripts-->
     <!-- Charting library -->
     <script src="{{asset('js/echarts.min.js')}}"></script>
     <!-- Chartisan -->
     <script src="{{asset('js/chartisan_echarts.js')}}"></script>
     <!-- Your application script -->

     <!-- Charting library -->
<script src="{{asset('js/Chart.min.js')}}"></script>
<!-- Chartisan -->
<script src="{{asset('js/chartisan_chartjs.umd.js')}}"></script>
<script>
         
    const chart = new Chartisan({
      el: '#chart',
      url: "@chart('ramassage_chart')",
      hooks: new ChartisanHooks()
 .beginAtZero()
 .responsive()
 .colors(),
    });
  </script>
     <!--chart scripts end-->

     <!--dashboard-->
     <script>
        $(document).ready(function(){
            $.ajax({
                url: "{{ route('dashboard') }}",
                success: 
                  function(data){
                    $("#dem").text(data[0]);
                    $("#nv_dem").text(data[1]);
                    $("#af_dem").text(data[2]);
                    $("#an_dem").text(data[3]);
                    if(data[1] != 0){
                       $("#nv_dem_title").addClass("nouvelle-demande");
                     // alert("test");
                     //  $("#nv_dem").addClass("nouvelle-demande");
                    } else{
                        $("#nv_dem_title").addClass("text-info");    
                    }
        
                    if(data[2] != 0){
                       $("#af_dem_title").addClass("nouvelle-demande");
                     // alert("test");
                     //  $("#nv_dem").addClass("nouvelle-demande");
                    } else{
                        $("#af_dem_title").addClass("text-warning");    
                    }
                   // setInterval(sendRequest, 10000);
                },
                complete: function() {
               // Schedule the next request when the current one's complete
             //  setInterval(sendRequest, 10000); // The interval set to 5 seconds
             }
            });
          setInterval(sendRequest,10000);
          function sendRequest(){
              $.ajax({
                url: "{{ route('dashboard') }}",
                success: 
                  function(data){
                    $("#dem").text(data[0]);
                    $("#nv_dem").text(data[1]);
                    $("#af_dem").text(data[2]);
                    $("#an_dem").text(data[3]);
                    if(data[1] != 0){
                       $("#nv_dem_title").addClass("nouvelle-demande");
                     // alert("test");
                     //  $("#nv_dem").addClass("nouvelle-demande");
                    } else{
                        $("#nv_dem_title").addClass("text-info");    
                    }
        
                    if(data[2] != 0){
                       $("#af_dem_title").addClass("nouvelle-demande");
                     // alert("test");
                     //  $("#nv_dem").addClass("nouvelle-demande");
                    } else{
                        $("#af_dem_title").addClass("text-warning");    
                    }
                   // setInterval(sendRequest, 10000);
                },
                complete: function() {
               // Schedule the next request when the current one's complete
             //  setInterval(sendRequest, 10000); // The interval set to 5 seconds
             }
            });
          };
                    });
        </script>

{{-- zoom out my web page--}}
<script type="text/javascript">
    function zoom() {
        document.body.style.zoom = "90%" 
    }
</script> 
{{-- <script>
    window.addEventListener("resize", getSizes, false);

    let out = document.querySelector("#page-top");

    function getSizes() {
        let zoom = ((window.outerWidth - 50)
            / window.innerWidth) * 100;
              
        out.textContent = zoom;
    }
</script> --}}

{{-- modifier les informations de l'utilisateur --}}
<script>
    $(document).ready(function(){
        $('#editform2').on('submit',function(e){
              e.preventDefault();
              var totalFormData=new FormData($('#editform2')[0]);
              totalFormData.append('_method', 'put');
             // alert(totalFormData.modpassword);

             $.ajax({
                 type:"POST",
                 url:"{{ route('updateuser2') }}",
                 processData: false,
                 contentType: false,
                 data:totalFormData,
                // data:$(this).serialize(),
                 success:function(data,response){
                     $('#modpassword2').val('');
                     $('#modimage2').val('');
                    $('#changesettingsModal').modal('hide'); 

                    $('#success_modal').modal('show');

                     setTimeout(function() {
                         $('#success_modal').modal('hide');
                     }, 2000);
                     location.reload();
                     //window.location = "{{route('globstats3view')}}";
                 },
                 error:function(error){
                  alert("Erreur");
                 }
             });
          });
    });
    </script>




</body>

