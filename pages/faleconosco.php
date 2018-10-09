

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fale Conosco
      </h1>
      <ol class="breadcrumb">
        <li><a href="/faleconosco"><i class="fa fa-dashboard"></i> Fale Conosco</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
           
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="faleconosco">
            {{csrf_field()}}
                        
              <div class="box-body">
                <div class="form-group">
                  <label for="InputEmail1">E-mail</label>
                  <input type="text" name="InputEmail1"  class="form-control" id="InputEmail1" placeholder="preencha seu e-mail">
                </div>
                <div class="form-group">
                  <label for="InputNome1">Nome</label>
                  <input  type="text" name="InputNome1" class="form-control" id="InputNome1" placeholder="preencha seu Nome">
                </div>
                
                <div class="form-group">
                  <label>Mensagem</label>
                  <textarea class="form-control"  name="Mensagem" id="Mensagem" rows="3" placeholder="Digite sua mensagem"></textarea>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 