<?php
$usuario_ctrl = new CtrlUsuario();
define("FOTOUSUARIO", $usuario_ctrl->obterFotoUsuario($_SESSION['idUsuario']));
define("NIVELACESSO", $usuario_ctrl->obterNiveldeAcesso($_SESSION['idUsuario']));
define("NOMEGRUPO", $usuario_ctrl->obterNomeGrupo($_SESSION['idUsuario']));
define("IDGRUPO", $usuario_ctrl->obterIdGrupoAtual($_SESSION['idUsuario']));
?>