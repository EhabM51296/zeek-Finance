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
function replace_forbidden(id)
{ var val = document.getElementById(""+id).value;
  var forbid_array = ['=',"'",'"','`','<','>',';',"/",/\\/];
  for(var i =0;i<forbid_array.length;i++)
  {if(val.search(forbid_array[i])>-1)
	  {
  val = val.replace(forbid_array[i],""); 
  document.getElementById(""+id).value=val;
	  }
  }
  val = val.replace("*","");
  val = val.replace("[","");
  val = val.replace("]","");
  document.getElementById(""+id).value=val;
}
$(document).ready(function(){
    $('#subscribeForm').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) { 
          e.preventDefault();
          return false;
        }
      });
    $(".LibraryParent").click(function(){
       
        var libraryFile = $(this).attr("id");
        $.ajax(
            {
                   method: "POST",
                   url: "./verification/checkSession.php",
                   data: {libraryFile:libraryFile
						  },
                  

                   success: function(data)
                   {	
                      if(data=="invalidSession")
                                displaySubscribeMdl("subscribeMdl");
                         else{  displaySubscribeMdl("downloadMdl");
                                $("#pdfName").val(data);
                               
                             }
						 
                       
				   }
                   
             });
             
    });
// --------------------------------------------------------------download button--------------------------------------------------
$("#downloadBtn").click(function(){
    hideSubscribeMdl("downloadMdl");
     $("#subscribeForm").submit();
    
});
$("#closeDLBtn").click(function(){
     hideSubscribeMdl("downloadMdl");
    
});
// ---------------------------------------------------------------subscribe user-------------------------------------------------
$(".subscribeButton").click(function(){
    var input = $(this);
    input.attr("disabled","true");
    var txt = input.attr("class").split(" ")[2];
    var email = $("#"+txt).val().trim();
    if ( /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{1,})+$/.test(email))
  { input.html("Validating...");
  
    $.ajax(
        {
               method: "POST",
               url: "verification/subscribe.php",
               data: {email:email
                      },
               success: function(data)
               { input.html("Subscribe");
               $("#"+input.attr("class").split(" ")[3]).css("display","none");
                hideSubscribeMdl("subscribeMdl");
                if(data==true)
                {
                displaySubscribeMdl("successMdl");
                }
                else if(data=="sent")
                     displaySubscribeMdl("messageMdl");
                else if(data=="failed")
                   displaySubscribeMdl("failedMdl");
                setTimeout(function() {
                    input.removeAttr("disabled");
                 }, 2000);
               }
               
         });
}
else
{
    $("#"+input.attr("class").split(" ")[3]).css("display","block");
    input.removeAttr("disabled");
}

});
// --------------------------------------------------------close modal------------------------------------
    $("#closeSubscription").click(function(){
        hideSubscribeMdl("subscribeMdl");
    });

    $("#successBtn").click(function(){
        hideSubscribeMdl("successMdl");
    });
    $("#subsMessageBtn").click(function(){
        hideSubscribeMdl("messageMdl");
    });
    $("#failedMessageBtn").click(function(){
        hideSubscribeMdl("failedMdl");
    });
    $("#opSuccMessageBtn").click(function(){
        hideSubscribeMdl("opSuccMdl");
    });
    $("#unSubBtn").click(function(){
        hideSubscribeMdl("unSubMdl");
    });
});