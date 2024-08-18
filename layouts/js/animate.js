$(document).ready(function(){
    $('.getbtn').click(function(){
        $('.page').slideUp("slow");
        $('.page').hide();
        // $('.modal').slideUp();
        $('body').css("background-color","#f2f2f2");
        // $('header').hide();
        $('#signin').fadeIn();
        $('#signup').hide();
        $('.contlogin').fadeIn();

    })

// solve problem
    // $('#login').submit(function(event) {
    //     event.preventDefault(); // Prevent default form submission
        // var data=new FormData(this)
        var formData = $(this).serialize(); // Serialize form data
        console.log(formData);
        $.ajax({
            type: 'POST',
            method:'POST',
            url: 'deploy.php',
            cache:false,
            data:formData,
            dataType: 'json',
            success: function(response) {
                // var Data = $(response).serialize(); 
                console.log(response); // Log the response
                if (response) {
                    // Redirect or handle success as needed
                    // toastr.success(response.message);
                    // window.location.href = response.redirect ; // Example redirect to dashboard
                   
                    console.log(response);
                }
                // }else {
                //     toastr.error(response.message); // Display error message using Toastr
                // }
            },
    //         error: function(xhr, status, error) {
    //             console.error('AJAX Error:', status, error);
    //             console.log(sta)
    //             console.log(xhr.responseText);
    //         }
    //     })
    }); 
    
// end



    $('.signin').click(function(){
        $('#signin').fadeIn();
        $('#signup').fadeOut();
        $('.contsignup').hide();
        $('.contlogin').fadeIn();
        $('#login').fadeIn(1000);
    })
    $('.signup').click(function(){
        $('#signin').fadeIn();
        $('#login').fadeOut();
        $('.contlogin').hide();
        $('.contsignup').fadeIn();
        $('#signup').fadeIn(1000);
    })
    $('.cancel').click(function(){
        $('#signin').hide();
    })
    $('.close').click(function(){
        $('#signin').hide();
        $('.modal').hide();
    })
    $('#faq').click(function(){
        $('.faq').slideDown("");
        $('#faq').addClass("faqr");
    })
    $('#faqclose').click(function(){
        $('.faq').slideUp("slow");
        $('#faq').removeClass("faqr")
    })
    
    // about page
    $('.b1').hover(function(){
        $('.about1').toggle();
    })
    $('.b2').hover(function(){
        $('.about2').toggle();
    })
    $('.b3').hover(function(){
        $('.about3').toggle();
    })
    $('.b4').hover(function(){
        $('.about4').toggle();
    })
    $('.b5').hover(function(){
        $('.about5').toggle();
    })
    $('.b6').hover(function(){
        $('.about6').toggle();
    })
    $('.b7').hover(function(){
        $('.about7').toggle();
    })
    $('.b8').hover(function(){
        $('.about8').toggle();
    })
    $('.b9').hover(function(){
        $('.about9').toggle();
    })
})
