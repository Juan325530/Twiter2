const urlTweets = '../backend/api/twits.php';

// Lista de tweets
function generarTwits(){
    axios({
        method: 'GET',
        url: urlTweets,
        responseType:'json',
    }).then(res=>{
        console.log(res.data);
        
        let twit = res.data; //guardo los twits originales 
        let comparar = res.data;  // comparar para obtener los datos del autor orginal 
        for (let i = 0; i < twit.length; i++) {  //si es diferente de cero es un retwit
            if (twit[i].codigoTwitOriginal == 0) { // Si no fue retwiteado (fue escrito por el propio usuario) retwitear este tweet
                if (mySesVar.twitter_codigousuario == twit[i].codigoUsuario) { // Comparar si el autor del twit es quien inicio sesion, asi mostrar o no botones para borrar y actualizar
                    document.getElementById('twits').innerHTML +=
                    `<div class="text-white card mb-2 bg-tweet twit-card-id${twit[i].codigoTwit}">
                        <div class="card-header">
                            <img src="img/goku.jpg" class="rounded-circle mr-2" style="max-width: 3em;">
                            <a class="text-white" href="profile.php?idusuario=${twit[i].codigoUsuario}">${twit[i].nombreUsuario} ${twit[i].apellidoUsuario}</a>
                        </div>
                        <div class="card-body">
                            <div class="twit-contenido-id${twit[i].codigoTwit}">${twit[i].contenidoTwit}</div>
                        </div>
                        <div class="card-footer d-flex justify-content-around">
                            <button class="link-style" type="button" onclick="compartirTweet('${twit[i].contenidoTwit}', '${twit[i].codigoTwit}');">
                                <i class="fas fa-share mr-2" aria-hidden="true"></i>
                                <span class="twit-cantidadReTwits-id${twit[i].codigoTwit}">${twit[i].cantidadReTwits} Retweets</span>
                            </button>
                            <button class="link-style twit-modalEditar-id${twit[i].codigoTwit}" type="button" onclick="modalEditarTweet('${twit[i].contenidoTwit}', '${twit[i].codigoTwit}');">
                                <i class="fas fa-edit mr-2" aria-hidden="true"></i>
                                <span>Editar Tweet</span>
                            </button>
                            <button class="link-style" type="button" onclick="eliminarTweet('${twit[i].codigoTwit}');">
                                <i class="fas fa-trash mr-2" aria-hidden="true"></i>
                                <span>Borrar Tweet</span>
                            </button>
                        </div>
                    </div>`;
                } else { // Quien inicio sesion no es el autor, por tanto no puede editar ni borrar estos twits
                    document.getElementById('twits').innerHTML +=
                    `<div class="text-white card mb-2 bg-tweet twit-card-id${twit[i].codigoTwit}">
                        <div class="card-header">
                            <img src="img/goku.jpg" class="rounded-circle mr-2" style="max-width: 3em;">
                            <a class="text-white" href="profile.php?idusuario=${twit[i].codigoUsuario}">${twit[i].nombreUsuario} ${twit[i].apellidoUsuario}</a>
                        </div>
                        <div class="card-body">
                            <div class="twit-contenido-id${twit[i].codigoTwit}">${twit[i].contenidoTwit}</div>
                            <button class="link-style" type="button" onclick="compartirTweet('${twit[i].contenidoTwit}', '${twit[i].codigoTwit}');">
                                <i class="fas fa-share mr-2" aria-hidden="true"></i>
                                <span class="twit-cantidadReTwits-id${twit[i].codigoTwit}">${twit[i].cantidadReTwits} Retweets</span>
                            </button>
                        </div>
                    </div>`;
                }
            } else { // Si la publicacion fue retwiteada (alguien mas lo escribio), entonces compartir ese tweet
                for (let j = 0; j < comparar.length; j++) {
                    if (twit[i].codigoTwitOriginal == comparar[j].codigoTwit) {
                        if (mySesVar.twitter_codigousuario == comparar[j].codigoUsuario) { // Comparar si el autor del twit es quien inicio sesion, asi mostrar o no botones para borrar y actualizar
                            document.getElementById('twits').innerHTML +=
                            `<div class="text-white card mb-2 bg-tweet twit-card-id${twit[i].codigoTwitOriginal}">
                                <div class="card-header">
                                    <img src="img/goku.jpg" class="rounded-circle mr-2" style="max-width: 3em;">
                                    <a class="text-white" href="profile.php?idusuario=${twit[i].codigoUsuario}">${twit[i].nombreUsuario} ${twit[i].apellidoUsuario}</a>
                                </div>
                                <div class="card-body">
                                    <i>Retwitteado de <a href="profile.php?idusuario=${comparar[j].codigoUsuario}">«${comparar[j].nombreUsuario} ${comparar[j].apellidoUsuario}»</a></i>
                                    <div class="twit-contenido-id${twit[i].codigoTwitOriginal}">${twit[i].contenidoTwit}</div>
                                    <div class="d-flex justify-content-around">
                                        <button class="link-style" type="button" onclick="compartirTweet('${twit[i].contenidoTwit}', '${twit[i].codigoTwitOriginal}');">
                                            <i class="fas fa-share mr-2" aria-hidden="true"></i>
                                            <span class="twit-cantidadReTwits-id${twit[i].codigoTwitOriginal}">${comparar[j].cantidadReTwits} Retweets</span>  
                                        </button>
                                        <button class="link-style twit-modalEditar-id${twit[i].codigoTwitOriginal}" type="button" onclick="modalEditarTweet('${twit[i].contenidoTwit}', '${twit[i].codigoTwitOriginal}');">
                                            <i class="fas fa-edit mr-2" aria-hidden="true"></i>
                                            <span>Editar Tweet</span>
                                        </button>
                                        <button class="link-style" type="button" onclick="eliminarTweet('${twit[i].codigoTwitOriginal}');">
                                            <i class="fas fa-trash mr-2" aria-hidden="true"></i>
                                            <span>Borrar Tweet</span>
                                        </button>
                                    </div>
                                </div>
                            </div>`;
                        } else { // Quien inicio sesion no es el autor, por tanto no puede editar ni borrar estos twits
                            document.getElementById('twits').innerHTML +=
                            `<div class="text-white card mb-2 bg-tweet twit-card-id${twit[i].codigoTwitOriginal}">
                                <div class="card-header">
                                    <img src="img/goku.jpg" class="rounded-circle mr-2" style="max-width: 3em;">
                                    <a class="text-white" href="profile.php?idusuario=${twit[i].codigoUsuario}">${twit[i].nombreUsuario} ${twit[i].apellidoUsuario}</a>
                                </div>
                                <div class="card-body">
                                    <i>Retwitteado de <a href="profile.php?idusuario=${comparar[j].codigoUsuario}">«${comparar[j].nombreUsuario} ${comparar[j].apellidoUsuario}»</a></i>
                                    <div class="twit-contenido-id${twit[i].codigoTwitOriginal}">${twit[i].contenidoTwit}</div>
                                    <button class="link-style" type="button" onclick="compartirTweet('${twit[i].contenidoTwit}', '${twit[i].codigoTwitOriginal}');">
                                        <i class="fas fa-share mr-2" aria-hidden="true"></i>
                                        <span class="twit-cantidadReTwits-id${twit[i].codigoTwitOriginal}">${comparar[j].cantidadReTwits} Retweets</span>  
                                    </button>
                                </div>
                            </div>`;
                        }
                    }
                }
            }
        }
    }).catch(error=>{
        console.error(error);
    });

}

