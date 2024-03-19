$(document).ready(function(){
    $("#changePasswordForm").on("submit", function(e){
        e.preventDefault();
        Swal.showLoading();
        $oldPassword = $('#OldPassword').val();
        $newPassword = $('#newPassword').val();
        $conPassword = $('#conPassword').val();
        if ( $newPassword != $conPassword ) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Password not Matched!',
                showConfirmButton: false,
                timer: 4000
            });
            return;
        }
        $.ajax({
            type: "POST",
            url: "Controller/php/changePassword.php",
            data: $('#changePasswordForm').serialize(),
            success: function (response) {
                if ( response === "success" ) {
                    //Seting Sessions
                    Swal.hideLoading();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Password Changed!',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    setTimeout(function() { 
                        window.location.href = "profileMember.php"; 
                    }, 3000);
                } else if ( response === "errorDB" ) {
                    Swal.hideLoading();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'OOps! Somthing Went Wrong!',
                        showConfirmButton: false,
                        timer: 3000
                    });
                } else if ( response === "oldPassNotMatched" ) {
                    Swal.hideLoading();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'OOps! Incrorrect Old Pasword!',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            }
        });
    });
});