$(document).ready(function(){
    // alert("Loaded");
    $("#formSubmitData").on("click", function(){
        //alert("50");
        var name = $("#user_name").val();
        var user_mobile = $("#user_mobile").val();
        var user_email = $("#user_email").val();
        var user_password = $("#user_password").val();
        if ( name === "" || user_mobile === "" || user_email === "" || user_password === "" ) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Fill All Field',
                showConfirmButton: false,
                timer: 3000
              });
              return;
        }
        // Mobile Number Count Logic Will Be Here
        if ( user_mobile.length != 10 ) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Mobile Number Must Be 10 Digits!',
                showConfirmButton: false,
                timer: 3000
              });
              return;
        }

        // Password Validation
        if ( user_password.length < 6 ) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Password Must Be 6 Digits!',
                showConfirmButton: false,
                timer: 3000
              });
              return;
        }
 
        //AJAX Call
        $.ajax({
            type: "POST",
            url: "Controller/php/signup.php",
            data: $("#loginForm").serialize(),
            success: function (response) {
                if ( response === "Success" ) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Account Created!',
                        showConfirmButton: false,
                        timer: 3000
                      });
                      redirect();
                } else if ( response === "Error" ) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Some Problem Occure!',
                        showConfirmButton: false,
                        timer: 3000
                    });
                } else if ( response === "mobileAlready" ) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Mobile Number Already Exist!',
                        showConfirmButton: false,
                        timer: 3000
                    });
                } else if ( response === "emailAlready" ) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Email Already Exist!',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            }
        });
    }); 
});

$(document).ready(function(){
    //Mobile Number Already Check
    $("#user_mobile").on("blur", function(){
        var user_mobile = $("#user_mobile").val();
        $.ajax({
            type: "POST",
            url: "Controller/php/signupValidation.php?type=mobile",
            data: {
                mobile_number : user_mobile
            },
            success: function (response) {
                if ( response === "found" ) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Mobile Number Already Exist! Please Login',
                        showConfirmButton: false,
                        timer: 4000
                      })
                }
            }
        });
    });

    //Email Already Check
    $("#user_email").on("blur", function(){
        var user_email = $("#user_email").val();
        $.ajax({
            type: "POST",
            url: "Controller/php/signupValidation.php?type=email",
            data: {
                email : user_email
            },
            success: function (response) {
                if ( response === "found" ) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Email Already Exist! Please Login',
                        showConfirmButton: false,
                        timer: 4000
                      });
                }
            }
        });
    });
});



function redirect() {
    // var host = window.location.host;
    window.location.replace("logIn.php?signupStatus=true");
}


// $(document).ready(function(){

//     $("#loginForm").on("click", function(){
//         alert("OK");
//         $("#loginForm").validate({
//             rules:{
//                 user_name:"required",
//                 user_mobile:{
//                     required:true,
//                     minlength:10  
//                 },
//                 user_email:{
//                     required:true,
//                     email:true  
//                 },
//                 user_password:{
//                     required:true,
//                     minlength:6
//                 },
//             },messages:{
//                 user_name:"Please Enter Name",
//                 user_mobile:{
//                     required:"Please Enter Mobile Number",
//                     minlength:"Mobile Number Must Be 10 Digit", 
//                 },
//                 user_email:{
//                     required:"Please Enter Email",
//                     email:"Please Enter Valid Email"  
//                 },
//                 user_password:{
//                     required:"Please Enter Password",
//                     minlength:"Password Must Be 6 Length"
//                 },
//                 submitHandler:function(form) {
//                     form.submit();
//                 }
//             }
//         });
//     });
// });