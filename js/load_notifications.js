$(document).ready(function(){
   $.ajax({
      url: 'dashboard_scripts/load_notifications_tab.php',
      type: 'post',
      success: function(result){
          $('#notification_div').html(result);
      }
   });
});
