<?php
$usuario_ctrl = new CtrlUsuario();
define("FOTOUSUARIO", $usuario_ctrl->obterFotoUsuario($_SESSION['idUsuario']));
define("NIVELACESSO", $usuario_ctrl->obterNiveldeAcesso($_SESSION['idUsuario']));
define("NOMEGRUPO", $usuario_ctrl->obterNomeGrupo($_SESSION['idUsuario']));
define("IDGRUPO", $usuario_ctrl->obterIdGrupoAtual($_SESSION['idUsuario']));

//define("CAMINHO_FOTOPERFIL_LINUX" , "/home/casa/Documentos/DesenvolvimentoWeb/SiteProjetoIntegradorPhp/upload/foto_perfil/".FOTOUSUARIO);
// define("CAMINHO_FOTOPERFIL_WINDOWS" , $caminho."/upload/foto_perfil/".FOTOUSUARIO);
//define("CAMINHO_FOTOPOSTAGEM" , "/home/casa/Documentos/DesenvolvimentoWeb/SiteProjetoIntegradorPhp/upload/foto_perfil/upload/postagens/");
?>