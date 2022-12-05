$("#bgu").click(function() {
    var v = validaru();
    if (v == true) {
        var url = "http://localhost/APPUsuarios/Usuarios/guardar_usuario.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#form_pagar").serialize(),
            success: function(data) {
                $.confirm({
                    'title': 'USUARIO GUARDADO',
                    'message': 'EL USUARIO SE GUARDÓ CORRECTAMENTE',
                    'buttons': {
                        'Aceptar': {
                            'class': 'gray',
                            'action': function() {
                                $("input[name!='codigo']").val("");
                                codigoact = $("input[name='codigo']").val();
                                codi = parseInt(codigoact.substring(3, 10)) + 1;
                                codi = "USU" + codi;
                                $("input[name='codigo']").val(codi);
                            }
                        }
                    }
                });

            }
        });
    }
});