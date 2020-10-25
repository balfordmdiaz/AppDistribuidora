    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../static/js/jquery-2.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../static/js/bootstrap.min.js"></script>
    <script src="../static/js/wow.min.js"></script>
    <script src="../static/js/jquery.easing.1.3.js"></script>
    <script src="../static/js/jquery.isotope.min.js"></script>
    <script src="../static/js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="../static/js/fliplightbox.min.js"></script>
    <script src="../static/js/functions.js"></script>
    <script type="text/javascript">
      $('.portfolio').flipLightBox()
    </script>

<script>
  function comprobar(obj)
  {   
     if (obj.checked)
     {
        document.getElementById('boton').style.display = "";
     } else
     {
        
        document.getElementById('boton').style.display = "none";
        
     }     
  }  

  function ShowSelected()
  {
     
     var elementos = document.getElementById('idlarticulo').value; //obtener el id articulo seleccionado
     const art = {!! json_encode($articulo ?? '') !!};
     console.log(art);
     var precioaux=art[elementos-1].precio;
     document.getElementById('precio').value=precioaux;

     var cantidadaux=document.getElementById('cantidad').value;
     var subtotalaux=precioaux*cantidadaux;
     document.getElementById('subtotal').value=subtotalaux;


     if(document.getElementById('chec').checked)
     {
         document.getElementById('boton').value=subtotalaux*0.15; //Este es el Iva         
     }
     else
     {
        document.getElementById('boton').value=0;
     }
     var auxiva= document.getElementById('boton').value;
     var auxdescuento=document.getElementById('descuento').value;
     document.getElementById('total').value=(parseFloat(subtotalaux)+parseFloat(auxiva))-parseFloat(auxdescuento);


  };
  window.onload = ShowSelected; //para que cargue la funcion desde el principio

</script>