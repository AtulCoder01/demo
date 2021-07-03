// for signup user
$(document).ready(function (e) {
    
    $("#signup_user_form").on("submit", function(e){
        var formData = new FormData(this);
        // console.log(formData);
        $.ajax({
            url: this.action,
            type: 'POST',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data) {
                
                    // console.log(data); 
                    if(data == 'success'){
                        toastr.success('Registration successfully.');
                        $("#signup_user_form")[0].reset();
                        $('#signUpModal').modal('toggle'); 
                    }else if(data == 'exist'){
                        toastr.info('User already exist.');
                    }else{
                        toastr.error('Registration failed.');
                    }
                    
                    
            },
            error: function (error, textStatus, errorThrown) {
                
            }
        });
        e.preventDefault();
    });
});


// for login user
$(document).ready(function (e) {
    
    $("#login_user_form").on("submit", function(e){
        var formData = new FormData(this);
        // console.log(formData);
        $.ajax({
            url: this.action,
            type: 'POST',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data) {
                
                    // console.log(data); 
                    if(data == 'success'){
                        toastr.success('Login successfully.');
                        $("#login_user_form")[0].reset();
                        $('#loginModal').modal('toggle');
                        setTimeout(() => {
                            window.location.href = 'profile.php';
                        }, 2000);
                    }else{
                        toastr.error('Login failed.');
                    }
                    
                    
            },
            error: function (error, textStatus, errorThrown) {
                
            }
        });
        e.preventDefault();
    });
});

// for forgot user password
$(document).ready(function (e) {
    
    $("#forgot_user_form").on("submit", function(e){
        var formData = new FormData(this);
        // console.log(formData);
        $.ajax({
            url: this.action,
            type: 'POST',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data) {
                
                    // console.log(data); 
                    if(data == 'success'){
                        toastr.success('Password Updated successfully.');
                        $("#forgot_user_form")[0].reset();
                        $('#forgotModal').modal('toggle');
                       
                    }else{
                        toastr.error('You enter wrong information.');
                    }
                    
                    
            },
            error: function (error, textStatus, errorThrown) {
                
            }
        });
        e.preventDefault();
    });
});