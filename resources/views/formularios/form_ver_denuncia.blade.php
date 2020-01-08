@role('reporte')

<section class="content">

    <div class="row">
      <div class="col-md-3">

        <!-- About Me Box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            {{-- <h3 class="box-title">Datos del denunciante</h3> --}}
            <p style="font-size:18px;"><b>Datos del denunciante</b></p>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            {{-- <strong><i class="fa fa-book margin-r-5"></i> Education</strong> --}}
            <strong><i class="fa fa-user margin-r-5"></i> Nombre</strong>
            <p class="text-muted">
              {{ $denuncia->nombre }} {{ $denuncia->apellidos}}
            </p>
            <hr>
            <strong><i class="fa fa-list-alt margin-r-5"></i> Carnet o Pasaporte</strong>
            <p class="text-muted">
              {{ $denuncia->ci }}
            </p>
            <hr>
            <strong><i class="fa fa-home margin-r-5"></i> Dirección</strong>
            <p class="text-muted">
              {{  $denuncia->direccion !== "" ? $denuncia->direccion : "-" }}
            </p>
            <hr>
            <strong><i class="fa fa-envelope margin-r-5"></i> Correo Electrónico</strong>
            <p class="text-muted">
              {{ $denuncia->email }}
            </p>
            <hr>
            <strong><i class="fa fa-map-marker margin-r-5"></i> Residencia del Denunciante</strong>
            <p class="text-muted">
              {{ $denuncia->dpto_denunciante  !== "" ? $denuncia->dpto_denunciante : "-" }}
            </p>
            <hr>
            <strong><i class="fa fa-phone margin-r-5"></i> Teléfono</strong>
            <p class="text-muted">
              {{ $denuncia->telefono }}
            </p>

            <hr>

            {{-- <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

            <p class="text-muted">Malibu, California</p>

            <hr> 
            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

            <p>
              <span class="label label-danger">UI Design</span>
              <span class="label label-success">Coding</span>
              <span class="label label-info">Javascript</span>
              <span class="label label-warning">PHP</span>
              <span class="label label-primary">Node.js</span>
            </p>

            <hr> --}}

            <strong><i class="fa fa-file-text margin-r-5"></i> Fecha de la denuncia</strong>

            <p class="text-muted">{{ $denuncia->created_at }}</p>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab"><p style="font-size:18px;"><b>Datos del Denunciado</b></p></a></li>
            {{-- <li><a href="#timeline" data-toggle="tab"><p style="font-size:18px;"><b>Documentación Adjunta</b></p></a></li> --}}
            {{-- <li><a href="#settings" data-toggle="tab">Settings</a></li> --}}
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <!-- Post -->
              <div>
                <div class="col-md-6">
                  <strong><i class="fa fa-user margin-r-5"></i> Tipo de Empresa</strong>
                  <p class="text-muted">
                    {{ $denuncia->tipo_empresa }}
                  </p>
                  <hr>
                  <strong><i class="fa fa-list-alt margin-r-5"></i> Link de la Oferta Denunciada</strong>
                  <p class="text-muted">
                    {{ $denuncia->link_oferta !== "" ? $denuncia->link_oferta : "-" }}
                  </p>
                  <hr>
                  <strong><i class="fa fa-home margin-r-5"></i> Razón Social o Nombre</strong>
                  <p class="text-muted">
                    {{ $denuncia->razon_social }}
                  </p>
                  <hr>
                  <strong><i class="fa fa-envelope margin-r-5"></i> NIT</strong>
                  <p class="text-muted">
                    {{ $denuncia->nit !== "" ? $denuncia->nit : "-" }}
                  </p>
                  <hr>
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Teléfono</strong>
                  <p class="text-muted">
                    {{ $denuncia->telefono_reportado !== "" ? $denuncia->telefono_reportado : "-" }}
                  </p>
                  <hr>
                  <strong><i class="fa fa-phone margin-r-5"></i> Dirección donde compró el producto</strong>
                  <p class="text-muted">
                    {{ $denuncia->dir_compra !== "" ? $denuncia->dir_compra : "-" }}
                  </p>
                  <hr>
                  <strong><i class="fa fa-phone margin-r-5"></i> Ciudad - Locación específica</strong>
                  <p class="text-muted">
                    {{ $denuncia->dpto_hecho }} {{ $denuncia->lugar_especifico !== "" ? " - ".$denuncia->lugar_especifico : "" }}
                  </p>
                  
                </div>



                <div class="">
                  <strong><i class="fa fa-user margin-r-5"></i> Nombre del Denunciado</strong>
                  <p class="text-muted">
                    {{ $denuncia->nombre_reportado !== "" ? $denuncia->nombre_reportado : "-" }}
                  </p>
                  <hr>
                  <strong><i class="fa fa-list-alt margin-r-5"></i> Descripción del Hecho Denunciado</strong>
                  <p class="text-muted">
                    {{ $denuncia->decripcion_hecho !== "" ? $denuncia->decripcion_hecho : "-" }}
                  </p>
                  <hr>
                  <strong><i class="fa fa-home margin-r-5"></i> Razón Social o Nombre</strong>
                  <p class="text-muted">
                    {{ $denuncia->razon_social }}
                  </p>
                  <hr>
                  <strong><i class="fa fa-envelope margin-r-5"></i> NIT</strong>
                  <p class="text-muted">
                    {{ $denuncia->nit !== "" ? $denuncia->nit : "-" }}
                  </p>
                  <hr>
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Teléfono</strong>
                  <p class="text-muted">
                    {{ $denuncia->telefono_reportado !== "" ? $denuncia->telefono_reportado : "-" }}
                  </p>
                  <hr>
                  <strong><i class="fa fa-phone margin-r-5"></i> Dirección donde compró el producto</strong>
                  <p class="text-muted">
                    {{ $denuncia->dir_compra !== "" ? $denuncia->dir_compra : "-" }}
                  </p>
                  <hr>
                  <strong><i class="fa fa-phone margin-r-5"></i> Ciudad - Locación específica</strong>
                  <p class="text-muted">
                    {{ $denuncia->dpto_hecho }} {{ $denuncia->lugar_especifico !== "" ? " - ".$denuncia->lugar_especifico : "" }}
                  </p>
                  
                </div>
              </div>
              <!-- /.post -->
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="timeline">
              <!-- The timeline -->
              <ul class="timeline timeline-inverse">
                <!-- timeline time label -->
                <li class="time-label">
                      <span class="bg-red">
                        10 Feb. 2014
                      </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-envelope bg-blue"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                    <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-primary btn-xs">Read more</a>
                      <a class="btn btn-danger btn-xs">Delete</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-user bg-aqua"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                    </h3>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-comments bg-yellow"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                    <div class="timeline-body">
                      Take me to your leader!
                      Switzerland is small and neutral!
                      We are more like Germany, ambitious and misunderstood!
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <li class="time-label">
                      <span class="bg-green">
                        3 Jan. 2014
                      </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-camera bg-purple"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                    <div class="timeline-body">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
            </div>

          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
@else
 <br/><div class='rechazado'><label style='color:#FA206A'>"no tiene permisos para esta seccion"</label>  </div> 

@endrole

