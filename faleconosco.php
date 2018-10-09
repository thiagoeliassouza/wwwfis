<!DOCTYPE html>
<html>

<?php
 //$conteudo = json_decode($conteudo);
?>
<?php 
//include "phpmailer/src/PHPMailer.php";
require("phpmailer/src/PHPMailer.php"); 
require("phpmailer/src/SMTP.php"); 
?>

<?php include 'master/header_master.php';?>

<title>Estudar Física - Fale Conosco</title>
<meta name="description" content="Fale Conosco, envie sua mensagem para nós!">
</head>


<body class="hold-transition skin-blue sidebar-mini">
 
    <div class="wrapper">
    <?php include 'master/header.php';?>
    <?php include 'master/sidebar.php';?>


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


        
      <?php 
      if   (isset($_POST["InputEmail1"])) 
      {


        $email = $_POST["InputEmail1"];
        $pInputNome1 = $_POST["InputNome1"];
        $pMensagem = $_POST["Mensagem"];
        $subject = "ESTUDARFISICA.COM.BR";
        $body = $pMensagem ;

        //$mail = new PHPMailer;
        
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        
        $mail->isSMTP();
        //$mail->Host = 'smtp.gmail.com';
        //$mail->Port = 465;
        $mail->CharSet = 'utf-8';

        $mail->IsSMTP(); // telling the class to use SMTP
        //$mail->Host = "sm...@gmail.com"; // SMTP server
       // $mail->SMTPDebug = 1; // enables SMTP debug information (for testing)
        // 1 = errors and messages
        // 2 = messages only
        $mail->SMTPAuth = true; // enable SMTP authentication
       
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        //or more succinctly:
        //$mail->Host = 'tls://smtp.gmail.com:587';
        
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        //or more succinctly:
        //$mail->Host = 'ssl://smtp.gmail.com:465';
       
        //$mail->SMTPSecure = "ssl"; // git adsets the prefix to the servier tls
        //$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
        //$mail->Port = 587; // set the SMTP port for the GMAIL server
        $mail->Username = "wwwestudarfisica@gmail.com"; // GMAIL username
        $mail->Password = "fisica@69"; // GMAIL password
        $err = false;
        $msg = '';
        
        $to = "thiagoelias.souza@gmail.com";
        $cc = "thiago.souza@estadao.com";
        
      
        $subject = "ESTUDARFISICA.COM.BR";
        $body = $pMensagem . "\n" .  $pInputNome1 . "\n" . $email;
  


        //It's important not to use the submitter's address as the from address as it's forgery,
        //which will cause your messages to fail SPF checks.
        //Use an address in your own domain as the from address, put the submitter's address in a reply-to
        $mail->setFrom('noreply@estudarfisica.com.br');
        $mail->addAddress($to);
        $mail->AddCC("thiago.souza@estadao.com");
        //$mail->addReplyTo($email, $name);
        $mail->Subject =  $subject;
        $mail->Body = $body;
        if (!$mail->send()) {
            $msg .= "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $msg .= "Message sent!";
        }

        echo "<center>Mensagem enviada com sucesso!</center>";
   
        


      } 
      ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
           
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="faleconosco.php">
                               
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
   
<?php include 'master/footer_master.php';?>
</body>
</html> 