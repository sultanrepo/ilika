$(document).ready(function(){
    $("#updateProfileDetailsForm").on("submit", function(e){
        e.preventDefault();
        Swal.showLoading();
            $.ajax({
                type: "POST",
                url: "Controller/php/updateProfile.php",
                data: $('#updateProfileDetailsForm').serialize(),
                success: function (response) {
                    if ( response === "success" ) {
                        //Seting Sessions
                        Swal.hideLoading();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Profile Details Updated!',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        setTimeout(function() { 
                            window.location.href = "profileMember.php"; 
                        }, 3000);
                    } else if ( response === "error" ) {
                        Swal.hideLoading();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'OOps! Somthing Went Wrong!',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                }
            });
    });
});