generarTwits();

function guardarTwit() {
    document.getElementById("postTwit").disabled = true; //inabilitar boton
    let validacionTexto = validarCampoVacio("textoTwit");
    if (validacionTexto && document.getElementById("textoTwit").value.length <= 280) { //el texto tiene que ser menor de 280 carateres 
        // "codigoTwit"         // clase PHP generar
        // "codigoUsuario"      // api PHP session
        // "contenidoTwit"      // twit publicado ***
        // "imagen"             // ""             ***
        // "cantidadReTwits"    // 0
        // "codigoTwitOriginal" // 0
        let twitParaGuardar ={
            contenidoTwit: document.getElementById("textoTwit").value,
            imagen: "",
            cantidadReTwits: 0,
            codigoTwitOriginal: 0
        };
        console.log('Twit a publicar', twitParaGuardar);
        
        axios({
            method: 'POST',
            url: urlTweets,
            responseType:'json',
            data:twitParaGuardar
        }).then(res=>{
            console.log(res); // Se regresa el twit recien guardado y se imprime en pantalla
            document.getElementById("postTwit").disabled = false;
            $("#formTweet").modal('hide');
            document.getElementById("textoTwit").value = '';
            document.getElementById("textoTwit").classList.remove("is-valid");
            if ($("#twits").length > 0) {
                document.getElementById("twits").innerHTML += `
                <div class="text-white card mb-2 bg-tweet twit-card-id${res.data.codigoTwit}">
                    <div class="card-header">
                        <img src="img/goku.jpg" class="rounded-circle mr-2" style="max-width: 3em;">
                        <a class="text-white" href="profile.php?idusuario=${mySesVar.twitter_codigousuario}">${mySesVar.twitter_nombre+" "+mySesVar.twitter_apellido}</a>
                    </div>
                    <div class="card-body">
                        <div class="twit-contenido-id${res.data.codigoTwit}">${res.data.contenidoTwit}</div>
                    </div>
                    <div class="card-footer d-flex justify-content-around">
                        <button class="link-style" type="button" onclick="compartirTweet('${res.data.contenidoTwit}', '${res.data.codigoTwit}');">
                            <i class="fas fa-share mr-2" aria-hidden="true"></i>
                            <span class="twit-cantidadReTwits-id${res.data.codigoTwit}>0 Retweets</span>
                        </button>
                        <button class="link-style twit-modalEditar-id${res.data.codigoTwit}" type="button" onclick="modalEditarTweet('${res.data.contenidoTwit}', '${res.data.codigoTwit}');">
                            <i class="fas fa-edit mr-2" aria-hidden="true"></i>
                            <span>Editar Tweet</span>
                        </button>
                        <button class="link-style" type="button" onclick="eliminarTweet('${res.data.codigoTwit}');">
                            <i class="fas fa-trash mr-2" aria-hidden="true"></i>
                            <span>Borrar Tweet</span>
                        </button>
                    </div>
                </div>
                `;
            }
            if ($("#profile-twits").length > 0) {
                document.getElementById("profile-twits").innerHTML += `
                <div class="text-white card mb-2 bg-tweet twit-card-id${res.data.codigoTwit}">
                    <div class="card-header">
                        <img src="img/goku.jpg" class="rounded-circle mr-2" style="max-width: 3em;">
                        <a class="text-white" href="profile.php?idusuario=${mySesVar.twitter_codigousuario}">${mySesVar.twitter_nombre+" "+mySesVar.twitter_apellido}</a>
                    </div>
                    <div class="card-body">
                        <div class="twit-contenido-id${res.data.codigoTwit}">${res.data.contenidoTwit}</div>
                    </div>
                    <div class="card-footer d-flex justify-content-around">
                        <button class="link-style" type="button" onclick="compartirTweet('${res.data.contenidoTwit}', '${res.data.codigoTwit}');">
                            <i class="fas fa-share mr-2" aria-hidden="true"></i>
                            <span class="twit-cantidadReTwits-id${res.data.codigoTwit}>0 Retweets</span>
                        </button>
                        <button class="link-style twit-modalEditar-id${res.data.codigoTwit}" type="button" onclick="modalEditarTweet('${res.data.contenidoTwit}', '${res.data.codigoTwit}');">
                            <i class="fas fa-edit mr-2" aria-hidden="true"></i>
                            <span>Editar Tweet</span>
                        </button>
                        <button class="link-style" type="button" onclick="eliminarTweet('${res.data.codigoTwit}');">
                            <i class="fas fa-trash mr-2" aria-hidden="true"></i>
                            <span>Borrar Tweet</span>
                        </button>
                    </div>
                </div>
                `;
            }

        }).catch(error=>{
            console.error(error);
            document.getElementById("postTwit").disabled = false;
        });
    } else {
        addInvalid("textoTwit");
        document.getElementById("postTwit").disabled = false;
    }
    
}

