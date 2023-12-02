// admin login page validation

$(document).ready(function(){
    $('#formsubmit').validate({
        rules:{
            email: {
                required: true,
                email:true
            },
            password:{
                required:true,
                minlength:8,
            }
        },
        messages:{
            email:{
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            password:{
                required: "Please enter your password",
                minlength: "Password must be at least {0} characters long"
            }
        }
        
    });
});