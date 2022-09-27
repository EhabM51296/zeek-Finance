// ---------------------------------------------------------------send message-------------------------------------------------
function displaySubscribeMdl(idMdl){
    $("#"+idMdl).fadeIn().css("display","block");
    $("body").css("overflow","hidden");
}

function hideSubscribeMdl(idMdl){
    $("#"+idMdl).fadeOut("fast", function(){
        $("#subscribeText").val("");
        $("#invalidInfo").css("display","none");
        $("#"+idMdl).css("display","none"); 
    });
    $("body").css("overflow-y","scroll");
}
$("#sendMsg").click(function(){
    var button = $(this);
    button.attr("disabled","true");
    button.html("Sending...");
    var name= $("#userName").val().trim();
    var email = $("#userEmail").val().trim();
    var phone = $("#userPhone").val().trim();
    var msg= $("#userMsg").val().trim();
    var counter = 0;
    var invalid = 0;
    $("#contactUsForm .required").each(function() {
        var input = $(this).val().trim();
        if(counter==1)
        {
            if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{1,})+$/.test(input))
            {
                $(".alert"+counter).css("display","block");
                invalid = 1;
            }
            else
            $(".alert"+counter).css("display","none");
        }
        else
        {
            if(input=="")
            {
                $(".alert"+counter).css("display","block");
                invalid = 1;
            }
            else
            $(".alert"+counter).css("display","none");
        }
        counter = counter+1;

    });
    if(invalid==0)
    {
        $.ajax(
                    {
                           method: "POST",
                           url: "verification/sendMsg.php",
                           data: {name:name,
                                  email:email,
                                  phone:phone,
                                  msg:msg

                                  },
                           success: function(data)
                           { button.html("Send");
                           $("#contactUsForm .field").each(function() {
                                $(this).val("");
                           });
                            if(data==true)
                            {   
                                displaySubscribeMdl("opSuccMdl");
                            }
                            else
                            {
                                displaySubscribeMdl("failedMdl");
                            }
                            setTimeout(function() {
                                button.removeAttr("disabled");
                             }, 2000);
                           }
                           
                     });
    }
    else
    {
    button.removeAttr("disabled");
    button.html("Send");
    }

});