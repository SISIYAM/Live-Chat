/*
* Title: Live Chat-box
* Description: Simple Live Chat-Box Using Ajax
* Author: MD Saymum Islam Siyam (CodeSQL)
* Email: si31siyam@gmail.com
* Portfolio: https://siyam70.netlify.app/
* Date: 14/01/24
*/

const textarea = document.querySelector("textarea");
textarea.addEventListener("keyup", (e) =>{
  textarea.style.height="40px";
  let textareaHeight = e.target.scrollHeight;
  textarea.style.height = `${textareaHeight}px`;
})

$(document).ready(function () {
  
  // if click on send button 
  $('#send-btn').on('click', function () {
    
    // store textarea value in textareaMessage variable
    const textareaMessage = $.trim($("#textarea-message").val());
    
    // insert Message using ajax
    $.ajax({
      type: "post",
      url: "insert.php",
      data: {
        "message":textareaMessage,
        "sendBtn":"sendBtn"
      },
      success: function (response) {
        if(response == 0){
        // set textarea height to default
        $('textarea').css({"height":"40px"})
         // scroll to bottom of the message-box
        setTimeout(function() {
          $('#messageBox').scrollTop($('#messageBox')[0].scrollHeight);
        }, 100);
        // set text area value null after send
        $('#textarea-message').val("");
        }else{
          console.log(response);
        }
      }
    });

  });

  // Now show message in chatBox
  setInterval(() =>{
    $.ajax({
      type: "post",
      url: "get.php",
      success: function (output) {
        if(output){
          $('#messageBox').html(output);
        }else{
          console.log("Output Not Found");
        }
      }
    });
  },10);
});