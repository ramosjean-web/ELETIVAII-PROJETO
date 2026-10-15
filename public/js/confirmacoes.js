//
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("[data-confirmar]").forEach((elemento) => {
        elemento.addEventListener("click", (evento) => {
            const acao = elemento.dataset.confirmar;
            const mensagem = {
                incluir: "Deseja realmente incluir este registro?",
                alterar: "Deseja realmente salvar as alterações?",
                excluir: "Tem certeza de que deseja excluir este registro? Essa ação pode ser irreversível."
            };

            if (!mensagem[acao]) return;

            if (!window.confirm(mensagem[acao])) {
                evento.preventDefault();
                evento.stopImmediatePropagation();
            }
        });
    });

    document.querySelectorAll("form[data-confirmar]").forEach((formulario) => {
        formulario.addEventListener("submit", (evento) => {
            const acao = formulario.dataset.confirmar;

            const mensagem = {
                incluir: "Confirma a inclusão deste registro?",
                alterar: "Confirma as alterações realizadas?",
                excluir: "Confirma a exclusão deste registro?"
            };

            if (!mensagem[acao]) return;

            if (!window.confirm(mensagem[acao])) {
                evento.preventDefault();
            }
        });
    });
});
