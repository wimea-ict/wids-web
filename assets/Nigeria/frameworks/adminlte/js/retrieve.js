    
$(document).ready(function(){

$("#ajaxbutton").ready(function(){
  setInterval(function(){ 
    $.ajax({
    type: "POST",
    url: "/Dissemination/index.php/Wrf/read",
    success: function(data){
      var obj = $.parseJSON(data);
      var result = "<section class='col-lg-10 connectedSortable'><br><div class='col-md-12'>"+
        
                 "<div class='panel panel-primary' style = 'height:720px; overflow:auto;'>"+
      
                    "<div class='panel-heading'  style = 'background:#1f7872;'>"+
              
                    "<center>ADVISORIES</center>"+
                
                    "</div>"+
                      "<table class='table'>"+
                      "<tr class='list-group-item-warning'>"+
                 "<td>Subregion</td><td>Message</td>"+
                "</tr>";
      $.each(obj, function(){
        result = result + "<tr><td>" + this['subRegion'] + "</td> , <td>" + this['message'] + "<td></tr>";
      });

      result = result + "</table></div></div></section>";
      $("#result").html(result);
    }

  });
       }, 1000);

});

});

