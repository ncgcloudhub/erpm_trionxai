@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
  $data = \App\Models\SiteSetting::first();
 
@endphp


@php
$category = (auth()->guard('admin')->user()->category == 1);
$product = (auth()->guard('admin')->user()->product == 1);
// $production = (auth()->guard('admin')->user()->production == 1);
$customer = (auth()->guard('admin')->user()->customer == 1);
$bank = (auth()->guard('admin')->user()->bank == 1);
$supplier = (auth()->guard('admin')->user()->supplier == 1);
$sale = (auth()->guard('admin')->user()->sale == 1);
$l_c = (auth()->guard('admin')->user()->l_c == 1);
$chalan = (auth()->guard('admin')->user()->chalan == 1);
$expense = (auth()->guard('admin')->user()->expense == 1);
// $schedule = (auth()->guard('admin')->user()->schedule == 1);
$report = (auth()->guard('admin')->user()->report == 1);
$hr = (auth()->guard('admin')->user()->hr == 1);
$adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
@endphp

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="{{ url('admin/dashboard') }}" target="_blank">
      <img src="{{ asset($data->logo) }}" class="navbar-brand-img h-100" alt="main_logo">

      <span class="ms-1 font-weight-bold">{{$data->title}}</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">

  <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ ($route == 'admin.dashboard')? 'active':'' }}" href="{{ url('admin/dashboard') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>shop </title>
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                  <g transform="translate(1716.000000, 291.000000)">
                    <g transform="translate(0.000000, 148.000000)">
                      <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                      <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>


  {{-- @if($category == true)
      <li class="nav-item">
<a data-bs-toggle="collapse" href="#ecommerceExamples" class="nav-link  {{ ($prefix == '/category')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
  <svg xmlns="http://www.w3.org/2000/svg" fill="#3a416f" width="800px" height="800px" viewBox="-7.5 0 32 32" version="1.1">
    <title>category</title>
    <path d="M2.594 4.781l-1.719 1.75h15.5l-1.719-1.75h-12.063zM17.219 13.406h-17.219v-6.031h17.219v6.031zM12.063 11.688v-1.719h-6.875v1.719h0.844v-0.875h5.156v0.875h0.875zM17.219 20.313h-17.219v-6.031h17.219v6.031zM12.063 18.594v-1.75h-6.875v1.75h0.844v-0.875h5.156v0.875h0.875zM17.219 27.188h-17.219v-6h17.219v6zM12.063 25.469v-1.719h-6.875v1.719h0.844v-0.875h5.156v0.875h0.875z"/>
    </svg>
</div>

<span class="nav-link-text ms-1">Category</span>
</a>
<div class="collapse hide" id="ecommerceExamples" style="">
<ul class="nav ms-4 ps-3">
<li class="nav-item ">
<a class="nav-link {{ ($route == 'category.view')? 'active':'' }}" href="{{ route('category.view') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal"> Category View </span>
</a>

</li>
</ul>
</div>
</li>
@else
@endif --}}

{{-- PRODUCTION --}}
{{-- @if($product == true)
<li class="nav-item">
  <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link collapsed" aria-controls="pagesExamples" role="button" aria-expanded="false">
  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
  <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
  <title>office</title>
  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
  <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
  <g transform="translate(1716.000000, 291.000000)">
  <g id="office" transform="translate(153.000000, 2.000000)">
  <path class="color-background" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z" opacity="0.6"></path>
  <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
  </g>
  </g>
  </g>
  </g>
  </svg>
  </div>
  <span class="nav-link-text ms-1">Prodction (DELETE)</span>
  </a>
  <div class="collapse" id="pagesExamples" style="">
  <ul class="nav ms-4 ps-3">
  <li class="nav-item ">
  <a class="nav-link collapsed" data-bs-toggle="collapse" aria-expanded="false" href="#profileExample">
  <span class="sidenav-mini-icon"> P </span>
  <span class="sidenav-normal"> Plactic Bay <b class="caret"></b></span>
  </a>
  <div class="collapse" id="profileExample" style="">
  <ul class="nav nav-sm flex-column">
  <li class="nav-item">
  <a class="nav-link " href="{{ route('plastic.production.add') }}">
  <span class="sidenav-mini-icon text-xs"> P </span>
  <span class="sidenav-normal"> Add Production </span>
  </a>
  </li>
  <li class="nav-item">
  <a class="nav-link " href="../../pages/pages/profile/teams.html">
  <span class="sidenav-mini-icon text-xs"> T </span>
  <span class="sidenav-normal"> Todays Production </span>
  </a>
  </li>
  </ul>
  </div>
  </li>
  <li class="nav-item ">
  <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#usersExample">
  <span class="sidenav-mini-icon"> U </span>
  <span class="sidenav-normal"> Printing Bay <b class="caret"></b></span>
  </a>
  <div class="collapse " id="usersExample">
  <ul class="nav nav-sm flex-column">
  <li class="nav-item">
  <a class="nav-link " href="../../pages/pages/users/reports.html">
  <span class="sidenav-mini-icon text-xs"> R </span>
  <span class="sidenav-normal"> Add Production </span>
  </a>
  </li>
  <li class="nav-item">
  <a class="nav-link " href="../../pages/pages/users/new-user.html">
  <span class="sidenav-mini-icon text-xs"> N </span>
  <span class="sidenav-normal"> Todays Production </span>
  </a>
  </li>
  </ul>
  </div>
  </li>
  <li class="nav-item ">
  <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#accountExample">
  <span class="sidenav-mini-icon"> A </span>
  <span class="sidenav-normal"> Raw Material <b class="caret"></b></span>
  </a>
  <div class="collapse " id="accountExample">
  <ul class="nav nav-sm flex-column">
  <li class="nav-item">
  <a class="nav-link " href="{{ route('raw.product.add') }}">
  <span class="sidenav-mini-icon text-xs"> S </span>
  <span class="sidenav-normal"> Add Raw Material </span>
  </a>
  </li>
  <li class="nav-item">
  <a class="nav-link " href="{{ route('raw.manage-product') }}">
  <span class="sidenav-mini-icon text-xs"> B </span>
  <span class="sidenav-normal"> Manage Raw Material </span>
  </a>
  </li>

  </ul>
  </div>
  </li>
  <li class="nav-item ">
  <a class="nav-link " aria-expanded="false" href="#projectsExample">
  <span class="sidenav-mini-icon"> P </span>
  <span class="sidenav-normal"> Assembly <b class="caret"></b></span>
  </a>
  </li>
  <li class="nav-item ">
  <a class="nav-link " aria-expanded="false" href="{{ route('raw.category.view') }}">
  <span class="sidenav-mini-icon"> C </span>
  <span class="sidenav-normal"> Raw Category <b class="caret"></b></span>
  </a>
  </li>

  </ul>
  </div>
  </li>
@else
@endif --}}
{{-- END PRODUCTION --}}

@if($product == true)
<li class="nav-item">
<a data-bs-toggle="collapse" href="#project" class="nav-link  {{ ($prefix == '/project')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
<svg class="text-dark" width="12px" height="12px" viewBox="0 0 42 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<title>basket</title>
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<g transform="translate(-1869.000000, -741.000000)" fill="#FFFFFF" fill-rule="nonzero">
<g transform="translate(1716.000000, 291.000000)">
<g id="basket" transform="translate(153.000000, 450.000000)">
<path class="color-background" d="M34.080375,13.125 L27.3748125,1.9490625 C27.1377583,1.53795093 26.6972449,1.28682264 26.222716,1.29218729 C25.748187,1.29772591 25.3135593,1.55890827 25.0860125,1.97535742 C24.8584658,2.39180657 24.8734447,2.89865282 25.1251875,3.3009375 L31.019625,13.125 L10.980375,13.125 L16.8748125,3.3009375 C17.1265553,2.89865282 17.1415342,2.39180657 16.9139875,1.97535742 C16.6864407,1.55890827 16.251813,1.29772591 15.777284,1.29218729 C15.3027551,1.28682264 14.8622417,1.53795093 14.6251875,1.9490625 L7.919625,13.125 L0,13.125 L0,18.375 L42,18.375 L42,13.125 L34.080375,13.125 Z" opacity="0.595377604"></path>
<path class="color-background" d="M3.9375,21 L3.9375,38.0625 C3.9375,40.9619949 6.28800506,43.3125 9.1875,43.3125 L32.8125,43.3125 C35.7119949,43.3125 38.0625,40.9619949 38.0625,38.0625 L38.0625,21 L3.9375,21 Z M14.4375,36.75 L11.8125,36.75 L11.8125,26.25 L14.4375,26.25 L14.4375,36.75 Z M22.3125,36.75 L19.6875,36.75 L19.6875,26.25 L22.3125,26.25 L22.3125,36.75 Z M30.1875,36.75 L27.5625,36.75 L27.5625,26.25 L30.1875,26.25 L30.1875,36.75 Z"></path>
</g>
</g>
</g>
</g>
</svg>
</div>

<span class="nav-link-text ms-1">Project Management</span>
</a>
<div class="collapse hide" id="project" style="">
<ul class="nav ms-4 ps-3">
<li class="nav-item ">

<a class="nav-link {{ ($route == 'project.view')? 'active':'' }}" href="{{ route('project.view') }}">
  <span class="sidenav-mini-icon"></span>
  <span class="sidenav-normal">Project Add</span>
  </a>
<a class="nav-link {{ ($route == 'project.manage')? 'active':'' }}" href="{{ route('project.manage') }}">
  <span class="sidenav-mini-icon"></span>
  <span class="sidenav-normal">Project Manage</span>
  </a>
<a class="nav-link {{ ($route == 'project.add.task')? 'active':'' }}" href="{{ route('project.add.task') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Add Project Ticket</span>
</a>

<a class="nav-link {{ ($route == 'project.manage.task')? 'active':'' }}" href="{{ route('project.manage.task') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Manage Project Ticket</span>
</a>
</li>
</ul>
</div>
</li>



<li class="nav-item">
  <a data-bs-toggle="collapse" href="#incometax" class="nav-link  {{ ($prefix == '/incometax')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
  <svg class="text-dark" width="12px" height="12px" viewBox="0 0 42 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
  <title>basket</title>
  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
  <g transform="translate(-1869.000000, -741.000000)" fill="#FFFFFF" fill-rule="nonzero">
  <g transform="translate(1716.000000, 291.000000)">
  <g id="basket" transform="translate(153.000000, 450.000000)">
  <path class="color-background" d="M34.080375,13.125 L27.3748125,1.9490625 C27.1377583,1.53795093 26.6972449,1.28682264 26.222716,1.29218729 C25.748187,1.29772591 25.3135593,1.55890827 25.0860125,1.97535742 C24.8584658,2.39180657 24.8734447,2.89865282 25.1251875,3.3009375 L31.019625,13.125 L10.980375,13.125 L16.8748125,3.3009375 C17.1265553,2.89865282 17.1415342,2.39180657 16.9139875,1.97535742 C16.6864407,1.55890827 16.251813,1.29772591 15.777284,1.29218729 C15.3027551,1.28682264 14.8622417,1.53795093 14.6251875,1.9490625 L7.919625,13.125 L0,13.125 L0,18.375 L42,18.375 L42,13.125 L34.080375,13.125 Z" opacity="0.595377604"></path>
  <path class="color-background" d="M3.9375,21 L3.9375,38.0625 C3.9375,40.9619949 6.28800506,43.3125 9.1875,43.3125 L32.8125,43.3125 C35.7119949,43.3125 38.0625,40.9619949 38.0625,38.0625 L38.0625,21 L3.9375,21 Z M14.4375,36.75 L11.8125,36.75 L11.8125,26.25 L14.4375,26.25 L14.4375,36.75 Z M22.3125,36.75 L19.6875,36.75 L19.6875,26.25 L22.3125,26.25 L22.3125,36.75 Z M30.1875,36.75 L27.5625,36.75 L27.5625,26.25 L30.1875,26.25 L30.1875,36.75 Z"></path>
  </g>
  </g>
  </g>
  </g>
  </svg>
  </div>
  
  <span class="nav-link-text ms-1">Income Tax</span>
  </a>
  <div class="collapse hide" id="incometax" style="">
  <ul class="nav ms-4 ps-3">
  <li class="nav-item ">

    <a class="nav-link {{ ($route == 'customer.add')? 'active':'' }}" href="{{ route('customer.add') }}">
      <span class="sidenav-mini-icon"></span>
      <span class="sidenav-normal">Add Tax Customer</span>
    </a>
  
    <a class="nav-link {{ ($route == 'customer.manage')? 'active':'' }}" href="{{ route('customer.manage') }}">
      <span class="sidenav-mini-icon"></span>
      <span class="sidenav-normal">Manage Tax Customer</span>
    </a>
  
  <a class="nav-link {{ ($route == 'taxproject.view')? 'active':'' }}" href="{{ route('taxproject.view') }}">
    <span class="sidenav-mini-icon"></span>
    <span class="sidenav-normal">Project Add</span>
    </a>

  <a class="nav-link {{ ($route == 'taxproject.manage')? 'active':'' }}" href="{{ route('taxproject.manage') }}">
    <span class="sidenav-mini-icon"></span>
    <span class="sidenav-normal">Project Manage</span>
    </a>

  <a class="nav-link {{ ($route == 'taxproject.add.task')? 'active':'' }}" href="{{ route('taxproject.add.task') }}">
  <span class="sidenav-mini-icon"></span>
  <span class="sidenav-normal">Add Customer Ticket</span>
  </a>
  
  <a class="nav-link {{ ($route == 'taxproject.manage.task')? 'active':'' }}" href="{{ route('taxproject.manage.task') }}">
  <span class="sidenav-mini-icon"></span>
  <span class="sidenav-normal">Manage Customer Ticket</span>
  </a>



  </li>
  </ul>
  </div>
  </li>


@else
@endif






        @if($customer  == true)
{{-- <li class="nav-item">
<a data-bs-toggle="collapse" href="#customer" class="nav-link  {{ ($prefix == '/customer')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">

    <defs>
    </defs>
    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
      <path d="M 45 49.519 L 45 49.519 c -7.68 0 -13.964 -6.284 -13.964 -13.964 v -5.008 c 0 -7.68 6.284 -13.964 13.964 -13.964 h 0 c 7.68 0 13.964 6.284 13.964 13.964 v 5.008 C 58.964 43.236 52.68 49.519 45 49.519 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
      <path d="M 52.863 51.438 c -2.362 1.223 -5.032 1.927 -7.863 1.927 s -5.501 -0.704 -7.863 -1.927 C 26.58 53.014 18.414 62.175 18.414 73.152 v 14.444 c 0 1.322 1.082 2.403 2.403 2.403 h 48.364 c 1.322 0 2.403 -1.082 2.403 -2.403 V 73.152 C 71.586 62.175 63.42 53.014 52.863 51.438 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
      <path d="M 71.277 34.854 c -2.362 1.223 -5.032 1.927 -7.863 1.927 c -0.004 0 -0.007 0 -0.011 0 c -0.294 4.412 -2.134 8.401 -4.995 11.43 c 10.355 3.681 17.678 13.649 17.678 24.941 v 0.263 h 11.511 c 1.322 0 2.404 -1.082 2.404 -2.404 V 56.568 C 90 45.59 81.834 36.429 71.277 34.854 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
      <path d="M 63.414 0 c -7.242 0 -13.237 5.589 -13.898 12.667 c 8 2.023 13.947 9.261 13.947 17.881 v 2.385 c 7.657 -0.027 13.914 -6.298 13.914 -13.961 v -5.008 C 77.378 6.284 71.094 0 63.414 0 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
      <path d="M 13.915 73.152 c 0 -11.292 7.322 -21.261 17.677 -24.941 c -2.861 -3.029 -4.702 -7.019 -4.995 -11.43 c -0.004 0 -0.007 0 -0.011 0 c -2.831 0 -5.5 -0.704 -7.863 -1.927 C 8.166 36.429 0 45.59 0 56.568 v 14.444 c 0 1.322 1.082 2.404 2.404 2.404 h 11.511 V 73.152 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
      <path d="M 26.536 32.932 v -2.385 c 0 -8.62 5.946 -15.858 13.947 -17.881 C 39.823 5.589 33.828 0 26.586 0 c -7.68 0 -13.964 6.284 -13.964 13.964 v 5.008 C 12.622 26.635 18.879 32.905 26.536 32.932 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
    </g>
    </svg>
</div>

<span class="nav-link-text ms-1">Customer </span>
</a>
<div class="collapse hide" id="customer" style="">
<ul class="nav ms-4 ps-3">
<li class="nav-item">
<a class="nav-link {{ ($route == 'customer.add')? 'active':'' }}" href="{{ route('customer.add') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Add Customer</span>
</a>
<a class="nav-link {{ ($route == 'customer.manage')? 'active':'' }}" href="{{ route('customer.manage') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Manage Customer</span>
</a>
</li>
</ul>
</div>
</li> --}}


<li class="nav-item">
  <a data-bs-toggle="collapse" href="#student" class="nav-link  {{ ($prefix == '/student')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">

      <defs>
      </defs>
      <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
        <path d="M 45 49.519 L 45 49.519 c -7.68 0 -13.964 -6.284 -13.964 -13.964 v -5.008 c 0 -7.68 6.284 -13.964 13.964 -13.964 h 0 c 7.68 0 13.964 6.284 13.964 13.964 v 5.008 C 58.964 43.236 52.68 49.519 45 49.519 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
        <path d="M 52.863 51.438 c -2.362 1.223 -5.032 1.927 -7.863 1.927 s -5.501 -0.704 -7.863 -1.927 C 26.58 53.014 18.414 62.175 18.414 73.152 v 14.444 c 0 1.322 1.082 2.403 2.403 2.403 h 48.364 c 1.322 0 2.403 -1.082 2.403 -2.403 V 73.152 C 71.586 62.175 63.42 53.014 52.863 51.438 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
        <path d="M 71.277 34.854 c -2.362 1.223 -5.032 1.927 -7.863 1.927 c -0.004 0 -0.007 0 -0.011 0 c -0.294 4.412 -2.134 8.401 -4.995 11.43 c 10.355 3.681 17.678 13.649 17.678 24.941 v 0.263 h 11.511 c 1.322 0 2.404 -1.082 2.404 -2.404 V 56.568 C 90 45.59 81.834 36.429 71.277 34.854 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
        <path d="M 63.414 0 c -7.242 0 -13.237 5.589 -13.898 12.667 c 8 2.023 13.947 9.261 13.947 17.881 v 2.385 c 7.657 -0.027 13.914 -6.298 13.914 -13.961 v -5.008 C 77.378 6.284 71.094 0 63.414 0 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
        <path d="M 13.915 73.152 c 0 -11.292 7.322 -21.261 17.677 -24.941 c -2.861 -3.029 -4.702 -7.019 -4.995 -11.43 c -0.004 0 -0.007 0 -0.011 0 c -2.831 0 -5.5 -0.704 -7.863 -1.927 C 8.166 36.429 0 45.59 0 56.568 v 14.444 c 0 1.322 1.082 2.404 2.404 2.404 h 11.511 V 73.152 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
        <path d="M 26.536 32.932 v -2.385 c 0 -8.62 5.946 -15.858 13.947 -17.881 C 39.823 5.589 33.828 0 26.586 0 c -7.68 0 -13.964 6.284 -13.964 13.964 v 5.008 C 12.622 26.635 18.879 32.905 26.536 32.932 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
      </g>
      </svg>
    
  </div>
  
  <span class="nav-link-text ms-1">Student</span>
  </a>
  <div class="collapse hide" id="student" style="">
  <ul class="nav ms-4 ps-3">
  <li class="nav-item">
    <a class="nav-link {{ ($route == 'student.add')? 'active':'' }}" href="{{ route('student.add') }}">
      <span class="sidenav-mini-icon"></span>
      <span class="sidenav-normal">Add Student</span>
      </a>
  <a class="nav-link {{ ($route == 'student.manage')? 'active':'' }}" href="{{ route('student.manage') }}">
  <span class="sidenav-mini-icon"></span>
  <span class="sidenav-normal">Manage Student</span>
  </a>

  </li>
  </ul>
  </div>
  </li>


  <li class="nav-item">
    <a data-bs-toggle="collapse" href="#course" class="nav-link  {{ ($prefix == '/course')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">

        <defs>
        </defs>
        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
          <path d="M 45 49.519 L 45 49.519 c -7.68 0 -13.964 -6.284 -13.964 -13.964 v -5.008 c 0 -7.68 6.284 -13.964 13.964 -13.964 h 0 c 7.68 0 13.964 6.284 13.964 13.964 v 5.008 C 58.964 43.236 52.68 49.519 45 49.519 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
          <path d="M 52.863 51.438 c -2.362 1.223 -5.032 1.927 -7.863 1.927 s -5.501 -0.704 -7.863 -1.927 C 26.58 53.014 18.414 62.175 18.414 73.152 v 14.444 c 0 1.322 1.082 2.403 2.403 2.403 h 48.364 c 1.322 0 2.403 -1.082 2.403 -2.403 V 73.152 C 71.586 62.175 63.42 53.014 52.863 51.438 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
          <path d="M 71.277 34.854 c -2.362 1.223 -5.032 1.927 -7.863 1.927 c -0.004 0 -0.007 0 -0.011 0 c -0.294 4.412 -2.134 8.401 -4.995 11.43 c 10.355 3.681 17.678 13.649 17.678 24.941 v 0.263 h 11.511 c 1.322 0 2.404 -1.082 2.404 -2.404 V 56.568 C 90 45.59 81.834 36.429 71.277 34.854 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
          <path d="M 63.414 0 c -7.242 0 -13.237 5.589 -13.898 12.667 c 8 2.023 13.947 9.261 13.947 17.881 v 2.385 c 7.657 -0.027 13.914 -6.298 13.914 -13.961 v -5.008 C 77.378 6.284 71.094 0 63.414 0 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
          <path d="M 13.915 73.152 c 0 -11.292 7.322 -21.261 17.677 -24.941 c -2.861 -3.029 -4.702 -7.019 -4.995 -11.43 c -0.004 0 -0.007 0 -0.011 0 c -2.831 0 -5.5 -0.704 -7.863 -1.927 C 8.166 36.429 0 45.59 0 56.568 v 14.444 c 0 1.322 1.082 2.404 2.404 2.404 h 11.511 V 73.152 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
          <path d="M 26.536 32.932 v -2.385 c 0 -8.62 5.946 -15.858 13.947 -17.881 C 39.823 5.589 33.828 0 26.586 0 c -7.68 0 -13.964 6.284 -13.964 13.964 v 5.008 C 12.622 26.635 18.879 32.905 26.536 32.932 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
        </g>
        </svg>
    </div>
    
    <span class="nav-link-text ms-1">Course</span>
    </a>
    <div class="collapse hide" id="course" style="">
    <ul class="nav ms-4 ps-3">
    <li class="nav-item">
      <a class="nav-link {{ ($route == 'course.add')? 'active':'' }}" href="{{ route('course.add') }}">
        <span class="sidenav-mini-icon"></span>
        <span class="sidenav-normal">Add Course</span>
        </a>
    <a class="nav-link {{ ($route == 'course.manage')? 'active':'' }}" href="{{ route('course.manage') }}">
    <span class="sidenav-mini-icon"></span>
    <span class="sidenav-normal">Manage Course</span>
    </a>
  
    </li>
    </ul>
    </div>
    </li>

@else
@endif


@if($report  == true)
<li class="nav-item">
<a data-bs-toggle="collapse" href="#report" class="nav-link  {{ ($prefix == '/reports')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">

    <defs>
    </defs>
    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
      <path d="M 45 49.519 L 45 49.519 c -7.68 0 -13.964 -6.284 -13.964 -13.964 v -5.008 c 0 -7.68 6.284 -13.964 13.964 -13.964 h 0 c 7.68 0 13.964 6.284 13.964 13.964 v 5.008 C 58.964 43.236 52.68 49.519 45 49.519 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
      <path d="M 52.863 51.438 c -2.362 1.223 -5.032 1.927 -7.863 1.927 s -5.501 -0.704 -7.863 -1.927 C 26.58 53.014 18.414 62.175 18.414 73.152 v 14.444 c 0 1.322 1.082 2.403 2.403 2.403 h 48.364 c 1.322 0 2.403 -1.082 2.403 -2.403 V 73.152 C 71.586 62.175 63.42 53.014 52.863 51.438 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
      <path d="M 71.277 34.854 c -2.362 1.223 -5.032 1.927 -7.863 1.927 c -0.004 0 -0.007 0 -0.011 0 c -0.294 4.412 -2.134 8.401 -4.995 11.43 c 10.355 3.681 17.678 13.649 17.678 24.941 v 0.263 h 11.511 c 1.322 0 2.404 -1.082 2.404 -2.404 V 56.568 C 90 45.59 81.834 36.429 71.277 34.854 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
      <path d="M 63.414 0 c -7.242 0 -13.237 5.589 -13.898 12.667 c 8 2.023 13.947 9.261 13.947 17.881 v 2.385 c 7.657 -0.027 13.914 -6.298 13.914 -13.961 v -5.008 C 77.378 6.284 71.094 0 63.414 0 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
      <path d="M 13.915 73.152 c 0 -11.292 7.322 -21.261 17.677 -24.941 c -2.861 -3.029 -4.702 -7.019 -4.995 -11.43 c -0.004 0 -0.007 0 -0.011 0 c -2.831 0 -5.5 -0.704 -7.863 -1.927 C 8.166 36.429 0 45.59 0 56.568 v 14.444 c 0 1.322 1.082 2.404 2.404 2.404 h 11.511 V 73.152 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
      <path d="M 26.536 32.932 v -2.385 c 0 -8.62 5.946 -15.858 13.947 -17.881 C 39.823 5.589 33.828 0 26.586 0 c -7.68 0 -13.964 6.284 -13.964 13.964 v 5.008 C 12.622 26.635 18.879 32.905 26.536 32.932 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
    </g>
    </svg>
  
</div>

<span class="nav-link-text ms-1">Report</span>
</a>
<div class="collapse hide" id="report" style="">
<ul class="nav ms-4 ps-3">
<li class="nav-item">
<a class="nav-link {{ ($route == 'reports.form')? 'active':'' }}" href="{{ route('reports.form') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Generate Report</span>
</a>
</li>
</ul>
</div>
</li>
@else
@endif



      @if($sale  == true)
<li class="nav-item">
<a data-bs-toggle="collapse" href="#sale" class="nav-link  {{ ($prefix == '/sales')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
  <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
    <path d="M14.3498 2H9.64977C8.60977 2 7.75977 2.84 7.75977 3.88V4.82C7.75977 5.86 8.59977 6.7 9.63977 6.7H14.3498C15.3898 6.7 16.2298 5.86 16.2298 4.82V3.88C16.2398 2.84 15.3898 2 14.3498 2Z" fill="#3a416f"/>
    <path d="M17.2391 4.81949C17.2391 6.40949 15.9391 7.70949 14.3491 7.70949H9.64906C8.05906 7.70949 6.75906 6.40949 6.75906 4.81949C6.75906 4.25949 6.15906 3.90949 5.65906 4.16949C4.24906 4.91949 3.28906 6.40949 3.28906 8.11949V17.5295C3.28906 19.9895 5.29906 21.9995 7.75906 21.9995H16.2391C18.6991 21.9995 20.7091 19.9895 20.7091 17.5295V8.11949C20.7091 6.40949 19.7491 4.91949 18.3391 4.16949C17.8391 3.90949 17.2391 4.25949 17.2391 4.81949ZM12.3791 16.9495H7.99906C7.58906 16.9495 7.24906 16.6095 7.24906 16.1995C7.24906 15.7895 7.58906 15.4495 7.99906 15.4495H12.3791C12.7891 15.4495 13.1291 15.7895 13.1291 16.1995C13.1291 16.6095 12.7891 16.9495 12.3791 16.9495ZM14.9991 12.9495H7.99906C7.58906 12.9495 7.24906 12.6095 7.24906 12.1995C7.24906 11.7895 7.58906 11.4495 7.99906 11.4495H14.9991C15.4091 11.4495 15.7491 11.7895 15.7491 12.1995C15.7491 12.6095 15.4091 12.9495 14.9991 12.9495Z" fill="#3a416f"/>
    </svg>
</div>

<span class="nav-link-text ms-1">Sale</span>
</a>
<div class="collapse hide" id="sale" style="">
<ul class="nav ms-4 ps-3">
<li class="nav-item">
<a class="nav-link {{ ($route == 'sales.view')? 'active':'' }}" href="{{ route('sales.view') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Add Sale</span>
</a>

<a class="nav-link {{ ($route == 'sales.manage')? 'active':'' }}" href="{{ route('sales.manage') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Manage Sale</span>
</a>

</li>
</ul>
</div>
</li>
@else
@endif

{{-- Quotation --}}
{{-- @if($sale  == true)
<li class="nav-item">
<a data-bs-toggle="collapse" href="#quotation" class="nav-link  {{ ($prefix == '/quotation')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
  <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
    <path d="M14.3498 2H9.64977C8.60977 2 7.75977 2.84 7.75977 3.88V4.82C7.75977 5.86 8.59977 6.7 9.63977 6.7H14.3498C15.3898 6.7 16.2298 5.86 16.2298 4.82V3.88C16.2398 2.84 15.3898 2 14.3498 2Z" fill="#3a416f"/>
    <path d="M17.2391 4.81949C17.2391 6.40949 15.9391 7.70949 14.3491 7.70949H9.64906C8.05906 7.70949 6.75906 6.40949 6.75906 4.81949C6.75906 4.25949 6.15906 3.90949 5.65906 4.16949C4.24906 4.91949 3.28906 6.40949 3.28906 8.11949V17.5295C3.28906 19.9895 5.29906 21.9995 7.75906 21.9995H16.2391C18.6991 21.9995 20.7091 19.9895 20.7091 17.5295V8.11949C20.7091 6.40949 19.7491 4.91949 18.3391 4.16949C17.8391 3.90949 17.2391 4.25949 17.2391 4.81949ZM12.3791 16.9495H7.99906C7.58906 16.9495 7.24906 16.6095 7.24906 16.1995C7.24906 15.7895 7.58906 15.4495 7.99906 15.4495H12.3791C12.7891 15.4495 13.1291 15.7895 13.1291 16.1995C13.1291 16.6095 12.7891 16.9495 12.3791 16.9495ZM14.9991 12.9495H7.99906C7.58906 12.9495 7.24906 12.6095 7.24906 12.1995C7.24906 11.7895 7.58906 11.4495 7.99906 11.4495H14.9991C15.4091 11.4495 15.7491 11.7895 15.7491 12.1995C15.7491 12.6095 15.4091 12.9495 14.9991 12.9495Z" fill="#3a416f"/>
    </svg>
</div>

<span class="nav-link-text ms-1">Quotation (DELETE)</span>
</a>
<div class="collapse hide" id="quotation" style="">
<ul class="nav ms-4 ps-3">
<li class="nav-item">
<a class="nav-link {{ ($route == 'quotation.view')? 'active':'' }}" href="{{ route('quotation.view') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Create Quotation</span>
</a>
<a class="nav-link {{ ($route == 'quotation.manage')? 'active':'' }}" href="{{ route('quotation.manage') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Manage Quotation</span>
</a>
</li>
</ul>
</div>
</li>
@else
@endif --}}
{{-- END Quotation --}}

{{-- Return --}}
{{-- @if($sale  == true)
@if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2") || (Auth::guard('admin')->user()->type=="3"))
<li class="nav-item">
<a data-bs-toggle="collapse" href="#return" class="nav-link  {{ ($prefix == '/return')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
  <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
    <path d="M14.3498 2H9.64977C8.60977 2 7.75977 2.84 7.75977 3.88V4.82C7.75977 5.86 8.59977 6.7 9.63977 6.7H14.3498C15.3898 6.7 16.2298 5.86 16.2298 4.82V3.88C16.2398 2.84 15.3898 2 14.3498 2Z" fill="#3a416f"/>
    <path d="M17.2391 4.81949C17.2391 6.40949 15.9391 7.70949 14.3491 7.70949H9.64906C8.05906 7.70949 6.75906 6.40949 6.75906 4.81949C6.75906 4.25949 6.15906 3.90949 5.65906 4.16949C4.24906 4.91949 3.28906 6.40949 3.28906 8.11949V17.5295C3.28906 19.9895 5.29906 21.9995 7.75906 21.9995H16.2391C18.6991 21.9995 20.7091 19.9895 20.7091 17.5295V8.11949C20.7091 6.40949 19.7491 4.91949 18.3391 4.16949C17.8391 3.90949 17.2391 4.25949 17.2391 4.81949ZM12.3791 16.9495H7.99906C7.58906 16.9495 7.24906 16.6095 7.24906 16.1995C7.24906 15.7895 7.58906 15.4495 7.99906 15.4495H12.3791C12.7891 15.4495 13.1291 15.7895 13.1291 16.1995C13.1291 16.6095 12.7891 16.9495 12.3791 16.9495ZM14.9991 12.9495H7.99906C7.58906 12.9495 7.24906 12.6095 7.24906 12.1995C7.24906 11.7895 7.58906 11.4495 7.99906 11.4495H14.9991C15.4091 11.4495 15.7491 11.7895 15.7491 12.1995C15.7491 12.6095 15.4091 12.9495 14.9991 12.9495Z" fill="#3a416f"/>
    </svg>
</div>

<span class="nav-link-text ms-1">Return</span>
</a>
<div class="collapse hide" id="return" style="">
<ul class="nav ms-4 ps-3">
<li class="nav-item">
<a class="nav-link {{ ($route == 'return.manage')? 'active':'' }}" href="{{ route('return.manage') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Product Return</span>
</a>
<a class="nav-link {{ ($route == 'returned.manage')? 'active':'' }}" href="{{ route('returned.manage') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Manage Return</span>
</a>
</li>
</ul>
</div>
</li>
@endif
@endif --}}
{{-- END Return --}}

{{-- @if($chalan  == true)
  <li class="nav-item">
  <a data-bs-toggle="collapse" href="#chalan" class="nav-link  {{ ($prefix == '/chalan')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
  <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
    <path d="M14.3498 2H9.64977C8.60977 2 7.75977 2.84 7.75977 3.88V4.82C7.75977 5.86 8.59977 6.7 9.63977 6.7H14.3498C15.3898 6.7 16.2298 5.86 16.2298 4.82V3.88C16.2398 2.84 15.3898 2 14.3498 2Z" fill="#3a416f"/>
    <path d="M17.2391 4.81949C17.2391 6.40949 15.9391 7.70949 14.3491 7.70949H9.64906C8.05906 7.70949 6.75906 6.40949 6.75906 4.81949C6.75906 4.25949 6.15906 3.90949 5.65906 4.16949C4.24906 4.91949 3.28906 6.40949 3.28906 8.11949V17.5295C3.28906 19.9895 5.29906 21.9995 7.75906 21.9995H16.2391C18.6991 21.9995 20.7091 19.9895 20.7091 17.5295V8.11949C20.7091 6.40949 19.7491 4.91949 18.3391 4.16949C17.8391 3.90949 17.2391 4.25949 17.2391 4.81949ZM12.3791 16.9495H7.99906C7.58906 16.9495 7.24906 16.6095 7.24906 16.1995C7.24906 15.7895 7.58906 15.4495 7.99906 15.4495H12.3791C12.7891 15.4495 13.1291 15.7895 13.1291 16.1995C13.1291 16.6095 12.7891 16.9495 12.3791 16.9495ZM14.9991 12.9495H7.99906C7.58906 12.9495 7.24906 12.6095 7.24906 12.1995C7.24906 11.7895 7.58906 11.4495 7.99906 11.4495H14.9991C15.4091 11.4495 15.7491 11.7895 15.7491 12.1995C15.7491 12.6095 15.4091 12.9495 14.9991 12.9495Z" fill="#3a416f"/>
    </svg>
</div>

<span class="nav-link-text ms-1">Chalan (DELETE)</span>
</a>
<div class="collapse hide" id="chalan" style="">
<ul class="nav ms-4 ps-3">
<li class="nav-item">
<a class="nav-link {{ ($route == 'chalan.view')? 'active':'' }}" href="{{ route('chalan.view') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Add Chalan</span>
</a>
<a class="nav-link {{ ($route == 'chalan.manage')? 'active':'' }}" href="{{ route('chalan.manage') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Manage Chalan</span>
</a>
@if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2"))
<a class="nav-link {{ ($route == 'sample.chalan.manage')? 'active':'' }}" href="{{ route('sample.chalan.manage') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Manage Sample Chalan</span>
</a>
@endif
</li>
</ul>
</div>
</li>
@else
@endif --}}


{{-- @if($l_c == true)
<li class="nav-item">
<a data-bs-toggle="collapse" href="#l_c" class="nav-link  {{ ($prefix == '/purchase')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#3a416f" height="800px" width="800px" version="1.1" id="Capa_1" viewBox="0 0 209.163 209.163" xml:space="preserve">
    <path d="M155.214,60.485c-0.62,2.206-2.627,3.649-4.811,3.649c-0.447,0-0.902-0.061-1.355-0.188l-40.029-11.241  c-2.659-0.747-4.209-3.507-3.462-6.166c0.747-2.658,3.506-4.209,6.166-3.462l40.03,11.241  C154.41,55.066,155.961,57.826,155.214,60.485z M84.142,182.268c-7.415,0-13.448,6.033-13.448,13.448  c0,7.415,6.033,13.447,13.448,13.447c7.415,0,13.447-6.032,13.447-13.447C97.589,188.301,91.557,182.268,84.142,182.268z   M165.761,182.268c-7.415,0-13.448,6.033-13.448,13.448c0,7.415,6.033,13.447,13.448,13.447c7.415,0,13.448-6.032,13.448-13.447  C179.208,188.301,173.176,182.268,165.761,182.268z M197.442,72.788l-12.996,71.041c-0.435,2.375-2.504,4.1-4.918,4.1H72.198  l2.76,13.012c0.686,3.233,3.583,5.58,6.888,5.58h90.751c2.761,0,5,2.239,5,5s-2.239,5-5,5H81.845c-7.999,0-15.01-5.68-16.67-13.505  l-4.024-18.97L34.382,35.294H16.639c-2.761,0-5-2.239-5-5c0-2.761,2.239-5,5-5H38.3c2.301,0,4.305,1.57,4.855,3.805l9.265,37.639  l29.969,0.032l13.687-48.737c0.001-0.002,0-0.003,0.001-0.005l4.038-14.376c0.747-2.658,3.507-4.21,6.166-3.462l72.448,20.344  c2.659,0.747,4.209,3.507,3.462,6.165c-0.62,2.207-2.627,3.649-4.811,3.65c-0.447,0-0.902-0.06-1.354-0.188l-1.106-0.311  l-1.294,4.608l1.106,0.31c2.658,0.747,4.208,3.507,3.462,6.166l-7.282,25.93l21.62,0.023c1.482,0.001,2.888,0.661,3.837,1.8  C197.315,69.828,197.709,71.329,197.442,72.788z M108.389,11.168l-1.294,4.608l56.9,15.979l1.294-4.608L108.389,11.168z   M95.31,66.783l63.083,0.068l3.061-10.899c0.358-1.277,0.195-2.644-0.454-3.8c-0.649-1.157-1.731-2.007-3.008-2.366L109.13,36.065  c-1.276-0.359-2.643-0.196-3.8,0.454c-1.156,0.649-2.007,1.731-2.366,3.008L95.31,66.783z"/>
    </svg>
</div>

<span class="nav-link-text ms-1">Purchase</span>
</a>
<div class="collapse hide" id="l_c" style="">
<ul class="nav ms-4 ps-3">
<li class="nav-item">
<a class="nav-link {{ ($route == 'purchase.view')? 'active':'' }}" href="{{ route('purchase.view') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Add Purchase</span>
</a>
<a class="nav-link {{ ($route == 'purchase.lcopened')? 'active':'' }}" href="{{ route('purchase.lcopened') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Purchase Opened</span>
</a>

</li>
</ul>
</div>
</li>
@else
@endif --}}


@if($hr == true)
@if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2") || (Auth::guard('admin')->user()->type=="3"))
<li class="nav-item">
<a data-bs-toggle="collapse" href="#hr" class="nav-link  {{ ($prefix == '/hr')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#3a416f" height="800px" width="800px" version="1.1" id="Layer_1" viewBox="0 0 360 360" xml:space="preserve">
    <g id="XMLID_91_">
      <path id="XMLID_92_" d="M355.606,334.381l-63.854-63.855C315.619,241.903,330,205.107,330,165.013c0-90.981-74.019-165-165-165   S0,74.031,0,165.013s74.019,165,165,165c40.107,0,76.914-14.391,105.541-38.271l63.853,63.853   c2.929,2.929,6.768,4.393,10.606,4.393s7.678-1.464,10.606-4.393C361.465,349.736,361.465,340.239,355.606,334.381z M95,235.013   c0-38.663,31.341-70,70-70c-24.852,0-45.001-20.147-45.001-45.001S140.148,75.013,165,75.013s45,20.146,45,44.999   s-20.148,45.001-45,45.001c38.658,0,69.999,31.337,69.999,70H95z"/>
    </g>
    </svg>
</div>

<span class="nav-link-text ms-1">HR</span>
</a>
<div class="collapse hide" id="hr" style="">
<ul class="nav ms-4 ps-3">
<li class="nav-item">
<a class="nav-link {{ ($route == 'employee.add')? 'active':'' }}" href="{{ route('employee.add') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Add Employee</span>
</a>
<a class="nav-link {{ ($route == 'employee.manage')? 'active':'' }}" href="{{ route('employee.manage') }}">
  <span class="sidenav-mini-icon"></span>
  <span class="sidenav-normal">Manage Employee</span>
  </a>
<a class="nav-link {{ ($route == 'designation.add')? 'active':'' }}" href="{{ route('designation.add') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Add Employee Title</span>
</a>
<a class="nav-link {{ ($route == 'department.add')? 'active':'' }}" href="{{ route('department.add') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Add Department</span>
</a>
{{-- <a class="nav-link {{ ($route == 'conveyance.view')? 'active':'' }}" href="{{ route('conveyance.view') }}">
  <span class="sidenav-mini-icon"></span>
  <span class="sidenav-normal">Add Conveyance</span>
  </a>
  <a class="nav-link {{ ($route == 'conveyance.manage')? 'active':'' }}" href="{{ route('conveyance.manage') }}">
    <span class="sidenav-mini-icon"></span>
    <span class="sidenav-normal">Manage Conveyance</span>
    </a> --}}
    <a class="nav-link {{ ($route == 'generate.salary')? 'active':'' }}" href="{{ route('generate.salary') }}">
      <span class="sidenav-mini-icon"></span>
      <span class="sidenav-normal">Generate Salary</span>
      </a>
    <a class="nav-link {{ ($route == 'manage.salary')? 'active':'' }}" href="{{ route('manage.salary') }}">
      <span class="sidenav-mini-icon"></span>
      <span class="sidenav-normal">Manage Salary</span>
      </a>
</li>
</ul>
</div>
</li>
@else
<li class="nav-item">
  <a data-bs-toggle="collapse" href="#hr" class="nav-link  {{ ($prefix == '/hr')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#3a416f" height="800px" width="800px" version="1.1" id="Layer_1" viewBox="0 0 360 360" xml:space="preserve">
      <g id="XMLID_91_">
        <path id="XMLID_92_" d="M355.606,334.381l-63.854-63.855C315.619,241.903,330,205.107,330,165.013c0-90.981-74.019-165-165-165   S0,74.031,0,165.013s74.019,165,165,165c40.107,0,76.914-14.391,105.541-38.271l63.853,63.853   c2.929,2.929,6.768,4.393,10.606,4.393s7.678-1.464,10.606-4.393C361.465,349.736,361.465,340.239,355.606,334.381z M95,235.013   c0-38.663,31.341-70,70-70c-24.852,0-45.001-20.147-45.001-45.001S140.148,75.013,165,75.013s45,20.146,45,44.999   s-20.148,45.001-45,45.001c38.658,0,69.999,31.337,69.999,70H95z"/>
      </g>
      </svg>
  </div>
  
  <span class="nav-link-text ms-1">Conveyance</span>
  </a>
  <div class="collapse hide" id="hr" style="">
  <ul class="nav ms-4 ps-3">
  <li class="nav-item">
  <a class="nav-link {{ ($route == 'conveyance.view')? 'active':'' }}" href="{{ route('conveyance.view') }}">
    <span class="sidenav-mini-icon"></span>
    <span class="sidenav-normal">Add Conveyance</span>
    </a>
    <a class="nav-link {{ ($route == 'conveyance.manage')? 'active':'' }}" href="{{ route('conveyance.manage') }}">
      <span class="sidenav-mini-icon"></span>
      <span class="sidenav-normal">Manage Conveyance</span>
      </a>
   
  </li>
  </ul>
  </div>
  </li>
@endif
@else
@endif


@if($expense == true)
@if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2") || (Auth::guard('admin')->user()->type=="3"))
<li class="nav-item">
<a data-bs-toggle="collapse" href="#expense" class="nav-link  {{ ($prefix == '/expense')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
  <svg xmlns="http://www.w3.org/2000/svg" fill="#3a416f" width="800px" height="800px" viewBox="0 0 32 32">
    <path d="M31.453 4.625c-0.688-1.891-2.177-3.375-4.068-4.063-1.745-0.563-3.333-0.563-6.557-0.563h-9.682c-3.198 0-4.813 0-6.531 0.531-1.896 0.693-3.385 2.188-4.068 4.083-0.547 1.734-0.547 3.333-0.547 6.531v9.693c0 3.214 0 4.802 0.531 6.536 0.688 1.891 2.177 3.375 4.068 4.063 1.734 0.547 3.333 0.547 6.536 0.547h9.703c3.214 0 4.813 0 6.536-0.531 1.896-0.688 3.391-2.182 4.078-4.078 0.547-1.734 0.547-3.333 0.547-6.536v-9.667c0-3.214 0-4.813-0.547-6.547zM23.229 10.802l-1.245 1.24c-0.25 0.229-0.635 0.234-0.891 0.010-1.203-1.010-2.724-1.568-4.292-1.573-1.297 0-2.589 0.427-2.589 1.615 0 1.198 1.385 1.599 2.984 2.198 2.802 0.938 5.12 2.109 5.12 4.854 0 2.99-2.318 5.042-6.104 5.266l-0.349 1.604c-0.063 0.302-0.328 0.516-0.635 0.516h-2.391l-0.12-0.010c-0.354-0.078-0.578-0.432-0.505-0.786l0.375-1.693c-1.438-0.359-2.76-1.083-3.844-2.094v-0.016c-0.25-0.25-0.25-0.656 0-0.906l1.333-1.292c0.255-0.234 0.646-0.234 0.896 0 1.214 1.146 2.839 1.786 4.521 1.76 1.734 0 2.891-0.734 2.891-1.896s-1.172-1.464-3.385-2.292c-2.349-0.839-4.573-2.026-4.573-4.802 0-3.224 2.677-4.797 5.854-4.943l0.333-1.641c0.063-0.302 0.333-0.516 0.641-0.51h2.37l0.135 0.016c0.344 0.078 0.573 0.411 0.495 0.76l-0.359 1.828c1.198 0.396 2.333 1.026 3.302 1.849l0.031 0.031c0.25 0.266 0.25 0.667 0 0.906z"/>
  </svg>
</div>

<span class="nav-link-text ms-1">Expense</span>
</a>
<div class="collapse hide" id="expense" style="">
<ul class="nav ms-4 ps-3">
<li class="nav-item">
<a class="nav-link {{ ($route == 'expenseType.view')? 'active':'' }}" href="{{ route('expenseType.view') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Add Expense Type</span>
</a>
<a class="nav-link {{ ($route == 'expense.view')? 'active':'' }}" href="{{ route('expense.view') }}">
  <span class="sidenav-mini-icon"></span>
  <span class="sidenav-normal">Add Expense</span>
  </a>
<a class="nav-link {{ ($route == 'expense.manage')? 'active':'' }}" href="{{ route('expense.manage') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Manage Expense</span>
</a>



</li>
</ul>
</div>
</li>
@else
<li class="nav-item">
  <a data-bs-toggle="collapse" href="#expense" class="nav-link  {{ ($prefix == '/expense')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
  <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
    <svg xmlns="http://www.w3.org/2000/svg" fill="#3a416f" width="800px" height="800px" viewBox="0 0 32 32">
      <path d="M31.453 4.625c-0.688-1.891-2.177-3.375-4.068-4.063-1.745-0.563-3.333-0.563-6.557-0.563h-9.682c-3.198 0-4.813 0-6.531 0.531-1.896 0.693-3.385 2.188-4.068 4.083-0.547 1.734-0.547 3.333-0.547 6.531v9.693c0 3.214 0 4.802 0.531 6.536 0.688 1.891 2.177 3.375 4.068 4.063 1.734 0.547 3.333 0.547 6.536 0.547h9.703c3.214 0 4.813 0 6.536-0.531 1.896-0.688 3.391-2.182 4.078-4.078 0.547-1.734 0.547-3.333 0.547-6.536v-9.667c0-3.214 0-4.813-0.547-6.547zM23.229 10.802l-1.245 1.24c-0.25 0.229-0.635 0.234-0.891 0.010-1.203-1.010-2.724-1.568-4.292-1.573-1.297 0-2.589 0.427-2.589 1.615 0 1.198 1.385 1.599 2.984 2.198 2.802 0.938 5.12 2.109 5.12 4.854 0 2.99-2.318 5.042-6.104 5.266l-0.349 1.604c-0.063 0.302-0.328 0.516-0.635 0.516h-2.391l-0.12-0.010c-0.354-0.078-0.578-0.432-0.505-0.786l0.375-1.693c-1.438-0.359-2.76-1.083-3.844-2.094v-0.016c-0.25-0.25-0.25-0.656 0-0.906l1.333-1.292c0.255-0.234 0.646-0.234 0.896 0 1.214 1.146 2.839 1.786 4.521 1.76 1.734 0 2.891-0.734 2.891-1.896s-1.172-1.464-3.385-2.292c-2.349-0.839-4.573-2.026-4.573-4.802 0-3.224 2.677-4.797 5.854-4.943l0.333-1.641c0.063-0.302 0.333-0.516 0.641-0.51h2.37l0.135 0.016c0.344 0.078 0.573 0.411 0.495 0.76l-0.359 1.828c1.198 0.396 2.333 1.026 3.302 1.849l0.031 0.031c0.25 0.266 0.25 0.667 0 0.906z"/>
    </svg>
  </div>
  
  <span class="nav-link-text ms-1">Expense</span>
  </a>
  <div class="collapse hide" id="expense" style="">
  <ul class="nav ms-4 ps-3">
  <li class="nav-item">
 
  <a class="nav-link {{ ($route == 'expense.view')? 'active':'' }}" href="{{ route('expense.view') }}">
    <span class="sidenav-mini-icon"></span>
    <span class="sidenav-normal">Add Expense</span>
    </a>
  <a class="nav-link {{ ($route == 'expense.manage')? 'active':'' }}" href="{{ route('expense.manage') }}">
  <span class="sidenav-mini-icon"></span>
  <span class="sidenav-normal">Manage Expense</span>
  </a>
  
  </li>
  </ul>
  </div>
  </li>
@endif
@endif


@if($supplier == true)
<li class="nav-item">
<a data-bs-toggle="collapse" href="#supplier" class="nav-link  {{ ($prefix == '/supplier')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 122.88 94.18" style="enable-background:new 0 0 122.88 94.18" xml:space="preserve"><style type="text/css"><![CDATA[
    .st0{fill-rule:evenodd;clip-rule:evenodd;}
  ]]></style><g><path class="st0" d="M34.02,65.66c5.81,12.12,23.43,12.54,28.99,0.07c-1.51-1.54-2.64-3.19-3.76-4.82 c-0.18-0.26-0.37-0.54-0.56-0.8c-2.69,2.13-5.94,3.49-10.19,3.48c-4.58-0.01-8.03-1.77-10.86-4.35c-0.17-0.15-0.34-0.31-0.5-0.47 c-0.4,1.13-0.92,2.47-1.47,3.73C35.13,63.69,34.56,64.84,34.02,65.66L34.02,65.66L34.02,65.66z M104.88,56.89V78.4l-8.6-5.04 l-8.66,5.47V56.89H75.39c-1.16,0-2.12,0.95-2.12,2.12v29.34c0,1.16,0.96,2.11,2.12,2.11h41.73c1.16,0,2.11-0.96,2.11-2.11V59 c0-1.16-0.95-2.12-2.11-2.12H104.88L104.88,56.89z M91.27,56.89v15.34l4.94-3.12l5.03,2.95V56.89H91.27L91.27,56.89z M75.39,53.24 h12.24h17.26h12.24c1.58,0,3.01,0.65,4.06,1.69l0.01,0.01c1.04,1.04,1.69,2.48,1.69,4.06v29.34c0,1.57-0.65,3.01-1.69,4.05 l-0.01,0.01c-1.05,1.04-2.49,1.69-4.05,1.69H93.79c-0.06,0.03-0.13,0.06-0.19,0.08H2.51c-3.54-0.7-5.39-13.17,8.9-21.14 c5.77-3.22,14.63-4.28,20.86-8.63c0.46-0.69,0.95-1.69,1.43-2.77c0.71-1.64,1.37-3.42,1.79-4.63c-1.75-2.05-3.23-4.37-4.67-6.66 l-4.73-6.14c-1.73-2.58-2.62-4.94-2.68-6.86c-0.03-0.91,0.13-1.74,0.46-2.46c0.36-0.76,0.89-1.39,1.63-1.89 c0.34-0.23,0.72-0.42,1.15-0.58c-0.31-4.07-0.42-7.83-0.23-12.14c0.1-1.02,0.3-2.04,0.58-3.06c5.72-20.36,35.63-22.69,39.84-6.77 c2.62,2.84,4.27,6.6,4.63,11.58L71.17,32.9l0,0c1.31,0.4,2.15,1.23,2.49,2.58c0.38,1.49-0.03,3.59-1.3,6.46l0,0 c-0.02,0.05-0.05,0.1-0.08,0.15l-5.39,7.49c-1.97,3.26-3.99,6.53-6.61,9.1c0.23,0.34,0.47,0.69,0.71,1.02 c1.07,1.56,2.14,3.13,3.53,4.53c0.05,0.04,0.08,0.08,0.11,0.13l0,0c1.57,1.11,3.25,2,4.99,2.77V59c0-1.59,0.65-3.03,1.69-4.07 C72.36,53.89,73.8,53.24,75.39,53.24L75.39,53.24z M29.38,34.6c-1.04,0.04-1.84,0.25-2.38,0.62c-0.31,0.21-0.54,0.47-0.69,0.79 c-0.16,0.35-0.24,0.78-0.23,1.27c0.04,1.44,0.8,3.32,2.25,5.48l0.02,0.03l0,0l4.73,6.14c1.89,3.02,3.88,6.08,6.35,8.34 c2.38,2.17,5.26,3.64,9.06,3.65c4.13,0.01,7.15-1.51,9.59-3.81c2.55-2.39,4.56-5.65,6.54-8.91l5.32-7.39 c1-2.27,1.35-3.78,1.13-4.66c-0.13-0.53-0.71-0.79-1.71-0.84c-0.21-0.01-0.43-0.01-0.65-0.01c-0.24,0.01-0.49,0.02-0.74,0.05 c-0.14,0.01-0.28,0-0.41-0.03c-0.47,0.03-0.96-0.01-1.46-0.08l1.82-6.69c-13.53,2.13-23.65-7.92-37.95-2.01l1.03,8.13 C30.42,34.69,29.89,34.67,29.38,34.6L29.38,34.6L29.38,34.6L29.38,34.6z" fill="#3a416f"/></g></svg>
</div>

<span class="nav-link-text ms-1">Vendor</span>
</a>
<div class="collapse hide" id="supplier" style="">
<ul class="nav ms-4 ps-3">
<li class="nav-item">
<a class="nav-link {{ ($route == 'supplier.add')? 'active':'' }}" href="{{ route('supplier.add') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Add Vendor</span>
</a>
<a class="nav-link {{ ($route == 'supplier.manage')? 'active':'' }}" href="{{ route('supplier.manage') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Manage Vendor</span>
</a>
<a class="nav-link {{ ($route == 'purchase.add')? 'active':'' }}" href="{{ route('purchase.add') }}">
  <span class="sidenav-mini-icon"></span>
  <span class="sidenav-normal"> Vendor Purchase</span>
  </a>
  <a class="nav-link {{ ($route == 'purchase.manage')? 'active':'' }}" href="{{ route('purchase.manage') }}">
  <span class="sidenav-mini-icon"></span>
  <span class="sidenav-normal">Manage Vendor Purchase</span>
  </a>
</li>
</ul>
</div>
</li>
@else
@endif


@if($bank == true)
<li class="nav-item">
<a data-bs-toggle="collapse" href="#bank" class="nav-link  {{ ($prefix == '/bank')?'active':'' }}" aria-controls="ecommerceExamples" role="button">
<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 122.88 94.18" style="enable-background:new 0 0 122.88 94.18" xml:space="preserve"><style type="text/css"><![CDATA[
    .st0{fill-rule:evenodd;clip-rule:evenodd;}
  ]]></style><g><path class="st0" d="M34.02,65.66c5.81,12.12,23.43,12.54,28.99,0.07c-1.51-1.54-2.64-3.19-3.76-4.82 c-0.18-0.26-0.37-0.54-0.56-0.8c-2.69,2.13-5.94,3.49-10.19,3.48c-4.58-0.01-8.03-1.77-10.86-4.35c-0.17-0.15-0.34-0.31-0.5-0.47 c-0.4,1.13-0.92,2.47-1.47,3.73C35.13,63.69,34.56,64.84,34.02,65.66L34.02,65.66L34.02,65.66z M104.88,56.89V78.4l-8.6-5.04 l-8.66,5.47V56.89H75.39c-1.16,0-2.12,0.95-2.12,2.12v29.34c0,1.16,0.96,2.11,2.12,2.11h41.73c1.16,0,2.11-0.96,2.11-2.11V59 c0-1.16-0.95-2.12-2.11-2.12H104.88L104.88,56.89z M91.27,56.89v15.34l4.94-3.12l5.03,2.95V56.89H91.27L91.27,56.89z M75.39,53.24 h12.24h17.26h12.24c1.58,0,3.01,0.65,4.06,1.69l0.01,0.01c1.04,1.04,1.69,2.48,1.69,4.06v29.34c0,1.57-0.65,3.01-1.69,4.05 l-0.01,0.01c-1.05,1.04-2.49,1.69-4.05,1.69H93.79c-0.06,0.03-0.13,0.06-0.19,0.08H2.51c-3.54-0.7-5.39-13.17,8.9-21.14 c5.77-3.22,14.63-4.28,20.86-8.63c0.46-0.69,0.95-1.69,1.43-2.77c0.71-1.64,1.37-3.42,1.79-4.63c-1.75-2.05-3.23-4.37-4.67-6.66 l-4.73-6.14c-1.73-2.58-2.62-4.94-2.68-6.86c-0.03-0.91,0.13-1.74,0.46-2.46c0.36-0.76,0.89-1.39,1.63-1.89 c0.34-0.23,0.72-0.42,1.15-0.58c-0.31-4.07-0.42-7.83-0.23-12.14c0.1-1.02,0.3-2.04,0.58-3.06c5.72-20.36,35.63-22.69,39.84-6.77 c2.62,2.84,4.27,6.6,4.63,11.58L71.17,32.9l0,0c1.31,0.4,2.15,1.23,2.49,2.58c0.38,1.49-0.03,3.59-1.3,6.46l0,0 c-0.02,0.05-0.05,0.1-0.08,0.15l-5.39,7.49c-1.97,3.26-3.99,6.53-6.61,9.1c0.23,0.34,0.47,0.69,0.71,1.02 c1.07,1.56,2.14,3.13,3.53,4.53c0.05,0.04,0.08,0.08,0.11,0.13l0,0c1.57,1.11,3.25,2,4.99,2.77V59c0-1.59,0.65-3.03,1.69-4.07 C72.36,53.89,73.8,53.24,75.39,53.24L75.39,53.24z M29.38,34.6c-1.04,0.04-1.84,0.25-2.38,0.62c-0.31,0.21-0.54,0.47-0.69,0.79 c-0.16,0.35-0.24,0.78-0.23,1.27c0.04,1.44,0.8,3.32,2.25,5.48l0.02,0.03l0,0l4.73,6.14c1.89,3.02,3.88,6.08,6.35,8.34 c2.38,2.17,5.26,3.64,9.06,3.65c4.13,0.01,7.15-1.51,9.59-3.81c2.55-2.39,4.56-5.65,6.54-8.91l5.32-7.39 c1-2.27,1.35-3.78,1.13-4.66c-0.13-0.53-0.71-0.79-1.71-0.84c-0.21-0.01-0.43-0.01-0.65-0.01c-0.24,0.01-0.49,0.02-0.74,0.05 c-0.14,0.01-0.28,0-0.41-0.03c-0.47,0.03-0.96-0.01-1.46-0.08l1.82-6.69c-13.53,2.13-23.65-7.92-37.95-2.01l1.03,8.13 C30.42,34.69,29.89,34.67,29.38,34.6L29.38,34.6L29.38,34.6L29.38,34.6z" fill="#3a416f"/></g></svg>
