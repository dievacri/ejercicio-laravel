function showModal(user) {
    if(user){
        $('#name').val(user.name);
        $('#last_name').val(user.last_name);
        $('#user').val(user.user);
        $('#password').val(user.password);
        $('#id').val(user.id);
        $('#btnNew').hide();
        $('#btnUpdate').show();
    }else{
        $('#btnUpdate').hide();
        $('#btnNew').show();
    }

    $('#userModal').modal('toggle');
}
function deleteUser(userId) {
    $.ajax({
        url: "/users/" + userId,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "DELETE",
        dataType: 'json',
        contentType: 'application/json',
    }).done(function(res) {
        if( res.rst === 1 ) {
            location.reload();
            toastr.success(res.sms);
        }else{
            toastr.error(res.sms);
        }
    });
}

function edit() {
    user = {
        name: $('#name').val(),
        last_name: $('#last_name').val(),
        user: $('#user').val(),
        password: $('#password').val(),
    };

    $.ajax({
        url: "/users/" + $('#id').val(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "PUT",
        data: JSON.stringify(user),
        dataType: 'json',
        contentType: 'application/json',
    }).done(function(res) {
        if( res.rst === 1 ) {
            location.reload();
            toastr.success(res.sms);
        }else{
            for (i = 0; i < res.errors.length; i++) {
                toastr.error(res.errors[i]);
            }
        }
    });
}

function registrar() {
    user = {
        name: $('#name').val(),
        last_name: $('#last_name').val(),
        user: $('#user').val(),
        password: $('#password').val(),
    };

    $.ajax({
        url: "/users",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        data: JSON.stringify(user),
        dataType: 'json',
        contentType: 'application/json',
    }).done(function(res) {
        if( res.rst === 1 ) {
            location.reload();
            toastr.success(res.sms);
        }else{
            for (i = 0; i < res.errors.length; i++) {
                toastr.error(res.errors[i]);
            }
        }
    });
}

function disable(id) {
    $.ajax({
        url: "/users/disable/" + id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "PUT",
        dataType: 'json',
        contentType: 'application/json',
    }).done(function(res) {
        if( res.rst === 1 ) {
            location.reload();
            toastr.success(res.sms);
        }else{
            for (i = 0; i < res.errors.length; i++) {
                toastr.error(res.errors[i]);
            }
        }
    });
}

function enable(id) {
    $.ajax({
        url: "/users/enable/" + id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "PUT",
        dataType: 'json',
        contentType: 'application/json',
    }).done(function(res) {
        if( res.rst === 1 ) {
            location.reload();
            toastr.success(res.sms);
        }else{
            for (i = 0; i < res.errors.length; i++) {
                toastr.error(res.errors[i]);
            }
        }
    });
}