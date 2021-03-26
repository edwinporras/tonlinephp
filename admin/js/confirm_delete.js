$(document).ready(function (){
    $(".borrar").click(function (e){
      e.preventDefault();
      // console.log('eliminar???');
      var res= confirm("Realmente quieres eliminar el usuario");
      if (res==true) {
        var link = $(this).attr("href");
        window.location=link;
        // console.log('eliminar aca ???');
      }
    })
  })