function renderPage(page_id){

    //alterar URL do iframe, inserindo parametros via get p/ o ajax. :)
    var url = new URL(ajax_livro);
    url.searchParams.append("action", "refresh_page");
    url.searchParams.append("page_id", page_id);
    url.searchParams.append("livro_id", livro_id);
    livro_iframe.attr("src", url.href);

}

function updateRead(page_id){

    $.ajax({
        type: "POST",
        url: ajax_livro,
        data: {
            "action" : "statics",
            "page_id": current_page,
            "livro_id" : livro_id,
            "sala_id" : sala_id
        },
        success: function (response) {
            // Callback para tratamento de sucesso
            console.log("Requisição bem-sucedida:", response);
        },
        error: function (xhr, status, error) {
            // Callback para tratamento de erro
            console.error("Erro na requisição:", status, error);
        }
    });


}

//inicialização da pagina quando todos os elementos são renderizados
function initialize(){

    renderPage(current_page); //erro
    //lista eventos dos botões
    jQuery("#next-page").on("click", function(){

        if (current_page<livro_totalpage){
            current_page = current_page+1;
            renderPage( current_page);
        }else{
            Swal.fire({
                title: 'Ops!',
                text: 'Você chegou ao limite de páginas de leitura!',
                icon: 'error',
                confirmButtonText: 'OK'
                });
        }

    });

    jQuery("#back-page").on("click", function(){
        $pagina_inicial = current_page;

        if ( current_page < $pagina_inicial){
            current_page = current_page-1;
            renderPage( current_page);
        }else{
            Swal.fire({
                title: 'Ops!',
                text: 'Você chegou ao inicio da página do livro',
                icon: 'error',
                confirmButtonText: 'OK'
            })
        }

    });

    const intervalId = setInterval(updateRead, 1000);

}

initialize();