$(document).ready(function () {
    // alert("Loaded");
    $("#formSubmitData").on("click", function () {
        var email_mobile = $("#mob_email").val();
        var user_password = $("#user_password").val();
        if (email_mobile === "" || user_password === "") {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Fill All Fields!',
                showConfirmButton: false,
                timer: 3000
            });
            return;
        }
        // Check Email & Mobile Number
        if (email_mobile.includes("@")) {
            Swal.showLoading();
            $.ajax({
                type: "POST",
                url: "Controller/php/login.php?type=email",
                data: $("#loginForm").serialize(),
                success: function (response) {
                    const myArray = response.split("-");
                    let status = myArray[0];
                    let user_id = myArray[1];
                    if (status === "success") {
                        //Seting Sessions
                        Swal.hideLoading();
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Login Success!',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        localStorage.setItem("user_id", user_id);
                        window.location.href = "dashboardMember.php";
                    } else if (status === "error") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Invalid Email & Password',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    } else if (status === "errorPassword") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Wrong Password!',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    } else if (status === "user_not_active") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Your Account is Inactive',
                            text: 'Please wait or Connect to Admin..!',
                        })
                        // Swal.fire({
                        //     position: 'center',
                        //     icon: 'error',
                        //     title: 'Your Acount is not Activated.!! Please Wait or Contact to Admin.!',
                        //     showConfirmButton: false,
                        //     timer: 8000
                        // })
                    }
                }
            });
        } else {
            Swal.showLoading();
            $.ajax({
                type: "POST",
                url: "Controller/php/login.php?type=mobile",
                data: $("#loginForm").serialize(),
                success: function (response) {
                    const myArray = response.split("-");
                    let status = myArray[0];
                    let user_id = myArray[1];
                    if (status === "success") {
                        //Set Sessions
                        Swal.hideLoading();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Login Success!',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        localStorage.setItem("user_id", user_id);
                        window.location.href = "dashboardMember.php";
                    } else if (response === "error") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Invalid Mobile & Password',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    } else if (status === "errorPassword") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Wrong Password!',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    } else if (status === "user_not_active") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Your Account is Inactive',
                            text: 'Please wait or Connect to Admin..!',
                        })
                        // Swal.fire({
                        //     position: 'center',
                        //     icon: 'error',
                        //     title: 'Your Acount is not Activated.!! Please Wait or Contact to Admin.!',
                        //     showConfirmButton: false,
                        //     timer: 8000
                        // })
                    }
                }
            });
        }
    });
});

// function redirect() {
//     // var host = window.location.host;
//     window.location.replace("logIn.php?signupStatus=true");
// }