<img src="/images/icons/logo2.png" alt="IMG-LOGO" style="
    padding-top: 30px;
">

<script src="{{ url('') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>