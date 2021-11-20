$(document).ready(function(){
    
    // function myFunction() {
        // $("#aaa").click(function(){
        setInterval(
              function() { 
                $.ajax({
            url: 'action.php',
            method:	"POST",
            data	:	{id:1},
            success: function( data){
                $('#tb').empty();
                $('#tb').html( data);
                }
               });
                
             },  3000);
        
            
        // });
            // myFunction();
            // $(function () {
            //     $('#datetimepicker1').datetimepicker();
            // });
  });