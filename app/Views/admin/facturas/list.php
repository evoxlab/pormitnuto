<!doctype html>
<html lang="es-PE">
   <?php echo view("admin/head"); ?>
   <body data-new-gr-c-s-check-loaded="14.1042.0" data-gr-ext-installed="">
      <?php echo view("admin/header"); ?>
      <section class="pcoded-main-container">
         <div class="pcoded-wrapper">
            <div class="pcoded-content">
               <div class="pcoded-inner-content">
                  <div class="page-header">
                     <div class="page-block">
                        <div class="row align-items-center">
                           <div class="col-md-12">
                              <div class="page-header-title">
                                 <h5 class="m-b-10">Facturas</h5>
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/dashboard">Panel</a></li>
                                 <li class="breadcrumb-item"><a>Facturas</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="main-body">
                     <div class="page-wrapper">
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="card">
                                 <div class="card-header">
                                    <h5>Listado de Facturas</h5>
                                 </div>
                                 <div class="card-block">
                                    <div class="table-responsive">
                                       <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                          <div class="row">
                                             <div class="col-sm-12">
                                                <div id="zero-configuration_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                   <div class="row">
                                                      <div class="col-sm-12">
                                                         <table id="zero-configuration" class="display table nowrap table-striped table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="zero-configuration_info">
                                                            <thead>
                                                            <tr role="row">
                                                               <th>ID</th>
                                                               <th>Periodo</th>
                                                               <th>Cliente</th>
                                                               <th>Tipo de Pago</th>
                                                               <th>Importe</th>
                                                               <th>Puntos</th>
                                                               <th>Recojo</th>
                                                               <th>Fecha</th>
                                                               <th>Estado</th>
                                                               <th>Acción</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            if ($obj_invoices) {
                                                               foreach ($obj_invoices as $value) : ?>
                                                                  <tr>
                                                                     <td><?php echo $value->id; ?></td>
                                                                     <td><?php echo $value->code; ?></td>
                                                                     <td>
                                                                        <?php echo $value->name . " " . $value->lastname; ?><br>
                                                                        <b><?php echo "@" . $value->username; ?></b>
                                                                     </td>
                                                                     <td>
                                                                        <?php if ($value->payment == '1') {
                                                                           $valor = "Monedero";
                                                                           $stilo = "label label-info";
                                                                        } elseif ($value->payment == '2') {
                                                                           $valor = "Tarjeta";
                                                                           $stilo = "label label-success";
                                                                        } else {
                                                                           $valor = "En Tienda";
                                                                           $stilo = "label label-warning";
                                                                        } ?>
                                                                        <span style="border-radius:10px" class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                                                     </td>
                                                                     <td>
                                                                        <h6><?php echo format_number_moneda_soles($value->amount); ?></h6>
                                                                     </td>
                                                                     <td>
                                                                        <?php echo format_number_miles($value->points);?>
                                                                     </td>
                                                                     <td>
                                                                        <?php
                                                                        if ($value->store_name == "Almacén general") { ?>
                                                                           <span style="border-radius:10px" class="label label-info"><?php echo $value->store_name; ?></span>
                                                                        <?php } else { ?>
                                                                           <span style="border-radius:10px;color:white" class="label theme-bg2"><?php echo $value->store_name; ?></span>
                                                                        <?php } ?>
                                                                     </td>
                                                                     <td><?php echo formato_fecha_dia_mes_anio_abrev($value->date) . "<br/>" . formato_fecha_minutos($value->date); ?></td>
                                                                     <td>
                                                                        <?php if ($value->active == '1') {
                                                                           $valor = "Por Pagar";
                                                                           $stilo = "label label-warning";
                                                                        } elseif ($value->active == '2') {
                                                                           $valor = "Pagado";
                                                                           $stilo = "label label-success";
                                                                        } else {
                                                                           $valor = "Cancelado";
                                                                           $stilo = "label label-danger";
                                                                        }
                                                                        ?>
                                                                        <span style="border-radius:10px" class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                                                     </td>
                                                                     <td>
                                                                        <div class="operation">
                                                                           <div class="btn-group">
                                                                              <button type="button" class="btn btn-icon btn-info" title="Editar" onclick="edit_invoices('<?php echo $value->id; ?>');"><i class="fa fa-edit"></i></button>
                                                                              <button type="button" class="btn btn-icon btn-danger" title="Eliminar" onclick="eliminar('<?php echo $value->id; ?>');"><i class="fa fa-trash"></i></button>
                                                                           </div>
                                                                        </div>
                                                                     </td>
                                                                  </tr>
                                                            <?php endforeach;
                                                            }
                                                            ?>
                                                            </tbody>
                                                            <tfoot>
                                                               <tr>
                                                                  <th>ID</th>
                                                                  <th>Periodo</th>
                                                                  <th>Cliente</th>
                                                                  <th>Tipo de Pago</th>
                                                                  <th>Importe</th>
                                                                  <th>Puntos</th>
                                                                  <th>Recojo</th>
                                                                  <th>Fecha</th>
                                                                  <th>Estado</th>
                                                                  <th>Acción</th>
                                                               </tr>
                                                            </tfoot>
                                                         </table>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script src="<?php echo base_url('assets/admin/js/script/invoices.js?20245'); ?>"></script> 
      <!-- [ Header ] end -->
      <!-- [ Main Content ] end -->
      <?php echo view("admin/footer"); ?>