function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  dir = "asc";
  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("TR");

    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;

      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];

      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
};

$(document).ready(function(){

  $('#search').keydown(function(){

   var search=$('#search').val();
   var expression=new RegExp(search,"i");
     $.getJSON("web-data/gamesarena.json",function(data){
       $.each(data,function(key,value){
         if(value.title.search(expression)!=-1||value.location.search(
           expression)!=-1)
           {
             $('#result').append('<li class="list-group">'+value.platform+'</li>')
           }
       })
   });
 });
});



function toggler(divId) {
    $("#" + divId).toggle();
}
