<div class="container">
  <h1>Instalación de su proyecto</h1>
  <p>Su proyecto, aún no ha sido configurado, siga los paso para completar la Instalación</p>
  <div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active">
        <a href="#tabUsuario" aria-controls="tabUsuario" role="tab" data-toggle="tab">Usuario administrador</a>
      </li>
      <li role="presentation">
        <a href="#tabBD" aria-controls="tabBD" role="tab" data-toggle="tab">Base de datos</a>
      </li>
      <li role="presentation">
        <a href="#tabTerminar" aria-controls="tabTerminar" role="tab" data-toggle="tab">Terminar</a>
      </li>
    </ul>
    
    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="tabUsuario">
        <form  id="formUsuario" role="form">
          <legend>Complete los datos para su usuario administrador</legend>
          <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="nombre">Nombres</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos">
                  </div>
                </div>
              </div><!--row-->

              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                  </div>
                </div>
              </div><!--row-->

              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="congPassword">Confirmar</label>
                    <input type="password" class="form-control congPassword" id="congPassword" name="congPassword" placeholder="Confirmar">
                  </div>
                </div>
              </div><!--row-->
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right">Siguiente paso</button>
        </form>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="tabBD">
        <form id="formBD" role="form">
          <legend>Complete los datos de su base de datos (MySQL/MariaBD)</legend>
          <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="host">Host</label>
                    <input type="text" class="form-control" id="host" name="host" placeholder="Host" value="localhost">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="puerto">Puerto</label>
                    <input type="text" class="form-control" id="puerto" name="puerto" placeholder="Puerto" value="3306">
                  </div>
                </div>
              </div><!--row-->

              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                  </div>
                </div>
              </div><!--row-->

              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="nombreBD">Nombre base de datos</label>
                    <input type="password" class="form-control" id="nombreBD" name="nombreBD" placeholder="Nombre base de datos">
                  </div>
                </div>
              </div><!--row-->
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right">Siguiente paso</button>
        </form>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="tabTerminar">
        <form id="formBD" role="form">
          <legend>El fin del comienzo :3</legend>
          <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="host">Host</label>
                    <input type="text" class="form-control" id="host" name="host" placeholder="Host" value="localhost">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="puerto">Puerto</label>
                    <input type="text" class="form-control" id="puerto" name="puerto" placeholder="Puerto" value="3306">
                  </div>
                </div>
              </div><!--row-->

              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                  </div>
                </div>
              </div><!--row-->

              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="nombreBD">Nombre base de datos</label>
                    <input type="password" class="form-control" id="nombreBD" name="nombreBD" placeholder="Nombre base de datos">
                  </div>
                </div>
              </div><!--row-->
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right">Siguiente paso</button>
        </form>
      </div>
    </div>
  </div>
</div>