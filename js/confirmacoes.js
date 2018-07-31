$(document).ready(function() {
        
        // CADASTRAR NOVA CATEGORIA
        $("#btn-cadcat").on("click", function () {
            alertify.confirm("Deseja criar uma nova categoria?", function () {$("#form-cadcat").submit();} , function(){alertify.error("Cancelado")});          
        });
        
        // DELETAR USUARIO
        $("#btn-deluser").click(function(){
            var href = this.href;
            alert(href);
            alertify.confirm("Deseja deletar este usuário?", function () {window.location.href = href;} , function(){alertify.error("Cancelado")});     
            return false;
        });

});
