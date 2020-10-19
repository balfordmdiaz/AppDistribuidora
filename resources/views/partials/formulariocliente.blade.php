<section id="contact-page">
  <div class="container">
    <div class="center">
      <h2>Cliente</h2>
    </div>
    <div class="row contact-wrap">
      <div class="col-md-8 col-md-offset-2">
        
        <form  method="POST" action="{{ route('cliente.store') }}">
        @csrf
          <div class="form-group">
              <input name="IdLCliente" type="text" class="form-control" placeholder="Codigo" />
          </div>

          <div class="form-group">
              <input name="Nombre" type="text" class="form-control" placeholder="Nombre" >
          </div>

          <div class="form-group">
              <input name="Apellido" type="text" class="form-control" placeholder="Apellido" >
          </div>

          <div class="form-group">
              <input name="Cedula" type="text" class="form-control" placeholder="Cedula"> 
          </div>

          <div class="form-group">
              <input name="Telefono" type="number" class="form-control" placeholder="Telefono" >
          </div>

          <div class="form-group">
            <input name="Departamento" type="text" class="form-control" placeholder="Departamento" >
          </div>

          <div class="form-group">
              <textarea name="Direccion" class="form-control" placeholder="Direccion" ></textarea>
          </div>
          <div class="form-group">
              <input name="Email" type="email" class="form-control" placeholder="Email"/>
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