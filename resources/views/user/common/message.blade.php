@if(session()->has('success'))
<script>
    $.growl.notice({
        title: "Notice!",
        message: "{{ Session::get('success') }}"
    });
</script>
@elseif(session()->has('warning'))
<script>
    $.growl.warning({
        title: "Notice!",
        message: "{{ Session::get('warning') }}"
    });
</script>
@elseif(session()->has('error'))
<script>
    $.growl.warning({
        title: "Notice!",
        message: "{{ Session::get('error') }}"
    });
</script>
@endif