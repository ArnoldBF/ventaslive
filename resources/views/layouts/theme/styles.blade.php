    <script src="{{ asset('assets/js/loader.js')}}"></script>
    <link href="{{ asset('assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/structure.css')}}" rel="stylesheet" type="text/css" class="structure" />
    
    <link href="{{asset('plugins/font-icons/fontawesome/css/fontawesome.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/elements/avatar.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('plugins/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/widgets/modules-widgets.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
  <link href="{{asset('assets/css/apps/scrumboard.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/apps/notes.css')}}" rel="stylesheet" type="text/css">

    <style>
      
      aside{
          display: none!important;
      }
      .page-item.active .page-link{
          z-index: 3;
          color: #fff;
          background-color: #3b3f5c;
          border-color:#3b3f5c;
      }
      @media(max-width:480px){
          .mtmobile{
              margin-bottom: 20px !important;
          }
          .mbmobile{
              margin-bottom: 10px !important;
          }
          .hideonsm{
              display: none!important;
          }
          .inblock{
              display: block;
          }
      }
/*sidebar background*/
      .sidebar-theme #compactSidebar {
    background: #022e5a!important;
}
/*Sidebar Collapse*/
.header-container .sidebarCollapse {
    color: #230f3d!important;
}

.navbar .navbar-item .nav-item form.form-inline input.search-form-control {
    font-size: 15px;
    background-color:#230f3d4d !important;
    padding-right: 40px;
    padding-top: 12px;
    border: none;
    color:#230f3d;
    box-shadow: none;
    border-radius: 30px;
   }
   .btn-secondary {
    color: #fff !important;
    background-color: #0658ab;
    border-color: #060606a6;
  }
        
  .input-group-prepend {
    margin-right: -1px;
      background-color:#0658ab ;
  }
.input-gp {
    background: #022E5A  !important;
    color: white !important;
}
.bg-dark {
    background-color: #022E5A !important;
}
.btn-dark {
    color: #fff !important;
    background-color: #022e5a;
    border-color: #3b3f5c;
}
.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #022e5a;
    border-color: #3b3f5c;
}
.header-container .sidebarCollapse {
    color: #eff2f6   !important;
}
h1, h2, h3, h4, h5, h6 {
    color: #022e5a;
}
.navbar .navbar-item .nav-item.dropdown a svg {
    stroke-width: 1.6px;
    width: 26px;
    height: 26px;
    color: #f1f2f3;
}
.navbar {
    padding: 0 0 0 20px;
    background: #022e5a;
    min-height: 50px;
    border-bottom: 1px solid #fafafa;
    -webkit-transition: .3s ease all;
    transition: .3s ease all;
    -webkit-box-shadow: 0 4px 6px 0 rgba(85, 85, 85, 0.08), 0 1px 20px 0 rgba(0, 0, 0, 0.07), 0px 1px 11px 0px rgba(0, 0, 0, 0.07);
    -moz-box-shadow: 0 4px 6px 0 rgba(85, 85, 85, 0.08), 0 1px 20px 0 rgba(0, 0, 0, 0.07), 0px 1px 11px 0px rgba(0, 0, 0, 0.07);
    box-shadow: 0 4px 6px 0 rgba(85, 85, 85, 0.08), 0 1px 20px 0 rgba(0, 0, 0, 0.07), 0px 1px 11px 0px rgba(0, 0, 0, 0.07);
}
.navbar .navbar-item .nav-item form.form-inline input.search-form-control {
    font-size: 15px;
    background-color: #f4f4f48f !important;
    padding-right: 40px;
    padding-top: 12px;
    border: none;
    color: #230f3d;
    box-shadow: none;
    border-radius: 30px;
}
.navbar .navbar-item .nav-item.search-animated svg {
    cursor: pointer;
    color: rgba(12, 12, 12, 0.57);
    position: absolute;
    width: 20px;
    height: 20px;
    top: 10px;
    right: 10px;
}
.form-group label, label {
    font-size: 15px;
    color: #090909b5;
    letter-spacing: 1px;
}
.sidebar-wrapper #compactSidebar {
    width: 69px;
    position: fixed;
    top: 58px;
    left: 0;
    z-index: 1031;
    transition: .3s ease all;
    height: 100vh;
    touch-action: none;
    user-select: none;
    -webkit-user-drag: none;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}
.btn-dark {
    color: #fff !important;
    background-color: #0658ab;
    border-color: #3b3f5c;
}
.btn-primary {
    color: #fff !important;
    background-color: #022e5a  !important;
    border-color: #1b55e2;
}
.col-md-8 {
  right: 0px;
}
.connect-sorting{
padding: 9px;
}
.modal-content .modal-footer [data-dismiss="modal"] {
    background-color: #022e5a;

}
@media (max-width: 991px)
html.sidebar-noneoverflow .main-container:not(.sidebar-closed) .sidebar-wrapper #compactSidebar, .main-container.sbar-open .sidebar-wrapper #compactSidebar {
    left: 0;
}
.sidebar-closed #compactSidebar {
  left: -150px;
}
    </style>
    
    @livewireStyles