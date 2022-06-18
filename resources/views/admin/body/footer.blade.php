
@php
$email=\App\Models\Setting::where('key', 'school_email')->pluck('value')->first();

@endphp
<footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">FAQ</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">School</a>
		  </li>
		</ul>
    </div>
	  &copy; 2022 <a href="#"></a>{{ $email }}
  </footer>
