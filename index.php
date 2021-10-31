
<?php
    //import do arquivo de conexão com o BD
    require_once('bd/conexao.php');

    //chama a funçao que abre a conexão com o BD Mysql
    $conexao = conexaoMysql();

    /* Para testar se deu certo 
    var_dump($conexao);
    */
?>


<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Cadastro de Usuários </title>
        <link rel="stylesheet" type="text/css" href="style/style.css">

    </head>
    <body>
        <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de Usuários </h1>
            </div>
            <div id="cadastroInformacoes">
                               
                <form action="" name="frmCadastro" method="post" >
                   
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="" placeholder="Digite seu Nome" maxlength="100">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> NickName: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNickName" value="">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Login: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtLogin" value="">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Senha: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="password" name="txtSenha" value="" maxlength="20">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Email: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="email" name="txtEmail" value="">
                        </div>
                    </div>
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Salvar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="5">
                        <h1> Lista de Usuários</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> NickName </td>
                    <td class="tblColunas destaque"> Login </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>
                
                <?php
                    //Script SQL que será executado no BD
                    $sql = "select * from tblusuario";

                    // Executa no BD o script SQL    
                    $select = mysqli_query($conexao, $sql);

                    // mysqli_fetch_assoc() - Permite converter o resultado do BD em uma array de dados no PHP
                    while ($listUsuarios = mysqli_fetch_assoc($select))
                    {
                ?>
                <tr id="tblLinhas">
                    <td class="tblColunas registros"><?=$listUsuarios['nome']?></td>
                    <td class="tblColunas registros"><?=$listUsuarios['nickname']?></td>
                    <td class="tblColunas registros"><?=$listUsuarios['login']?></td>
                    <td class="tblColunas registros">
                        <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                        <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                        <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </body>
</html>