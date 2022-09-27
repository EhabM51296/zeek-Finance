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

$("#login").click(function(){
    var admin = $("#adminName").val().trim();
    var pass = $("#pass").val().trim();
    
        $.ajax(
                    {
                           method: "POST",
                           url: "verification/login.php",
                           data: {
                                  admin:admin,
                                  pass:pass

                                  },
                           success: function(data)
                           { if(data=="success")
                           {
                            location.reload();
                           }
                           else
                           alert(data);
                            
                           }
                           
                     });


});

$("#logout").click(function(){
       var sess = "session";
           $.ajax(
                       {
                              method: "POST",
                              url: "verification/logout.php",
                              data: {
                                   sess:sess,
                                   },
                              success: function(data)
                              { if(data=="success")
                              {
                               location.reload();
                              }
                              }
                              
                        });
   });

   $(".btnDelete").click(function(){
          var currRow = $(this).closest("tr");
          var email = currRow.find("th:eq(1)").html();
          if (confirm("Are you sure you want to delete "+email+"?"))
          {
          $.ajax(
              {
                     method: "POST",
                     url: "verification/deleteUser.php",
                     data: {
                          email:email,
                          },
                     success: function(data)
                     { if(data=="success")
                     {
                      currRow.fadeOut('slow', function() {$(this).remove();});
                     }
                     else
                     {
                      alert("failed to delete user");
                     }
                     }
                     
               });
              }
   });

  //show update modal
   $(".btnUpdate").click(function(){
       var currRow = $(this).closest("tr");
       var email = currRow.find("th:eq(1)").html();
       $("#oldEmail").val(email);
       displaySubscribeMdl("updateMdl");
});

//update user
$("#updateButton").click(function(){
       var input = $(this);
       input.attr("disabled","true");
       var email = $("#updateText").val().trim();
       var oldEmail = $("#oldEmail").val().trim();
       if ( /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{1,})+$/.test(email))
     { input.html("Validating...");
    
     
       $.ajax(
           {
                  method: "POST",
                  url: "verification/updateUser.php",
                  data: {email:email,
                         oldEmail:oldEmail
                         },
                  success: function(data)
                  { input.html("Update");
                  $(".invalidEmail").css("display","none");
                   hideSubscribeMdl("updateMdl");
                   if(data=="success")
                   {
                     location.reload();
                   }
                   else if(data=="failed")
                     alert("failed to update");
                   setTimeout(function() {
                       input.removeAttr("disabled");
                    }, 2000);
                  }
                  
            });
   }
   else
   {
       $(".invalidEmail").css("display","block");
       input.removeAttr("disabled");
   }
   
   });
   //close update modal
$("#closeUpdate").click(function(){
       hideSubscribeMdl("updateMdl");
});

//show insert modal
$("#insertUser").click(function(){
       displaySubscribeMdl("insertMdl");
});

//close insert modal
$("#closeInsert").click(function(){
       hideSubscribeMdl("insertMdl");
});

// close send email mdl
$("#closeSend").click(function(){
    hideSubscribeMdl("sendMailMdl");
});
//insert user
$("#insertButton").click(function(){
       var input = $(this);
       input.attr("disabled","true");
       var email = $("#insertText").val().trim();
       if ( /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{1,})+$/.test(email))
     { input.html("Validating...");
    
     
       $.ajax(
           {
                  method: "POST",
                  url: "verification/insertUser.php",
                  data: {email:email,
                         },
                  success: function(data)
                  { input.html("Insert");
                  $(".invalidEmail").css("display","none");
                   hideSubscribeMdl("insertMdl");
                   if(data=="success")
                   {
                     location.reload();
                   }
                   else if(data=="failed")
                     alert("failed to insert user");
                   setTimeout(function() {
                       input.removeAttr("disabled");
                    }, 2000);
                  }
                  
            });
   }
   else
   {
       $(".invalidEmail").css("display","block");
       input.removeAttr("disabled");
   }
   
   });
function checkAll()
{
    if($("#selectAll").is(':checked'))
    {
         $('.checkSingle').prop('checked', 'checked'); 
    }
    else
         $('.checkSingle').prop('checked', false);
}
$('#sendToSelected').click(function () {
  var atLeastOneIsChecked = $('input:checkbox').is(':checked');
    if(atLeastOneIsChecked)
    {
         displaySubscribeMdl("sendMailMdl");
    }
    else
    alert("please choose at least one client");
});
$("#selectAll").change(function(){
    checkAll();
});


//send email to clients
$("#sendMsgButton").click(function(){
       var input = $(this);
      input.attr("disabled","true");
       var messageText = $("#messageText").val().trim();
      var titleText = $("#emailTitle").val().trim();
    //   var selected = [];
      if ((messageText).length>0 && (titleText).length>0)
     {  $("#CC").val("");
         $('input[name="email[]"]:checked').each(function() {
         $("#CC").val($("#CC").val() + "," + $(this).val() );
            //  selected.push($(this).val());
});
    if(confirm("Are you sure you want to send message?"))
    {  input.html("sending...");
        
        $("#messageForm").submit();
    }
    else
    {
      input.removeAttr("disabled"); 
    }
        
    
     
    
  }
  else
  {
      $(".invalidEmail").css("display","block");
      input.removeAttr("disabled");
  }
   
  });
   
//   prevent enter button
  $('#messageForm input').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) { 
          e.preventDefault();
        return false;
        }
      });
