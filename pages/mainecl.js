$(document).ready(function(){
    
    // function myFunction() {
        // $("#aaa").click(function(){
        setInterval(
              function() { 
                $.ajax({
            url: 'action.php',
            method:	"POST",
            data	:	{ide:1},
            success: function( data){
                $('tbody').empty();
                $('tbody').html( data);
                }
               });
                
             },  3000);
        
            
        // });
            // myFunction();
  });