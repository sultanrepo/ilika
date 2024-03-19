$(document).ready(function(e){
    // Submit form data via Ajax
    $("#paymentForm").on('submit', function(e){
        //Validation
        let amount = $("#inputAmount").val();
        let snap   = $("#inputSnap").val();
        if ( amount == "" ) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Please Enter Amount!💰',
                showConfirmButton: false,
                timer: 3000
            });
            return false;
        }
        if ($('#inputMonths').val() == "") {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Please Select Month!📅',
                showConfirmButton: false,
                timer: 3000
            });
            return false;
        }
        if ($('#inputMethod').val() == "") {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Please Select Method Of Payment!🚀',
                showConfirmButton: false,
                timer: 3000
            });
            return false;
        }
        if ( snap == "" ) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Please Select Snapshot!📸',
                showConfirmButton: false,
                timer: 3000
            });
            return false;
        }
        //AJAX CALL
        e.preventDefault();
        Swal.showLoading();
        $.ajax({
            type: 'POST',
            url: 'Controller/php/payment.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){    
                if ( response == "Success" ) {
                    Swal.hideLoading();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Payment Done!✅',
                        showConfirmButton: false,
                        timer: 4000
                    });
                    setTimeout(function() { 
                        window.location.href = "profileMember.php"; 
                    }, 4000);
                } else if ( response == "ImageUploadError" ) {
                    Swal.hideLoading();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Somthing Went Wrong with Screen-Shot!❌',
                        showConfirmButton: false,
                        timer: 3000
                    });
                } else if ( response == "DBError" ) {
                    Swal.hideLoading();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Somthing Went Wrong With DataBase!❌',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            }
        });
    });
});

//Function For Reason
function getReason(id) {
    let paymentId = id;
    $.ajax({
        type: 'POST',
        url: 'Controller/php/getRejectedReason.php',
        data: {
            id : paymentId
        },
        // contentType: false,
        // cache: false,
        // processData:false,
        success: function(response){    
            Swal.fire(
                response,
                '',
                'question'
            )
        }
    });
}

// $(document).ready(function(e){
//     $("#paymentForm").on("submit", function(e){
        
//         // Ajax Call
//         e.preventDefault();
//         // var formData = ;
//         Swal.showLoading();
//         // alert(JSON.stringify(formData));
//         $.ajax({
//             type: "POST",
//             url: "Controller/php/payment.php",
//             data: new FormData(this),
//             dataType: 'json',
//             contentType: false,
//         	cache: false,
//     		processData: false,
//             success: function (response) {
//                 alert(response);
//             }
//         });
//     });
// });