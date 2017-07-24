<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Controle de Atividades </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>O</b>LI</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Controle </b>&nbsp;Atividades</span>
    </a>
   
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
  
        </div>
        <div class="pull-left info">
          <p></p>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
       <ul class="sidebar-menu">
        <li>
          <a href="<?php echo base_url() ?>home">
            <i class="fa fa-home"></i> <span>HOME</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"></small>
            </span>
          </a>
        </li>
       
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Atividades
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url() ?>home">Atividades</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista De Atividades</h3>
              <?php if ($this->session->flashdata('erro')) { ?>
                  <div class="alert alert-danger">
                      <?= $this->session->flashdata('erro') ?>
                  </div>
                  <?php if (validation_errors()) { ?>
                      <div class="alert alert-danger">
                      <?= validation_errors() ?>
                      </div>
                      <?php } ?>
              <?php } ?>
              
            </div>
              <div class="box">
            <div class="box-header">              
              <?php if ($this->session->flashdata('erro2')) { ?>
                  <div class="alert alert-danger">
                      <?= $this->session->flashdata('erro2') ?>
                  </div>
                  <?php if (validation_errors()) { ?>
                      <div class="alert alert-danger">
                      <?= validation_errors() ?>
                      </div>
                      <?php } ?>
              <?php } ?>
              
            </div>
              <div class="container">
  <!-- Modal -->
  <div class="modal fade" id="cadastrar_diretor" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:green;"><span class="glyphicon glyphicon-lock"></span> Cadastrar Atividades</h4>
        </div>
          
        <div class="modal-body">
          <form action='<?php echo base_url() ?>cadastrar' method='POST' method="get" role="form">
              <form method="get" action=".">
            <div class="form-group">
              <label for="nome"><span class="glyphicon glyphicon-education"></span> Nome</label>
              <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome ">
            </div>
            <div class="form-group">
              <label for="nome_curso"><span class="glyphicon glyphicon-education"></span>Descrição</label>
              <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição ">
            </div>
            <div class="form-group">
              <label for="data_inicio"><span class="glyphicon glyphicon-education"></span>Data de Inicio</label>
              <input type="date" name="data_inicio" class="form-control" id="data_inicio" placeholder="Data de Inicio ">
            </div>
            <div class="form-group">
              <label for="data_fim"><span class="glyphicon glyphicon-education"></span>Data de Fim</label>
              <input type="date" name="data_fim" class="form-control" id="data_fim" placeholder="Data de Fim ">
            </div>
            
            <div class="form-group">
             <label for="status"><span class="glyphicon glyphicon-education"></span>Status</label> 
             <select class="form-control select2" style="width: 100%;"  name='idstatus' id='idstatus'>
                 <?php foreach ($status as $value): ?>
                 <option name="idstatus" value=" <?= $value['idstatus']; ?>"><?= mb_strtoupper($value['status']) ?></option>
                 <?php endforeach; ?>
             </select>
            </div>
            <button style="color:white;" type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Cadastrar</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
        </div>
      </div>
    </div>
  </div> 
