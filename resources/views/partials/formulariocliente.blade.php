<section id="contact-page">
    <div class="container">
      <div class="center">
        <h2>Cliente</h2>
      </div>
      <div class="row contact-wrap">
        <div class="col-md-8 col-md-offset-2">
          
          <form  method="POST" {{ route('cliente') }}>
          @csrf
            <div class="form-group">
                <input name="codigo" type="text" class="form-control" placeholder="Codigo" />
            </div>

            <div class="form-group">
                <input name="nombre" type="text" class="form-control" placeholder="Nombre" >
            </div>

            <div class="form-group">
                <input name="apellido" type="text" class="form-control" placeholder="Apellido" >
            </div>

            <div class="form-group">
                <input name="cedula" type="text" class="form-control" placeholder="Cedula"> 
            </div>

            <div class="form-group">
                <input name="telefono" type="number" class="form-control" placeholder="Telefono" >
            </div>

            <div class="form-group">
                <textarea name="direccion" class="form-control" placeholder="Direccion" ></textarea>
            </div>
            <div class="form-group">
                <input name="email" type="email" class="form-control" placeholder="Email"/>
            </div>
            
            <div id="boton_form_client">
            <button  class="btn btn-primary btn-lg" >Registrar</button>
            <button  class="btn btn-primary btn-lg" >Buscar</button>
            <button  class="btn btn-primary btn-lg" >Actualizar</button>
            </div>


          </form>
        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.container-->
  </section>