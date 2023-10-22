@if(session()->has('password_reset'))
<script>
    $(document).ready(function() {
        swal('Congratulations!', 'Your message has been succesfully sent', 'success');
    })
</script>
@elseif(session()->has('password_update'))
<script>
    $(document).ready(function() {
        swal('Congratulations!', 'Your password reset link has been sent to your mail', 'success');
    })
</script>
@elseif(session()->has('error_login'))
<script>
    $(document).ready(function() {
        swal('Oops!', 'The provided credentials do not match our records.', 'error');
    })
</script>
@endif