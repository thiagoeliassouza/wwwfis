<!DOCTYPE html>
<html>

<?php
 $conteudo = json_decode($conteudo);
?>

@include ('master/header-master')

<body class="hold-transition skin-blue sidebar-mini">
 
    <div class="wrapper">
        @include ('master/header')
        @include ('master/sidebar')
        @include ($conteudo->pagina)
        @include ('master/footer')
        @include ('master/footer-master')
</div>
</body>
</html>
