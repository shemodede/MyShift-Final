$(document).ready(function(){
   $.ajax({
       url: 'dashboard_scripts/shift_swap_loader.php',
       type: 'post',
       success: function(result){
           $('.timeline').html(result);
       }
   });
});