</div>

<span class="nav-link-text ms-1">Bank</span>
</a>
<div class="collapse hide" id="bank" style="">
<ul class="nav ms-4 ps-3">
<li class="nav-item">
<a class="nav-link {{ ($route == 'bank.view')? 'active':'' }}" href="{{ route('bank.view') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Manage Bank</span>
</a>
<a class="nav-link {{ ($route == 'deposit.view')? 'active':'' }}" href="{{ route('deposit.view') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Manage Banking</span>
</a>
@if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2") || (Auth::guard('admin')->user()->type=="3"))
<a class="nav-link {{ ($route == 'deposit.all')? 'active':'' }}" href="{{ route('deposit.all') }}">
<span class="sidenav-mini-icon"></span>
<span class="sidenav-normal">Transactions</span>
</a>
@endif
</li>
</ul>
</div>
</li>
@else
@endif



      @if($adminuserrole  == true)
      <li class="nav-item">
        <a class="nav-link {{ ($route == 'all.admin.user')? 'active':'' }}" href="{{ route('all.admin.user') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">

              <defs>
              </defs>
              <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                <path d="M 38.877 40.375 L 38.877 40.375 c -9.415 0 -17.118 -7.703 -17.118 -17.118 v -6.139 C 21.759 7.703 29.462 0 38.877 0 h 0 c 9.415 0 17.118 7.703 17.118 17.118 v 6.139 C 55.995 32.672 48.292 40.375 38.877 40.375 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                <path d="M 50.103 75.603 c 0 -10.209 7.969 -18.535 18.022 -19.154 c -3.98 -7.222 -11.159 -12.461 -19.609 -13.722 c -2.896 1.499 -6.169 2.363 -9.639 2.363 c -3.47 0 -6.743 -0.863 -9.639 -2.363 C 16.296 44.659 6.286 55.889 6.286 69.347 v 17.707 C 6.286 88.674 7.612 90 9.232 90 h 47.391 C 52.633 86.479 50.103 81.342 50.103 75.603 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                <path d="M 69.317 71.603 c -2.209 0 -4 1.791 -4 4 c 0 2.209 1.791 4 4 4 c 2.209 0 4 -1.791 4 -4 C 73.317 73.394 71.526 71.603 69.317 71.603 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                <path d="M 69.317 61.206 c -7.951 0 -14.397 6.446 -14.397 14.397 C 54.92 83.554 61.366 90 69.317 90 c 7.951 0 14.397 -6.446 14.397 -14.397 C 83.714 67.652 77.268 61.206 69.317 61.206 z M 77.912 77.408 c 0 0.137 -0.111 0.249 -0.249 0.249 h -1.138 c -0.159 0.56 -0.379 1.095 -0.657 1.593 l 0.803 0.803 c 0.097 0.097 0.097 0.255 0 0.352 l -2.552 2.552 c -0.097 0.097 -0.255 0.097 -0.352 0 l -0.803 -0.803 c -0.499 0.278 -1.033 0.498 -1.593 0.657 v 1.138 c 0 0.137 -0.111 0.249 -0.249 0.249 h -3.61 c -0.137 0 -0.249 -0.111 -0.249 -0.249 v -1.138 c -0.56 -0.159 -1.095 -0.379 -1.593 -0.657 l -0.803 0.803 c -0.097 0.097 -0.255 0.097 -0.352 0 l -2.552 -2.552 c -0.097 -0.097 -0.097 -0.255 0 -0.352 l 0.803 -0.803 c -0.278 -0.499 -0.498 -1.033 -0.657 -1.593 h -1.138 c -0.137 0 -0.249 -0.111 -0.249 -0.249 v -3.61 c 0 -0.137 0.111 -0.249 0.249 -0.249 h 1.138 c 0.159 -0.56 0.379 -1.095 0.657 -1.593 l -0.803 -0.803 c -0.097 -0.097 -0.097 -0.255 0 -0.352 l 2.552 -2.552 c 0.097 -0.097 0.255 -0.097 0.352 0 l 0.803 0.803 c 0.499 -0.278 1.033 -0.498 1.593 -0.657 v -1.138 c 0 -0.137 0.111 -0.249 0.249 -0.249 h 3.61 c 0.137 0 0.249 0.111 0.249 0.249 v 1.138 c 0.56 0.159 1.095 0.379 1.593 0.657 l 0.803 -0.803 c 0.097 -0.097 0.255 -0.097 0.352 0 l 2.552 2.552 c 0.097 0.097 0.097 0.255 0 0.352 l -0.803 0.803 c 0.278 0.499 0.498 1.033 0.657 1.593 h 1.138 c 0.137 0 0.249 0.111 0.249 0.249 V 77.408 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
              </g>
              </svg>
          </div>
          <span class="nav-link-text ms-1">Admin User</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ ($route == 'notice.view')? 'active':'' }}" href="{{ route('notice.view') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">

              <defs>
              </defs>
              <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                <path d="M 38.877 40.375 L 38.877 40.375 c -9.415 0 -17.118 -7.703 -17.118 -17.118 v -6.139 C 21.759 7.703 29.462 0 38.877 0 h 0 c 9.415 0 17.118 7.703 17.118 17.118 v 6.139 C 55.995 32.672 48.292 40.375 38.877 40.375 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                <path d="M 50.103 75.603 c 0 -10.209 7.969 -18.535 18.022 -19.154 c -3.98 -7.222 -11.159 -12.461 -19.609 -13.722 c -2.896 1.499 -6.169 2.363 -9.639 2.363 c -3.47 0 -6.743 -0.863 -9.639 -2.363 C 16.296 44.659 6.286 55.889 6.286 69.347 v 17.707 C 6.286 88.674 7.612 90 9.232 90 h 47.391 C 52.633 86.479 50.103 81.342 50.103 75.603 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                <path d="M 69.317 71.603 c -2.209 0 -4 1.791 -4 4 c 0 2.209 1.791 4 4 4 c 2.209 0 4 -1.791 4 -4 C 73.317 73.394 71.526 71.603 69.317 71.603 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                <path d="M 69.317 61.206 c -7.951 0 -14.397 6.446 -14.397 14.397 C 54.92 83.554 61.366 90 69.317 90 c 7.951 0 14.397 -6.446 14.397 -14.397 C 83.714 67.652 77.268 61.206 69.317 61.206 z M 77.912 77.408 c 0 0.137 -0.111 0.249 -0.249 0.249 h -1.138 c -0.159 0.56 -0.379 1.095 -0.657 1.593 l 0.803 0.803 c 0.097 0.097 0.097 0.255 0 0.352 l -2.552 2.552 c -0.097 0.097 -0.255 0.097 -0.352 0 l -0.803 -0.803 c -0.499 0.278 -1.033 0.498 -1.593 0.657 v 1.138 c 0 0.137 -0.111 0.249 -0.249 0.249 h -3.61 c -0.137 0 -0.249 -0.111 -0.249 -0.249 v -1.138 c -0.56 -0.159 -1.095 -0.379 -1.593 -0.657 l -0.803 0.803 c -0.097 0.097 -0.255 0.097 -0.352 0 l -2.552 -2.552 c -0.097 -0.097 -0.097 -0.255 0 -0.352 l 0.803 -0.803 c -0.278 -0.499 -0.498 -1.033 -0.657 -1.593 h -1.138 c -0.137 0 -0.249 -0.111 -0.249 -0.249 v -3.61 c 0 -0.137 0.111 -0.249 0.249 -0.249 h 1.138 c 0.159 -0.56 0.379 -1.095 0.657 -1.593 l -0.803 -0.803 c -0.097 -0.097 -0.097 -0.255 0 -0.352 l 2.552 -2.552 c 0.097 -0.097 0.255 -0.097 0.352 0 l 0.803 0.803 c 0.499 -0.278 1.033 -0.498 1.593 -0.657 v -1.138 c 0 -0.137 0.111 -0.249 0.249 -0.249 h 3.61 c 0.137 0 0.249 0.111 0.249 0.249 v 1.138 c 0.56 0.159 1.095 0.379 1.593 0.657 l 0.803 -0.803 c 0.097 -0.097 0.255 -0.097 0.352 0 l 2.552 2.552 c 0.097 0.097 0.097 0.255 0 0.352 l -0.803 0.803 c 0.278 0.499 0.498 1.033 0.657 1.593 h 1.138 c 0.137 0 0.249 0.111 0.249 0.249 V 77.408 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
              </g>
              </svg>
          </div>
          <span class="nav-link-text ms-1">Notice Board</span>
        </a>
      </li>

      {{-- Site Settings --}}
      <li class="nav-item">
        <a class="nav-link {{ ($route == 'site.view')? 'active':'' }}" href="{{ route('site.view') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">

              <defs>
              </defs>
              <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                <path d="M 38.877 40.375 L 38.877 40.375 c -9.415 0 -17.118 -7.703 -17.118 -17.118 v -6.139 C 21.759 7.703 29.462 0 38.877 0 h 0 c 9.415 0 17.118 7.703 17.118 17.118 v 6.139 C 55.995 32.672 48.292 40.375 38.877 40.375 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                <path d="M 50.103 75.603 c 0 -10.209 7.969 -18.535 18.022 -19.154 c -3.98 -7.222 -11.159 -12.461 -19.609 -13.722 c -2.896 1.499 -6.169 2.363 -9.639 2.363 c -3.47 0 -6.743 -0.863 -9.639 -2.363 C 16.296 44.659 6.286 55.889 6.286 69.347 v 17.707 C 6.286 88.674 7.612 90 9.232 90 h 47.391 C 52.633 86.479 50.103 81.342 50.103 75.603 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                <path d="M 69.317 71.603 c -2.209 0 -4 1.791 -4 4 c 0 2.209 1.791 4 4 4 c 2.209 0 4 -1.791 4 -4 C 73.317 73.394 71.526 71.603 69.317 71.603 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                <path d="M 69.317 61.206 c -7.951 0 -14.397 6.446 -14.397 14.397 C 54.92 83.554 61.366 90 69.317 90 c 7.951 0 14.397 -6.446 14.397 -14.397 C 83.714 67.652 77.268 61.206 69.317 61.206 z M 77.912 77.408 c 0 0.137 -0.111 0.249 -0.249 0.249 h -1.138 c -0.159 0.56 -0.379 1.095 -0.657 1.593 l 0.803 0.803 c 0.097 0.097 0.097 0.255 0 0.352 l -2.552 2.552 c -0.097 0.097 -0.255 0.097 -0.352 0 l -0.803 -0.803 c -0.499 0.278 -1.033 0.498 -1.593 0.657 v 1.138 c 0 0.137 -0.111 0.249 -0.249 0.249 h -3.61 c -0.137 0 -0.249 -0.111 -0.249 -0.249 v -1.138 c -0.56 -0.159 -1.095 -0.379 -1.593 -0.657 l -0.803 0.803 c -0.097 0.097 -0.255 0.097 -0.352 0 l -2.552 -2.552 c -0.097 -0.097 -0.097 -0.255 0 -0.352 l 0.803 -0.803 c -0.278 -0.499 -0.498 -1.033 -0.657 -1.593 h -1.138 c -0.137 0 -0.249 -0.111 -0.249 -0.249 v -3.61 c 0 -0.137 0.111 -0.249 0.249 -0.249 h 1.138 c 0.159 -0.56 0.379 -1.095 0.657 -1.593 l -0.803 -0.803 c -0.097 -0.097 -0.097 -0.255 0 -0.352 l 2.552 -2.552 c 0.097 -0.097 0.255 -0.097 0.352 0 l 0.803 0.803 c 0.499 -0.278 1.033 -0.498 1.593 -0.657 v -1.138 c 0 -0.137 0.111 -0.249 0.249 -0.249 h 3.61 c 0.137 0 0.249 0.111 0.249 0.249 v 1.138 c 0.56 0.159 1.095 0.379 1.593 0.657 l 0.803 -0.803 c 0.097 -0.097 0.255 -0.097 0.352 0 l 2.552 2.552 c 0.097 0.097 0.097 0.255 0 0.352 l -0.803 0.803 c 0.278 0.499 0.498 1.033 0.657 1.593 h 1.138 c 0.137 0 0.249 0.111 0.249 0.249 V 77.408 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
              </g>
              </svg>
          </div>
          <span class="nav-link-text ms-1">Site Setting</span>
        </a>
      </li>


       {{-- CHAT GPT --}}
       <li class="nav-item">
        <a class="nav-link {{ ($route == 'openai.view')? 'active':'' }}" href="{{ route('openai.view') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">

              <defs>
              </defs>
              <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                <path d="M 38.877 40.375 L 38.877 40.375 c -9.415 0 -17.118 -7.703 -17.118 -17.118 v -6.139 C 21.759 7.703 29.462 0 38.877 0 h 0 c 9.415 0 17.118 7.703 17.118 17.118 v 6.139 C 55.995 32.672 48.292 40.375 38.877 40.375 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                <path d="M 50.103 75.603 c 0 -10.209 7.969 -18.535 18.022 -19.154 c -3.98 -7.222 -11.159 -12.461 -19.609 -13.722 c -2.896 1.499 -6.169 2.363 -9.639 2.363 c -3.47 0 -6.743 -0.863 -9.639 -2.363 C 16.296 44.659 6.286 55.889 6.286 69.347 v 17.707 C 6.286 88.674 7.612 90 9.232 90 h 47.391 C 52.633 86.479 50.103 81.342 50.103 75.603 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                <path d="M 69.317 71.603 c -2.209 0 -4 1.791 -4 4 c 0 2.209 1.791 4 4 4 c 2.209 0 4 -1.791 4 -4 C 73.317 73.394 71.526 71.603 69.317 71.603 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                <path d="M 69.317 61.206 c -7.951 0 -14.397 6.446 -14.397 14.397 C 54.92 83.554 61.366 90 69.317 90 c 7.951 0 14.397 -6.446 14.397 -14.397 C 83.714 67.652 77.268 61.206 69.317 61.206 z M 77.912 77.408 c 0 0.137 -0.111 0.249 -0.249 0.249 h -1.138 c -0.159 0.56 -0.379 1.095 -0.657 1.593 l 0.803 0.803 c 0.097 0.097 0.097 0.255 0 0.352 l -2.552 2.552 c -0.097 0.097 -0.255 0.097 -0.352 0 l -0.803 -0.803 c -0.499 0.278 -1.033 0.498 -1.593 0.657 v 1.138 c 0 0.137 -0.111 0.249 -0.249 0.249 h -3.61 c -0.137 0 -0.249 -0.111 -0.249 -0.249 v -1.138 c -0.56 -0.159 -1.095 -0.379 -1.593 -0.657 l -0.803 0.803 c -0.097 0.097 -0.255 0.097 -0.352 0 l -2.552 -2.552 c -0.097 -0.097 -0.097 -0.255 0 -0.352 l 0.803 -0.803 c -0.278 -0.499 -0.498 -1.033 -0.657 -1.593 h -1.138 c -0.137 0 -0.249 -0.111 -0.249 -0.249 v -3.61 c 0 -0.137 0.111 -0.249 0.249 -0.249 h 1.138 c 0.159 -0.56 0.379 -1.095 0.657 -1.593 l -0.803 -0.803 c -0.097 -0.097 -0.097 -0.255 0 -0.352 l 2.552 -2.552 c 0.097 -0.097 0.255 -0.097 0.352 0 l 0.803 0.803 c 0.499 -0.278 1.033 -0.498 1.593 -0.657 v -1.138 c 0 -0.137 0.111 -0.249 0.249 -0.249 h 3.61 c 0.137 0 0.249 0.111 0.249 0.249 v 1.138 c 0.56 0.159 1.095 0.379 1.593 0.657 l 0.803 -0.803 c 0.097 -0.097 0.255 -0.097 0.352 0 l 2.552 2.552 c 0.097 0.097 0.097 0.255 0 0.352 l -0.803 0.803 c 0.278 0.499 0.498 1.033 0.657 1.593 h 1.138 c 0.137 0 0.249 0.111 0.249 0.249 V 77.408 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #3a416f; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
              </g>
              </svg>
          </div>
          <span class="nav-link-text ms-1">Open AI</span>
        </a>
      </li>

      @else
      @endif

      {{-- <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
      </li> --}}

    </ul>
  </div>
  
</aside>