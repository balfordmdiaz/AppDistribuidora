<section id="contact-page">
    <div class="container">
      <div class="center">
        <h2>Factura</h2>
      </div>
      <div class="row contact-wrap">
        <div class="col-md-8 col-md-offset-2">
          
        <form id="formulariofactura" method="" action="">
        @csrf
        
            <div class="form-group">
              <label for="idcliente" style="float: left">cliente:</label>
              <select  name="idlcliente" class="form-control">
                    @forelse($cliente as $clienteItem)
                            <option value="{{ $clienteItem->idcliente }}">{{ $clienteItem->idlcliente }} {{ $clienteItem->nombre }} {{ $clienteItem->departamento }}</option>
                    @empty
                            <option value="">No hay Clientes</option>
                    @endforelse
                 
              </select>
            </div>

            <div class="form-group">
                <input name="idlfactura" type="text" class="form-control" placeholder="Codigo factura">
            </div>

            <div class="form-group">
                <input name="idlempleado" type="text" class="form-control" placeholder="Codigo empleado">
            </div>

            <div class="form-group">
                <label for="idarticulo" style="float: left">producto:</label>
                <select  id="idlarticulo" name="idlarticulo" class="form-control" onchange="ShowSelected();">
                    @forelse($articulo as $articuloItem)
                          <option value="{{ $articuloItem->idarticulo }}">{{ $articuloItem->idlarticulo }} {{ $articuloItem->descripcion }}</option>
                          
                    @empty
                          <option value="">No hay Articulo</option>
                    @endforelse
                               
                </select>            
            </div>

            <div class="form-group">
                <label for="" style="float: left">Fecha:</label>
                <input name="fecha" type="date" class="form-control" >
            </div>

            <div class="form-group">
              <input name="chec" type="checkbox" id="chec" onChange="comprobar(this);" onclick="ShowSelected();" />
                    <label for="chec">IVA(opcional)</label>
                    <input name="Iva" type="number" id="boton" class="form-control" step="any" style="display:none" placeholder="IVA" />
            </div>

            <div class="form-group">
                  <label for="" style="float: left">Descuento:</label>
                  <input name="descuento" id="descuento" type="number" step="any" class="form-control" value="0" onkeyup="ShowSelected();" />
            </div>

            <div class="form-group">
                <label for="" style="float: left">Cantidad:</label>
                <input name="cantidad" id="cantidad" type="number" class="form-control" value="1" onkeyup="ShowSelected();"/>
            </div>

            <div class="form-group" >
                  <label for="" style="float: left">Precio:</label>
                  <input name="precio" id="precio" type="number" step="any" class="form-control" />        
            </div>

            <div class="form-group">
                <label for="" style="float: left">SubTotal:</label>
                <input name="subtotal" id="subtotal" type="number" step="any" class="form-control" />       
            </div>

            <div class="form-group">
                <label for="" style="float: left">Total:</label>
                <input name="total" id="total" type="number" step="any" class="form-control" />          
            </div>

            
            <div id="boton_form_factura">
               <button  class="btn btn-primary btn-lg" >Agregar</button>
            </div>


          </form>
        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.container-->
  </section>

