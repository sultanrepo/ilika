$(document).ready(function(){
    // alert("Loaded");
    //Image Preview
    $("#profilePic").change(function() {
        const file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('#image-previewer').attr('src', event.target.result);
            $('#image-previewer').css({ width: '250px', height: '250px' });
          }
          reader.readAsDataURL(file);
        }
    });
    $("#uploadPhotoForm").on("submit", function(e){
        e.preventDefault();
        Swal.showLoading();
            $.ajax({
                type: "POST",
                url: "Controller/php/uploadProfilePhoto.php",
                data: new FormData(this),
                contentType: false,
        	    cache: false,
    			processData: false,
                success: function (response) {
                    if ( response === "success" ) {
                        Swal.hideLoading();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Profile Photo Uploaded!',
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
                            title: 'Somthing Went Wrong',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    } else if ( response === "dberror" ) {
                        Swal.hideLoading();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Somthing Went Wrong With DataBase!',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                }
            });
    });
});