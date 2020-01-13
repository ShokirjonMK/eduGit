$("#m2").click(function(e) {

    e.preventDefault();

 //   $("#modal1").modal('show').find("#mc").load($(this).attr("href"));

 $("#mc").load($(this).attr("href"));
 
 $("#modal1").modal('show');

 //   $("#mc").html("<h1>Modal Show Urra</h1>");
});

$(".p11").click(function(e) {

  e.preventDefault();
  $("#mx").load($(this).attr("href"));

  $("#modal11").modal('show');
});

$( ".btn-info" ).click(function() {
    //$(this).removeClass('btn-info');
    $(this).toggleClass('btn-success');
    $(this).toggleClass('btn-info');
  });
/*
  $( ".btndate" ).click(function() {
    
    $(this).document.getElementById("Test_Date").value;
    $(this).toggleClass('btn-info');
  });

*/

$(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
  console.log("beforeInsert");
});

$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
  console.log("afterInsert");
});

$(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
  if (! confirm("Are you sure you want to delete this item?")) {
      return false;
  }
  return true;
});

$(".dynamicform_wrapper").on("afterDelete", function(e) {
  console.log("Deleted item!");
});

$(".dynamicform_wrapper").on("limitReached", function(e, item) {
  alert("Limit reached");
});