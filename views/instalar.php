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
                    <input type="text" class="form-control required" id="correo" name="correo" placeholder="Correo">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control required" id="username" name="username" placeholder="Username">
                  </div>
                </div>
              </div><!--row-->

              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control required" id="password" name="password" placeholder="Contraseña">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="confPassword">Confirmar</label>
                    <input type="password" class="form-control confPassword required" id="confPassword" name="confPassword" placeholder="Confirmar">
                  </div>
                </div>
              </div><!--row-->
            </div>
          </div>
          <button type="button" class="btn btn-primary pull-right next-tab" "><i class="fa fa-arrow-right"></i> Siguiente paso</button>
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
                    <input type="text" class="form-control required" id="host" name="host" placeholder="Host" value="localhost">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="puerto">Puerto</label>
                    <input type="text" class="form-control required" id="port" name="port" placeholder="Puerto" value="3306">
                  </div>
                </div>
              </div><!--row-->

              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control required" id="username" name="username" placeholder="Username">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control required" id="password" name="password" placeholder="Contraseña">
                  </div>
                </div>
              </div><!--row-->

              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="nombreBD">Nombre base de datos</label>
                    <input type="text" class="form-control required" id="dbName" name="dbName" placeholder="Nombre base de datos">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label for="prefijo">Prefijo</label>
                    <input type="text" class="form-control" id="prefijo" name="prefijo" placeholder="Prefijo">
                  </div>
                </div>
              </div><!--row-->
            </div>
          </div>
          <button type="button" class="btn btn-primary pull-right next-tab">Siguiente paso</button>
        </form>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="tabTerminar">
        <p>Procederemos a realizar la instalación del sistema</p>
        <div class="row">
          <div class="col-lg-12">
            <div class="progress">
              <div id="progress-bar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                0%
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-lg-offset-4">
            <button type="button" class="btn btn-primary form-control" id="btnInstalar"><i class="fa fa-server"></i> Instalar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>