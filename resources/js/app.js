

//* Dropzone: libreria externa para subir imagenes

import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: 'Sube Aqui tu Imagen', //* Mensaje por defecto
    acceptedFiles: '.png, .jpg, .jpeg, .gif', //* Los formatos que aceptara
    addRemoveLinks: true, //* Permite eliminar la imagen antes de subirla
    dictRemoveFile: 'Borrar Archivo', //* Mensaje de borrado
    maxFiles: 1, //* Solo podras subir una imagen
    uploadMultiple: false,

    // init: function() {

    //     if(document.querySelector('[name="imagen"]').value.trim()) { //* Si hay algo en el value de imagen
    //         const imagenPublicada = {}
    //         imagenPublicada.size = 1234;
    //         imagenPublicada.name = document.querySelector('[name="imagen"]').value;

    //         this.options.addedfile.call( this, imagenPublicada );
    //         this.options.thumbnail.call( this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

    //         imagenPublicada.previewElement.classList.add("dz-success", "dz-complete");
    //     }

    // }

    init: function() {
        if(document.querySelector('[name="imagen"]').value.trim()){
            const fileName = document.querySelector('[name="imagen"]').value.trim();
            const file = {name: fileName, size: 1234, url:`/uploads/${fileName}`};  
            
            let mockfile = {
                name: file.name,
                size: file.size,
            };

            this.displayExistingFile(mockfile, file.url);
        }
    }
    
})

//* Envio exitoso, accedera a la respuesta del controlador
dropzone.on("success", function(file, response) {
    document.querySelector('[name="imagen"]').value = response.imagen;
});

//* Errores
dropzone.on("error", function(file, message) {
    console.log(message);
});

//* Al remover archivo
dropzone.on("removedfile", function(file, response) {
    document.querySelector('[name="imagen"]').value = "";
    console.log("Archivo Eliminado");
});