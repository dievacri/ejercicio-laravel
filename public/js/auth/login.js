$( document ).ready(function() {
    $( "#loginForm" ).submit(function( event ) {
        event.preventDefault();
        data = {
            user: $("#user").val(),
            password: $("#password").val(),
        };

        $.ajax({
            url: "/auth/login",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: JSON.stringify(data),
            dataType: 'json',
            contentType: 'application/json',
        }).done(function(res) {
            if(res.rst === 0) {
                if(res.errors.user) {
                    errors = res.errors.user;
                    for (i = 0; i < errors.length; i++) {
                        toastr.error(errors[i]);
                    }
                }else if(res.errors.password) {
                    errors = res.errors.password;
                    for (i = 0; i < errors.length; i++) {
                        toastr.error(errors[i]);
                    }
                }else{
                    for (i = 0; i < res.errors.length; i++) {
                        toastr.error(res.errors[i]);
                    }
                }
            } else {
                window.location.href = "/home";
            }
        });
    });
});