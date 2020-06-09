<footer class="main-footer">
    <a href="{{ url('https://siaji.com') }}" target="_tab">
        <img src="{{ asset('assets/images/siaji-logo.svg') }}" class="sia-logo">
    </a>

    <span class="text-center text-md-left"><strong>Copyright &copy; 2014-{{ date("Y") }} <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.</span>
    <div class="float-md-right text-center text-md-left">
        <span><b>Version</b> 3.0.5</span> /
        <span>Engine {{ $wversion ?? '1.0.0' }}</span>
    </div>
</footer>