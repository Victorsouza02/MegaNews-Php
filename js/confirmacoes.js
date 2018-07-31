$(document).ready(function() {
        
        // CADASTRAR NOVA CATEGORIA
        $("#btn-cadcat").on("click", function () {
            alertify.confirm("Deseja criar uma nova categoria?", function () {$("#form-cadcat").submit();} , function(){alertify.error("Cancelado")});          
        });
        
        // DELETAR CATEGORIA
        $("#btn-delcat").on("click", function () {
            alertify.confirm("Deletar Categoria","Deseja deletar esta categoria?", function () {$("#form-delcat").submit();} , function(){alertify.error("Cancelado")});          
        });
        
        // DELETAR USUARIO
        $("#btn-deluser").click(function(){
            var href = this.href;
            alertify.confirm("Deseja deletar este usuário?", function () {window.location.href = href;} , function(){alertify.error("Cancelado")});     
            return false;
        });
        
        // DELETAR POSTAGEM
        $("#btn-delpost").click(function(){
            var href = this.href;
            alertify.confirm("Deletar Postagem","Deseja deletar esta postagem?", function () {window.location.href = href;} , function(){alertify.error("Cancelado")});     
            return false;
        });

});
