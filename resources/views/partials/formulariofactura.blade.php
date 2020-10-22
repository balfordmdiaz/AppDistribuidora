<section id="contact-page">
    <div class="container">
      <div class="center">
        <h2>Factura</h2>
      </div>
      <div class="row contact-wrap">
        <div class="col-md-8 col-md-offset-2">
          
        <form  method="" action="{{ route('factura') }}">
          @csrf
            
            <div class="form-group">
              <label for="idcliente">codigo cliente:</label>
              <select  name="codigocliente" class="form-control"></select>
            </div>

            <div class="form-group">
                <input name="codigofactura" type="text" class="form-control" placeholder="Codigo factura">
            </div>

            <div class="form-group">
                <input name="codigoempleado" type="text" class="form-control" placeholder="Codigo empleado">
            </div>

            <div class="form-group">
                <label for="idempleado">codigo producto:</label>
                <select  name="codigoproducto" class="form-control"></select>            
            </div>

            <div class="form-group">
                <input name="fecha" type="date" class="form-control" >
            </div>

            <div class="form-group">
              <input name="chec" type="checkbox" id="chec" onChange="comprobar(this);"/>
                    <label for="chec">IVA(opcional)</label>
                    <input name="Iva" type="number" id="boton" class="form-control" step="any" style="display:none" placeholder="IVA" />
            </div>

            <div class="form-group">
                  <input name="descuento" type="number" step="any" class="form-control"  placeholder="Descuento" />
            </div>

            <div class="form-group">
                <input name="cantidad" type="number" class="form-control" placeholder="Cantidad"/>
            </div>

            <div class="form-group">
                <input name="preciounitario" type="number" step="any" class="form-control" placeholder="Precio Unitario"/>        
            </div>

            <div class="form-group">
                <input name="subtotal" type="number" step="any" class="form-control" placeholder="Sub Total"/>       
            </div>

            <div class="form-group">
                <input name="total" type="number" step="any" class="form-control" placeholder="Total"/>          
            </div>

            
            <div id="boton_form_factura">
             
               <button  class="btn btn-primary btn-lg" >Nuevo</button>
               <button  class="btn btn-primary btn-lg" >Limpiar</button>
               <button  class="btn btn-primary btn-lg" >Agregar</button>

            </div>


          </form>
        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.container-->
  </section>

