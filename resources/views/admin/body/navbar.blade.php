@php
        // $fullUrl = request()->fullUrl();
        // $prefix = request()->route()->getPrefix();
        // $pathAfterPrefix = ucfirst(ltrim(Str::after($fullUrl, $prefix), '/'));

		$fullUrl = request()->fullUrl();
    $prefix = request()->route()->getPrefix();
    $pathAfterPrefix = '';

    // Check if $prefix is not empty before attempting to get pathAfterPrefix
    if ($prefix) {
        $pathAfterPrefix = ucfirst(ltrim(Str::after($fullUrl, $prefix), '/'));
    }
    
    // Check if $pathAfterPrefix is not empty before exploding
    $pathAfterPrefixArray = $pathAfterPrefix ? explode('/', $pathAfterPrefix) : [];

@endphp


<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
	<div class="container-fluid py-1 px-3">
	  <nav aria-label="breadcrumb">
		<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
			@if ($prefix)
				<li class="breadcrumb-item text-sm">
					<a class="opacity-5 text-dark" href="javascript:;">{{ ucfirst($prefix) }}</a>
				</li>
			@endif
			@foreach ($pathAfterPrefixArray as $segment)
				<li class="breadcrumb-item text-sm text-dark">{{ $segment }}</li>
			@endforeach
		</ol>
		<h6 class="font-weight-bolder mb-0">{{ ucfirst($prefix) }}</h6>

	  </nav>
	  <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
		<div class="ms-md-auto pe-md-3 d-flex align-items-center" style="position: relative;  width: 400px;">
    <div class="input-group">
        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
        <input type="text" class="form-control" id="search-input" placeholder="Type here..." onkeyup="performSearch()" autocomplete="off">
    </div>
    <!-- Dropdown-style Results Container -->
    <div id="search-results" class="search-results-container">
        <!-- Results will appear here -->
    </div>
</div>

<!-- CSS for Styling the Search Bar and Dropdown -->
<style>
    .input-group {
        border-radius: 5px;
        overflow: hidden;
    }

    .search-results-container {
        display: none; /* Hidden by default, shows when results are available */
        position: absolute;
        top: 100%; /* Positioned right below the search bar */
        left: 0;
        width: 100%;
        max-height: 300px;
        overflow-y: auto;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 0 0 5px 5px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .search-item {
        padding: 10px 15px;
        border-bottom: 1px solid #eee;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .search-item:hover {
        background-color: #f8f9fa;
    }

    .search-item a {
        font-weight: 600;
        color: #333;
        text-decoration: none;
    }

    .search-item p {
        margin: 5px 0 0;
        font-size: 0.9em;
        color: #555;
    }
</style>

		<ul class="navbar-nav  justify-content-end">
		{{-- @if(Auth::guard('admin')->user()->type=="1" || (Auth::guard('admin')->user()->type=="2"))
		  <li class="nav-item d-flex align-items-center">
			<a href="{{ route('sample.chalan.manage') }}" class="nav-link text-body font-weight-bold px-0">
			  <i class="fa fa-file-text me-sm-1"></i>
			  <span class="d-sm-inline d-none">View Sample Chalan</span>
			</a>
		  </li>
		  @endif --}}
		  <li class="nav-item d-xl ps-3 d-flex align-items-center">
			<a href="{{ route('admin.logout') }}" class="nav-link text-body font-weight-bold px-0">
			  <i class="fa fa-power-off me-sm-1"></i>
			  <span class="d-sm-inline d-none">Logout</span>
			</a>
		  </li>
		  <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
			<a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
			  <div class="sidenav-toggler-inner">
				<i class="sidenav-toggler-line"></i>
				<i class="sidenav-toggler-line"></i>
				<i class="sidenav-toggler-line"></i>
			  </div>
			</a>
		  </li>
		  {{-- <li class="nav-item px-3 d-flex align-items-center">
			<a href="javascript:;" class="nav-link text-body p-0">
			  <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
			</a>
		  </li> --}}
		  <li class="nav-item dropdown px-3 d-flex align-items-center">
			<a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
			  <i class="fa fa-bell cursor-pointer"></i>
			</a>
			<ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
			  <li class="mb-2">
				<a class="dropdown-item border-radius-md" href="{{ route('admin.change.password') }}				">
				  <div class="d-flex py-1">
					<div class="my-auto">
					  <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
					</div>
					<div class="d-flex flex-column justify-content-center">
					  <h6 class="text-sm font-weight-normal mb-1">
						<span class="font-weight-bold">Change</span> Password
					  </h6>
					 
					</div>
				  </div>
				</a>
			  </li>
			
			</ul>
		  </li>
		</ul>
	  </div>
	</div>
  </nav>

  <script>
    function performSearch() {
        let query = document.getElementById('search-input').value;
        let resultsContainer = document.getElementById('search-results');

        if (query.length > 2) {
            fetch(`/search?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    resultsContainer.innerHTML = ''; // Clear previous results
                    if (data.results && data.results.length > 0) {
                        resultsContainer.style.display = 'block'; // Show results container
                        data.results.forEach(result => {
                            let resultItem = document.createElement('div');
                            resultItem.classList.add('search-item');
                            resultItem.innerHTML = `
                                <a href="${result.url}">${result.title}</a>
                                <p>${result.excerpt}</p>
                            `;
                            resultsContainer.appendChild(resultItem);
                        });
                    } else {
                        resultsContainer.style.display = 'none'; // Hide if no results
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            resultsContainer.style.display = 'none'; // Hide results container if query is short
        }
    }

    // Optional: Hide the dropdown when clicking outside of it
    document.addEventListener('click', function(event) {
        let searchInput = document.getElementById('search-input');
        let resultsContainer = document.getElementById('search-results');
        
        if (!searchInput.contains(event.target) && !resultsContainer.contains(event.target)) {
            resultsContainer.style.display = 'none';
        }
    });
</script>