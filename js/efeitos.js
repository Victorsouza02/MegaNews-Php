$(document).ready(function(){
  $(".fa-search").click(function(){
    $(".container1, .input").toggleClass("active");
    $("input[type='text']").focus();
  });
  
  $(".input").on("keypress" , function(e){
      if (e.keyCode == 13){
           $("#busca").submit();
      }
  });
  
});