function compartirTweet(texto, idTwit) {
    // "codigoTwit"         // clase PHP generar
    // "codigoUsuario"      // api PHP session
    // "contenidoTwit"      // twit publicado ***
    // "imagen"             // ""             ***
    // "cantidadReTwits"    // clase PHP++
    // "codigoTwitOriginal" // twit publicado ***
    let twitParaCompartir ={
        contenidoTwit: texto,
        imagen: "",
        cantidadReTwits: 0,
        codigoTwitOriginal: idTwit
    };
    console.log('Twit a compartir', twitParaCompartir);
    axios({
        method: 'POST',
        url: urlTweets,
        responseType:'json',
        data:twitParaCompartir
    }).then(res=>{
        console.log(res); // Se devuelve en consola todos los tweets incluyendo el nuevo, abajo se imprimen en html con la funcion generarTwits()
        // Modificando todas las ocurrencias a dicha publicacion. Reflejar el aumento de retwits
        let updateRetwitCounter = document.getElementsByClassName("twit-cantidadReTwits-id"+idTwit);
        for (let i = 0; i < updateRetwitCounter.length; i++) {
            updateRetwitCounter[i].innerHTML = res.data.autorCantidadRetwits + " Retweets";
        }
        // Agregar en pantalla nuevo retwit. Dependiendo la pagina en que se inserta (#twits para home.php, #profile-twits para profile.php)
        let divTwits = "";
        if ($("#twits").length > 0) {
            divTwits = "twits";
        }
        if ($("#profile-twits").length > 0) {
            divTwits = "profile-twits";
        }
        // Validar si soy el autor original de ese twit, asi agregar o no botones para editar y borrar
        if (mySesVar.twitter_codigousuario == res.data.autorCodigo) {
            document.getElementById(divTwits).innerHTML += `
            <div class="text-white card mb-2 bg-tweet twit-card-id${res.data.codigoTwit}">
                <div class="card-header">
                    <img src="img/goku.jpg" class="rounded-circle mr-2" style="max-width: 3em;">
                    <a class="text-white" href="profile.php?idusuario=${mySesVar.twitter_codigousuario}">${mySesVar.twitter_nombre+" "+mySesVar.twitter_apellido}</a>
                </div>
                <div class="card-body">
                    <i>Retwitteado de <a href="profile.php?idusuario=${res.data.autorCodigo}">«${res.data.autorNombre} ${res.data.autorApellido}»</a></i>
                    <div class="twit-contenido-id${idTwit}">${texto}</div>
                    <div class="d-flex justify-content-around">
                        <button class="link-style" type="button" onclick="compartirTweet('${texto}', '${idTwit}');">
                            <i class="fas fa-share mr-2" aria-hidden="true"></i>
                            <span class="twit-cantidadReTwits-id${idTwit}">${res.data.autorCantidadRetwits} Retweets</span>
                        </button>
                        <button class="link-style twit-modalEditar-id${idTwit}" type="button" onclick="modalEditarTweet('${texto}', '${idTwit}');">
                            <i class="fas fa-edit mr-2" aria-hidden="true"></i>
                            <span>Editar Tweet</span>
                        </button>
                        <button class="link-style" type="button" onclick="eliminarTweet('${idTwit}');">
                            <i class="fas fa-trash mr-2" aria-hidden="true"></i>
                            <span>Borrar Tweet</span>
                        </button>
                    </div>
                </div>
            </div>`;
        } else {
            document.getElementById(divTwits).innerHTML += `
            <div class="text-white card mb-2 bg-tweet twit-card-id${res.data.codigoTwit}">
                <div class="card-header">
                    <img src="img/goku.jpg" class="rounded-circle mr-2" style="max-width: 3em;">
                    <a class="text-white" href="profile.php?idusuario=${mySesVar.twitter_codigousuario}">${mySesVar.twitter_nombre+" "+mySesVar.twitter_apellido}</a>
                </div>
                <div class="card-body">
                    <i>Retwitteado de <a href="profile.php?idusuario=${res.data.autorCodigo}">«${res.data.autorNombre} ${res.data.autorApellido}»</a></i>
                    <div class="twit-contenido-id${idTwit}">${texto}</div>
                    <div class="d-flex justify-content-around">
                        <button class="link-style" type="button" onclick="compartirTweet('${texto}', '${idTwit}');">
                            <i class="fas fa-share mr-2" aria-hidden="true"></i>
                            <span class="twit-cantidadReTwits-id${idTwit}">${res.data.autorCantidadRetwits} Retweets</span>
                        </button>
                    </div>
                </div>
            </div>`;
        }
    }).catch(error=>{
        console.error(error);
    });
}

 function modalEditarTweet(contenidotweetEditar, idtweetEditar) {
    $("#edit").html(`<button id="edit-btn-Twit" type="button" onclick="actualizarTwit('${idtweetEditar}')" class="btn btn-primary btn-lg col-sm-10 blue-tw-btn">Actualizar Tweet</button>`);
    $("#textoTwitEditar").val(contenidotweetEditar);
    $("#EditTweet").modal("show");
}

