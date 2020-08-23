const url = '../backend/api/usuarios.php';

function obtenerUsuarios(){
    axios({
        method: 'GET',
        url:url,
        responseType:'json'
    }).then(res=>{
        console.log(res);
    }).catch(error=>{
        console.error(error);
    });
}
obtenerUsuarios();



function guardarUsuario(){
    let usuario ={
        correo: document.getElementById('correo').value,
        contrasena: document.getElementById('contrasena').value
    };
    console.log('Usuario', usuario);
    axios({
        method: 'POST',
        url: url,
        responseType:'json',
        data:usuario

    }).then(res=>{
        console.log(res);
        obtenerUsuarios();

    }).catch(error=>{
        console.error(error);
    });

    
    
}

var twits = [
    {
    emisor:'CNN EN ESPAÑOL',
    mensaje: '¿Qué piensa el Dr. Fauci de la vacuna contra el #coronavirus de Rusia?'
}
]

/*function generarTwits() { 
 
    document.getElementById('twits').innerHTML = `<hi style="color:blue; ">Twits</h1>`;
    for (let i=0; i<40; i++) {
    document.getElementById('twits').innerHTML +=
    `<div style="color: white; float: left;">
    <p>
      CNN en Español ESPAÑOl  HOLA
      @CNNEE <br>
      · <br>
      6h
      ¿Qué piensa el Dr. Fauci de la vacuna contra el #coronavirus de Rusia? Esto es lo que dijo el principal experto en enfermedades infecciosas de Estados Unidos tras el anuncio de Putin sobre la vacuna Sputnik </p>
    <p> CNN en Español <br> Neymar celebra, Duván Zapata y Muriel se lamentan. PSG, a semifinales de la Champions. Atalanta eliminado</p>
    <p> CNN en Español <br> niño de 8 años fue arrestado y esposado después de que supuestamente habría golpeado a una profesora en una escuela de Key West, Florida, en 2018</p>
   </div>`;
    }
}
generarTwits(); */

function generarTwits(){
    axios({
        method: 'get',
        url: '../backend/api/twits.php',
        responseType:'json',
    }).then(res=>{

        let twit = res.data;
        for (let i = 0; i < twit.length; i++) {
            document.getElementById('twits').innerHTML +=
            `<div style="color: white; float: left;">
            
            
                <div>${twit[i].nombreUsuario} ${twit[i].apellidoUsuario}</div> <br>

                <p>¿Qué piensa el Dr. Fauci de la vacuna contra el #coronavirus de Rusia? Esto es lo que dijo el principal
                experto en enfermedades infecciosas de Estados Unidos tras el anuncio de Putin sobre la vacuna Sputnik </p>

            </div>`;  
        }
        
        console.log(res.data);

    }).catch(error=>{
        console.error(error);
    });

}

generarTwits();