</div>
              <?php foreach ($lista as  $list):?>
              <div class="modal fade" id="editar_<?= $list['idcontrole']  ?>" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:green;"><span class="glyphicon glyphicon-lock"></span> Cadastrar Atividades</h4>
        </div>
          
        <div class="modal-body">
          <form action='<?php echo base_url() ?>editar' method='POST' method="get" role="form">
           <input type="hidden" id="idcontrole" name="idcontrole" value="<?= $list['idcontrole'];?>" >
              <form method="get" action=".">
         <div class="form-group">
              <label for="nome"><span class="glyphicon glyphicon-education"></span> Nome</label>
              <input type="text" name="nome" value="<?=$list['nome']; ?>" class="form-control" id="nome" placeholder="Nome ">
            </div>
            <div class="form-group">
              <label for="nome_curso"><span class="glyphicon glyphicon-education"></span>Descrição</label>
              <input type="text" name="descricao" value="<?=$list['descricao']; ?>" class="form-control" id="descricao" placeholder="Descrição ">
            </div>
            <div class="form-group">
              <label for="data_inicio"><span class="glyphicon glyphicon-education"></span>Data de Inicio</label>
              <input type="date" name="data_inicio" value="<?=$list['data_inicio']; ?>" class="form-control" id="data_inicio" placeholder="Data de Inicio ">
            </div>
            <div class="form-group">
              <label for="data_fim"><span class="glyphicon glyphicon-education"></span>Data de Fim</label>
              <input type="date" name="data_fim" value="<?=$list['data_fim']; ?>" class="form-control" id="data_fim" placeholder="Data de Fim ">
            </div>
            <div class="form-group">
             <label for="status"><span class="glyphicon glyphicon-education"></span>Status</label> 
             <select class="form-control select2" style="width: 100%;"  name='idstatus' id='idstatus' >
                 <?php foreach ($status as $value): ?>
                 <option  <?=$list['status'] ?>name="idstatus"  value=" <?= $value['idstatus']; ?>"><?= mb_strtoupper($value['status']) ?></option>
                 <?php endforeach; ?>                 
             </select>
            </div>
            
            <button style="color:white;" type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Cadastrar</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
        </div>
      </div>
    </div>
  </div> 
  <?php endforeach; ?>
<!-- Buttons -->

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th>Data de Inicio</th>
                  <th>Data de Fim</th>
                  <th>Situação</th>
                  <th>Status</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    
                <?php
              foreach ($lista as $list):              
                       ?> 
                    <tr class="<?php ?>" id="odd_gradeX_" data-id="">
                     <td><?= $list['nome']; ?></td>
                     <td><?= $list['descricao'];  ?></td>
                     <td><?= date('d/m/Y', strtotime($list['data_inicio'])) ?></td>
                     <td>
                     <?php if ($list['data_fim'] >1){                         
                         echo date('d/m/Y', strtotime($list['data_fim']));
                         } else {
                             echo "Data não definida";
                         }
                         ?>                  
                     </td>
                     <td><?php
                          $situacao =  $list['situacao'];
                         if($situacao == 1)
                         {
                         echo $situacao = "Ativo";
                         }
                         else{
                         echo $situacao = "Inativo";
                         }                         
                         ?>
                     </td>                
                         <td> 
                             <h4>
                                 <?php
                                 $idstatus = $list['idstatus'];
                                 $status = $list['status'];
                                 if ($list['idstatus']  == 4) {

                                     echo" <span class='label label-success pull-right'>
                                         $status</span>";
                                 }
                                 ?>
                             </h4>
                                 <?php                                 
                                 if ($idstatus == 1 || $idstatus == 2 || $idstatus == 3) {
                                     echo" 
                                          $status";
                                 }
                                 ?>  

                         </td>
                         
                
<!-- Modal -->
                  
<td>
    <?php if ($list['idstatus']  == 4): ?>
    <button type="button" class="btn btn-primary" disabled=""  data-toggle="modal" data-target="#editar_<?php echo $list['idcontrole'] ?>">
    <span class="glyphicon glyphicon-edit"></span> 
</button>
    
    <?php endif; ?>
    <?php if ($list['idstatus'] <4): ?>
<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#editar_<?php echo $list['idcontrole'] ?>">
    <span class="glyphicon glyphicon-edit"></span> 
</button>
    
    <?php endif; ?>
                    
                </tr>
    <?php
    endforeach;
?>      

                 </tbody>
                <tfoot>
               </tfoot>
              </table>
                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#cadastrar_diretor">Cadastrar Atividades</button>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b>1.0
    </div>
    <strong>Copyright &copy; 2017-<?php echo date('Y') ?> <a href="">Controle de Atividades</a>.</strong>Todos direitos
    reservados.
  </footer>
<div class="control-sidebar-bg"></div>
</div>

<script src="<?php echo base_url()?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script src="<?php echo base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>

<script src="<?php echo base_url()?>assets/plugins/fastclick/fastclick.js"></script>

<script src="<?php echo base_url()?>assets/dist/js/app.min.js"></script>

<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
