"use strict";

(function () {
    // oculta todos los contenidos
    var EDMS = document.querySelectorAll('.EdModalContent');
    [].forEach.call(EDMS, function (EDM) {
        EDM.style.display = "none";
    });
})();

function OpenEDModal(id, IdVentana, Varian, PreEd, EDClass) {
    var ID = document.getElementById(id);
    var Vmodal = void 0;
     Vmodal = (typeof Varian !== 'undefined' && Varian.length) > 1 ? Varian : typeof IdVentana !== 'undefined' && IdVentana.length > 1 ? document.getElementById(IdVentana).innerHTML : document.getElementById(ID.getAttribute('href')).innerHTML;
   // Vmodal = document.getElementById(ID.getAttribute('href')).innerHTML;

    if (typeof PreEd !== 'undefined' && PreEd.length > 1) {
        eval(PreEd + "();");
    }
    var NClass = typeof EDClass !== 'undefined' ? EDClass : "backED";

    printModal("<div class=\"" + NClass + "\"> " + Vmodal + "</div>");
}

function EDModal(id, IdVentana, Varian, PreEd, EDClass) {
    var ID = document.getElementById(id);
    ID.addEventListener('click', function (e) {
        e.preventDefault();
        OpenEDModal(id, IdVentana, Varian, PreEd, EDClass);
    });
}

/***********************************/

// Crear e imprimir modal
var printModal = function printModal(content) {
    var modalContentEl = createCustomElement('div', {
        id: "ed-modal-content",
        class: "ed-modal-content"
    }, [content]),
        modalEl = createCustomElement('div', {
        id: "ed-modal-container",
        class: "ed-modal-container"
    }, [modalContentEl]);

    // Imprimir modal
    document.body.appendChild(modalEl);
    var EDClose = document.getElementsByClassName("EdClose"); // Clase para cerrarlo.

    for (var i = 0; i < EDClose.length; i++) {
        EDClose[i].addEventListener("click", function () {
            removeModal();
        });
    }

    // Remover modal
    var removeModal = function removeModal() {
        return document.body.removeChild(modalEl);
    };

    // cerrar modal con click
    modalEl.addEventListener('click', function (e) {
        if (e.target === modalEl) removeModal();
    });

    // cerrar modal con escape
    var offCloseModalEsc = function offCloseModalEsc() {
        return removeEventListener('keyup', closeModalEsc);
    };
    var closeModalEsc = function closeModalEsc(e) {
        if (e.key === "Escape") {
            removeModal();
            offCloseModalEsc();
        }
    };
    addEventListener('keyup', closeModalEsc);
};