function eliminarTweet(idTwit) {
   let twitParaBorrar ={
       codigoTwit: idTwit
   };
   console.log('Twit a borrar', twitParaBorrar);
   
   axios({
       method: 'DELETE',
       url: urlTweets,
       responseType:'json',
       data:twitParaBorrar

   }).then(res=>{
       console.log(res); // Se devuelve en consola el tweet recien eliminado
       let twitsToDelete = document.getElementsByClassName("twit-card-id"+idTwit); // Obtener todas las referencias al tweet borrado
       for (let i = 0; i < twitsToDelete.length; i++) {
           twitsToDelete[i].classList.add("d-none"); // Ocultar el tweet eliminado y las referencias
           twitsToDelete[i].innerHTML = ""; // Eliminar en pantalla el contenido del tweet
       }

   }).catch(error=>{
       console.error(error);
   });
}

function actualizarTwit(idTwit) {
    document.getElementById("edit-btn-Twit").disabled = true; // inhabilitar boton
    let validacionTexto = validarCampoVacio("textoTwitEditar");
    if (validacionTexto && document.getElementById("textoTwitEditar").value.length <= 280) {
        let twitParaActualizar ={
            codigoTwit: idTwit,
            nuevoContenido: document.getElementById("textoTwitEditar").value
        };
        console.log('Twit a actualizar', twitParaActualizar);
        axios({
            method: 'PUT',
            url: urlTweets,
            responseType:'json',
            data:twitParaActualizar
        }).then(res=>{
            console.log(res); // Se devuelve en consola el tweet recien actualizado
            let twitsToUpdate = document.getElementsByClassName("twit-contenido-id"+idTwit); // Obtener todas referencias al contenido del tweet actualizado
            let modalBtnToUpdate = document.getElementsByClassName("twit-modalEditar-id"+idTwit) // Obtener todas las referencias a los botones que abren la ventana modal para editar dicho contenido
            for (let i = 0; i < twitsToUpdate.length; i++) {
                twitsToUpdate[i].innerHTML = document.getElementById("textoTwitEditar").value; // Actualizar el contenido del tweet en todas sus ocurrencias
                modalBtnToUpdate[i].setAttribute("onclick", "modalEditarTweet('"+document.getElementById("textoTwitEditar").value+"', '"+idTwit+"')")
            }
            for (let index = 0; index < modalBtnToUpdate.length; index++) {
                modalBtnToUpdate[index].setAttribute("onclick", "modalEditarTweet('"+document.getElementById("textoTwitEditar").value+"', '"+idTwit+"')") // Actualizar el boton para abrir el modal, asi referencia el nuevo contenido
                
            }
            $("#EditTweet").modal('hide'); // Ocultar la ventana modal
            document.getElementById("textoTwitEditar").value = ''; // Limpiar el contenido del textarea (donde se escribe el contenido del tweet)
            document.getElementById("textoTwitEditar").classList.remove("is-valid"); // Remover la clase valida al textarea
            document.getElementById("edit-btn-Twit").disabled = false; // Habilitar de nuevo el boton
        }).catch(error=>{
            console.error(error);
        });
    }
    else {
        addInvalid("textoTwitEditar");
        document.getElementById("edit-btn-Twit").disabled = false;
    }
}