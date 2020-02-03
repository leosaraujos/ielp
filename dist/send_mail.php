<?php
    if($_POST['contato']){
        $erro = 0;
        echo '<div class="row"><div class="col-12" text-center>';
        if($_POST['nome'] == ''){
            echo '<span class="badge badge-danger">Informe um nome</span>';
            $erro = 1;
        }
        if($_POST['telefone'] == ''){
            echo '<span class="badge badge-danger">Informe um telefone</span>';
            $erro = 1;
        }
        if($_POST['assunto'] == ''){
            echo '<span class="badge badge-danger">Informe um assunto</span>';
            $erro = 1;
        }
        if($_POST['email'] == ''){
            echo '<span class="badge badge-danger">Informe um email</span>';
            $erro = 1;
        }else{
            $validacao = eregi("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$",$_POST['email']); 
            if($validacao == 0){
                echo '<span class="badge badge-danger">Informe um email v&aacute;lido</span>';
                $erro = 1;
            }
        }if($_POST['mensagem'] == ''){
            echo '<span class="badge badge-danger">Informe uma mensagem</span>';
            $erro = 1;
        }

        if($erro == 0){
            $destinatario = $_POST['destinatario'];

            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $assunto = $_POST['assunto'];
            $mensagem = $_POST['mensagem'];
            $ip = $_SERVER['REMOTE_ADDR'];
            $navegador = $_SERVER['HTTP_USER_AGENT'];

            $headers = "MIME-Version: 1.1\n";
            $headers .= "Content-Type: text/html;\r\n charset=\"iso-8859-1\"\r\n";
            $headers .= "From: $nome <$email>\n"; // remetente
            $headers .= "Return-Path: $nome <$email>\n"; // return-path

            $subject = 'Contato Site IELP';

            $mensagem = '
            <html>
            <title>Contato Site IELP</title>
            <body>
                
            

            <table width="500px">
                <thead>
                    <tr>
                        <th colspan="2">
                            <img src="http://leoaraujo.com/yodesign/ielp/images/logo-ielp.png" alt="IELP" width="500px">
                        </th>
                    </tr>
                    <tr bgcolor="#ffc20f">
                        <th colspan="2" style="font-size: 25px; padding: 10px 0;text-align: center;">Contato Site IELP</th>
                    </tr>
                </thead>
                <tbody>
                    <tr bgcolor="#ffe8b2">
                        <td width="100px" style="font-size:16px; font-weight: bold">Nome:</td>
                        <td style="padding:2px 10px">'.$nome.'</td>
                    </tr>
                    <tr bgcolor="#fff9eb">
                        <td width="100px" style="font-size:16px; font-weight: bold">E-mail:</td>
                        <td style="padding:2px 10px">'.$email.'</td>
                    </tr>
                    <tr bgcolor="#ffe8b2">
                        <td width="100px" style="font-size:16px; font-weight: bold">Telefone:</td>
                        <td style="padding:2px 10px">'.$telefone.'</td>
                    </tr>
                    <tr bgcolor="#fff9eb">
                        <td width="100px" style="font-size:16px; font-weight: bold">Assunto:</td>
                        <td style="padding:2px 10px">'.$assunto.'</td>
                    </tr>
                    <tr bgcolor="#ffe8b2">
                        <td width="100px" style="font-size:16px; font-weight: bold">Mensagem:</td>
                        <td style="padding:2px 10px">'.$mensagem.'</td>
                    </tr>
                    <tr bgcolor="#fff9eb">
                        <td colspan="2" style="text-align:justify"></td>
                    </tr>
                </tbody>
                <tfoot>
                <tr>
                  <td colspan="2" style="text-align: center;">
                    <img src="http://leoaraujo.com/yodesign/ielp/images/logo-ielp.png" alt="IELP">
                  </td>          
                </tr>
                <tr>
                  <td colspan="2" style="text-align: center;">
                    <address style="font-size: 0.7rem;">
                    lorem ipsum is dolor sit amet<br>
                    Tel +55 11 0000.0000 contato@ielp.com
                    </address>
                    <small>IELP Instituto de Estudos Legislativos e Políticas Públicas © 2020 Todos os direitos reservados</small>
                  </td>
                </tr>    
              </tfoot>
            </table>


            
            </body>                        
            </html>
            ';
            if(mail($destinatario,$subject,$mensagem,$headers)){
            ?>
            <script language="JavaScript">
                $('#formulario').remove();
            </script>
            <?
                echo '<div class="success"><h4>Mensagem enviada com sucesso!</h4></div>';
            } else {
                echo '<div class="alert alert-danger fade in text-sm-center"><h4>Erro ao enviar a mensagem</h4></div>';
            }
            echo '</div></div>';    
        }
    }
?>