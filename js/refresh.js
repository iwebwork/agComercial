//alert("deu");
$('#ajax_form').submit(function(e) {
    e.preventDefault();
    const texto = $('input[name="texto"]').val();
    const tipo1 = $('input[name="tipo1"]').val();
    const tipo2 = $('input[name="tipo2"]').val();
    $.ajax({
        url: 'eventos.php', // caminho para o script que vai processar os dados
        type: 'POST',
        data: {texto: texto, tipo1: tipo1, tipo2: tipo2},
        success: function(response) {
            alert("Funcionou");
        },
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
    return false;
});