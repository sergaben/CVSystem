function cvsByCategoryStaff(){
    $(".buttonClicked").click(function(){

        var values = {

            categoryName:$(this).text(),
            currentUserPage:'Staff'
        };

        $.ajax({

            url: "https://www.softengcompse.com/beta/phpscripts/getCVsBycategory.php",
            type: "GET",
            data: values,
            dataType: "html",   
            beforeSend: function(http){


            },
            success:function(response,status,http)
            {
                $("#CVDisplay").html(response);

            },
            error: function(http,status,error){
                alert("Some Error Occured: "+error);
            }
        });  

    });     
}

function cvsByCategoryEmployer(){
    $(".buttonClicked").click(function(){

        var values = {

            categoryName:$(this).text(),
            currentUserPage:'Employer'
        };

        $.ajax({

            url: "https://www.softengcompse.com/beta/phpscripts/getCVsBycategory.php",
            type: "GET",
            data: values,
            dataType: "html",   
            beforeSend: function(http){

            },
            success:function(response,status,http)
            {
                $("#CVDisplay").html(response);

            },
            error: function(http,status,error){
                alert("Some Error Occured: "+error);
            }
        });  

    });     
}

function allCvsEmployer(){
    $("#AllCvs").click(function(){


        $.ajax({

            url: "https://www.softengcompse.com/beta/phpscripts/getCvs.php",
            type: "GET",
            data: "function=getcvsemployer",
            dataType: "html",   
            beforeSend: function(http){


            },
            success:function(response,status,http)
            {
                $("#CVDisplay").html(response);

            },
            error: function(http,status,error){
                alert("Some Error Occured: "+error);
            }
        });  

    });     

}

function allCvsStaff(){
    $("#AllCvs").click(function(){


        $.ajax({

            url: "https://www.softengcompse.com/beta/phpscripts/getCvs.php",
            type: "GET",
            data: "function=getcvsstaff",
            dataType: "html",   
            beforeSend: function(http){


            },
            success:function(response,status,http)
            {
                $("#CVDisplay").html(response);

            },
            error: function(http,status,error){
                alert("Some Error Occured: "+error);
            }
        });  

    });     





}

function goToCVStaff(){
    $(".goToCV").click(function(){


        var elem = $(this);
        var className = elem.attr('id');
        window.location = 'staffCVFeedback.php?path='+className;

    });
}

function goToCVEmployer(){
    $(".goToCV").click(function(){


        var elem = $(this);
        var className = elem.attr('id');
        window.location ='EmployerViewCV.php?path='+className;

    });
}

$(document).ready(function(){
    function logout(){
        $("#logout").click(function(){
            $("#logout").load("../phpscripts/logout.php");
        });
    } ;


    $("#generateBtn").click(function(){
        $("#displayPass").load("../functions/passwordGen.php")
    });


})

window.onload = function(){

    $('.goToFeedback').on('mouseenter' , function() {
        var elem = $(this);
        var idName = elem.attr('id');
        $(this).css({
            backgroundColor: '#78ae4e',   
        });
        $( this ).click(function(){

            var url =idName; 
            window.location = url;
        });

    }).on( 'mouseleave', function() {
        var styles = {
            backgroundColor : '#ffffff',
        };
        $( this ).css( styles );
    });

    $('.goToViewCv').on('mouseenter' , function() {

        var elem = $(this);
        var idName = elem.attr('id');
        $(this).css({
            backgroundColor: '#78ae4e',   
        });
        $( this ).click(function(){


            var url =idName;  
            window.location = url;
        });

    }).on( 'mouseleave', function() {
        var styles = {
            backgroundColor : '#ffffff',
        };
        $( this ).css( styles );
    });

    $('.deleteCV').on('mouseenter',function(){

        var elem = $(this);
        var idName = elem.attr('id');
//        var data = "'"+idName+"'";
        var dataString = {deleteCV:idName};
        
        $(this).css({
            backgroundColor: '#78ae4e',   
        });
        $( this ).click(function(){

            $.ajax({

                url: "https://www.softengcompse.com/beta/phpscripts/deleteCV.php",
                type: "POST",
                data: dataString,
                //dataType: 'json',   
                beforeSend: function(http){
                    
                        alert("Are you completely sure that you want to delete this CV?");
                },
                success:function(response,status,http)
                {
                    
                          location.reload();
                         //$('#uploadedCVS').html(response);
                         
                        
                },
                error: function(http,status,error){
                    alert("Some Error Occured: "+error);
                }
            });  
            
        });



    }).on('mouseleave',function(){

        var styles = {

            backgroundColor:'#ffffff',
        };
        $(this).css(styles);

    });
    
}