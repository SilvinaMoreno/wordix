<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */

/* Campas, Fernando Nicolas, FAI-3839, TUDW, nicolascampas1@gmail.com, nicocampas
/* Moreno, SIlvina Danisa, FAI-3596, TUDW, silvina.moreno@est.fi.uncoma.edu.com, SilvinaMoreno
/* Paredes, Paulina Sarai, FAI-4345, TUDW, pauly.pards@gmail.com, PaulyPAREDES
/* Bustos, Ignacio Sebastian, FAI-4320, TUDW, nachobustos@live.com.ar, ignacioBust


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

//FUNCION 1 CARGAR COLECCION PALABRAS

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras(){

    //array $coleccionPalabras (indexado almacena palabras)

    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "LEJOS", "CISNE", "MESSI", "QATAR", "HOJAS",
    ];

    return ($coleccionPalabras);
}

// *****FUNCIONES CREADAS POR NOSOTROS*****

// FUNCION 2 CARGAR PARTIDAS
/**
 * Inicializa una estructura de datos con ejemplos de Partidas y devuelve la colección de partidas descrita.
 * (Son partidas previamente cargadas para usar de ejemplo).
 * @return array
 */

 function cargarPartida(){

    //array $coleccionPartida (multidemensional ( indexado + asociativo) almacena datos de partidas)                                                     

    $coleccionPartida = [];// arreglo vacio
    $coleccionPartida [0]=["palabraWordix" => "LEJOS","jugador" => "silvina","intentos" => 6,"puntaje" => 0];// arreglo inicializado
    $coleccionPartida [1]=["palabraWordix" => "CISNE","jugador" => "paulina","intentos" => 4,"puntaje" => 13]; 
    $coleccionPartida [2]=["palabraWordix" => "MESSI","jugador" => "nicolas","intentos" => 2,"puntaje" => 17];
    $coleccionPartida [3]=["palabraWordix" => "QATAR","jugador" => "ignacio","intentos" => 2,"puntaje" => 17];
    $coleccionPartida [4]=["palabraWordix" => "HOJAS","jugador" => "silvina","intentos" => 6,"puntaje" => 0]; 
    $coleccionPartida [5]=["palabraWordix" => "FUEGO","jugador" => "nicolas","intentos" => 3,"puntaje" => 11];
    $coleccionPartida [6]=["palabraWordix" => "NAVES","jugador" => "ignacio","intentos" => 2,"puntaje" => 16];
    $coleccionPartida [7]=["palabraWordix" => "PIANO","jugador" => "paulina","intentos" => 3,"puntaje" => 9];
    $coleccionPartida [8]=["palabraWordix" => "PISOS","jugador" => "nicolas","intentos" => 6,"puntaje" => 12]; 
    $coleccionPartida [9]=["palabraWordix" => "QUESO","jugador" => "silvina","intentos" => 6,"puntaje" => 0];

    return ($coleccionPartida);  
}

//fin modulo

/**  
 * FUNCION 3 SELECCIONAR OPCION MENU: 
 * @return int
 */
function seleccionOpcion(){
    // int $numeroDeOpcion 
    echo "\n*********************MENÚ DE OPCIONES********************* \n";
    echo "\n1- Jugar al wordix con una palabra elegida.";
    echo "\n";
    echo "2- Jugar al wordix con una palabra aleatoria.";
    echo "\n";
    echo "3- Mostrar una partida.";
    echo "\n";
    echo "4- Mostrar la primer partida ganadora. ";
    echo "\n";
    echo "5- Mostrar resumen de jugador. ";
    echo "\n";
    echo "6- Mostrar listado de partida ordenado por un jugador y por palabra.";
    echo "\n";
    echo "7- Agregar una palabra de 5 letras a wordix. ";
    echo "\n";
    echo "8- Salir. ";
    echo "\n";
    echo "********************************************************** \n";
    
    $numeroDeOpcion = solicitarNumeroEntre(1,8);
    return $numeroDeOpcion;
}
// FUNCION 4 leerPalabra5letras (WORDIX).
// FUNCION 5 solicitarNumeroEntre (WORDIX).

//FUNCION 6 ENCONTRAR PARTIDA:
/**
* Devuelve los datos de una partida especificada por el usuario
* @param int $indicePartida
* @param array $coleccionPartida 
*/
    
function encontrarPartida ($indicePartida,$coleccionPartida){
    //int $cantPartidas
    //Boolean $corte

    $cantPartidas = count($coleccionPartida); //Cuenta la cantidad de partidas registradas.
    do{
        if($indicePartida == 0 || $indicePartida < $cantPartidas){ 
            echo "********************************************************** \n";
            echo "Partida WORDIX ". $indicePartida. ": palabra ". $coleccionPartida[$indicePartida]["palabraWordix"], "\n";
            echo "Jugador: ". $coleccionPartida[$indicePartida]["jugador"]. "\n";
            echo "Puntaje: ". $coleccionPartida[$indicePartida]["puntaje"]. " puntos \n";
            if($coleccionPartida[$indicePartida]["puntaje"] > 0){
                echo "Intento: Adivinó la palabra en ". $coleccionPartida[$indicePartida]["intentos"]. " intentos \n";
                $corte = true;
            }else{
                echo "Intento: No adivinó la palabra \n";
                $corte = true;
            }
            echo "********************************************************** \n";
        }else{
            $indicePartida = solicitarNumeroEntre(0,$cantPartidas); //Le pide al usuario ingresar un indice que corresponda con la cantidad de partidas
            $corte = false;
        }
    }while($corte == false);
}
//FIN MODULO.

// FUNCION 7 agregar una palabra nueva
// Cree una funcion para verificar si existe ya una palabra en la coleccion de palabras palabraExistente(); 

// FUNCION EXTRA
/**
 * Determina si una palabra existe en el arreglo de palabras
 * @param array $coleccionPalabras
 * @param string $palabra
 * @return boolean
 */

 function palabraExistente($coleccionPalabras, $palabra)
{ 
 // Int $valor, $cantPalabra
 // Boolean $existePalabra

 $valor= 0;
 $cantPalabra = Count($coleccionPalabras);// cuenta la cantidad de palabras
 $existePalabra  = false;

 while($valor < $cantPalabra && !$existePalabra){
    $existePalabra  = $coleccionPalabras[$valor] == $palabra;// compara si la palabra es igual a alguna del arreglo
    $valor++;
}
return $existePalabra;
}
//fin modulo.

// FUNCION 7 AGREGAR PALABRA
/**
 * Permite el ingreso de una nueva palabra y verifica que esa palabra no exista en la coleccion.
 * (llama a la función palabraExistente())
 * @param array $coleccionPalabras
 * @param string $palabra
 * @return array colección de palabras con la nueva palabra.
 */
function agregarPalabra($coleccionPalabras, $palabra)
{ 
 //Boolean $verificaPalabra, $verificaString

 do{
    $verificaString = esPalabra($palabra); //Verifica que sean letras (funcion en wordix).
    if($verificaString == false){
        echo "\n". escribirRojo("ERROR; Debe ingrersar letras")."\n";
        $palabra= leerPalabra5Letras(); //Exige que sea una palabra de 5 letras (funcion en wordix).
        $verificaPalabra = true; 
    }else{
        $verificaPalabra = palabraExistente($coleccionPalabras, $palabra); //Verifica que la palabra no exista
        if ($verificaPalabra == false) {
            array_push($coleccionPalabras,$palabra); //la funcion array_push sirve para agregar un elemento al final del array
            echo "\n". escribirVerde("Palabra añadida exitosamente")."\n";
        }else {
            echo escribirRojo("La palabra ya existe")."\n";
            $palabra = leerPalabra5Letras();
        }
    }
}while ($verificaPalabra == true);

return $coleccionPalabras; // Coleccion de palabra "actualizada".
}
//Fin modulo.

// FUNCION 8 SELECIONAR PARTIDA GANADORA
/**
* Obtiene índice de la primera partida ganadora.
* @param array $coleccionPartida
* @param string $nombreJugador
* @return int
*/
function partidaGanadora($coleccionPartida,$nombreJugador){
    //Int $cantPartidas, $i, $indice, $puntaje, $primerPuntaje
   
    $cantPartidas = count($coleccionPartida); //contador de palabras. 
    $puntaje = 0;
    $primerPuntaje = 0;
    $indice = -1;
    $i = 0; //número de ciclos e indice de partida 
   
    while ( $i < $cantPartidas && ($primerPuntaje == 0)) {
        if ( $coleccionPartida [ $i ]["jugador"] == $nombreJugador){
            if ( $coleccionPartida[ $i ]["puntaje"] > $puntaje ) {
                $primerPuntaje =  $coleccionPartida[ $i ]["puntaje"]; 
                $indice = $i;
            }elseif ( $coleccionPartida[ $i ]["puntaje"] == $puntaje) {
                $indice = -1;
            }
        }
        $i ++;
    }
    return  $indice ;
   }
//Fin módulo.

//FUNCION 9 RESUMEN JUGADOR
/**
* Obtiene todas las partidas jugadas por un usuario
* @param array $coleccionPartida
* @param string $nombreJugador
* @return array
*/
function obtenerPartidasJugador($coleccionPartida,$nombreJugador){
    //int $i, array  $estadisticaJugador
    //crear una colección sobre las jugadas del usuario
    $i = 0;
    $estadisticaJugador=[];// inicializo al arreglo en posicion "partidas" en 0 para luego verificar si éste encontró resultados o no
    $estadisticaJugador= ["partidas"=>0,"victorias"=>0,"puntaje"=>0,"victorias"=>0,"intento1"=>0,"intento2"=>0,"intento3"=>0,"intento4"=>0,"intento5"=>0,"intento6"=>0];
    while ($i < count($coleccionPartida)){
        if( $coleccionPartida[$i]["jugador"] == $nombreJugador){ // en caso de que el nombre exista:
            $estadisticaJugador["jugador"] = $coleccionPartida[$i]["jugador"];
            $estadisticaJugador["partidas"]= $estadisticaJugador["partidas"] + 1; //cada ves que encuentra el nombre dentro del array va a sumar 1
            $estadisticaJugador["puntaje"]= $estadisticaJugador["puntaje"] + $coleccionPartida[$i]["puntaje"];// suma puntaje acumulado. 
            if($coleccionPartida[$i]["puntaje"] > 0){ 
                $estadisticaJugador["victorias"] = $estadisticaJugador["victorias"] + 1; //suma 1 victoria segun el puntaje
            }   
                switch($coleccionPartida[$i]["intentos"]){ //segun el numero que me devuelve lo que haya en esa posicion: 
                    case 1:$estadisticaJugador["intento1"]++;
                    break;
                    case 2:$estadisticaJugador["intento2"]++;
                    break;
                    case 3:$estadisticaJugador["intento3"]++;
                    break;
                    case 4:$estadisticaJugador["intento4"]++;
                    break;
                    case 5:$estadisticaJugador["intento5"]++;
                    break;
                    case 6:$estadisticaJugador["intento6"] ++;
                    break; 
                }       
            }   
            $i = $i + 1;        
        }
        return $estadisticaJugador;
    }
//FIN Modulo.

//FUNCION 9 RESUMEN JUGADOR
/**
* Muestra en pantalla los datos de partidas de un jugador
* @param array $estadisticaJugador (arreglo "actualizado")
*/
function estadisticas($estadisticaJugador){
    //float $porcentajeVictorias
    //int $cant, $cantVictorias, $cantPartidas
    $porcentajeVictorias = 0.0;
    $cant = count($estadisticaJugador);
    $cantVictorias = $estadisticaJugador["victorias"];
    $cantPartidas = $estadisticaJugador["partidas"];
    echo "*************************************** \n";
    for ($i=0; $i<$cant; $i++){
        switch ($i){
            case 0: 
                echo "Jugador: ".$estadisticaJugador["jugador"]." \n";
                break;
            case 1: 
                echo "Partidas: ".$estadisticaJugador["partidas"]."\n";
                break;
            case 2: 
                echo "Puntaje Total: ".$estadisticaJugador["puntaje"]."\n";
                break;
            case 3: 
                echo "Victorias: ". $estadisticaJugador["victorias"]."\n";
                break;
            case 4: 
                $porcentajeVictorias = ($cantVictorias*100)/$cantPartidas;//calculo de porcentaje de victorias
                echo "Porcentaje Victorias: ".(int)($porcentajeVictorias)."% \n";
                break;
            case 5:
                echo "Adivinadas: \n";
                echo "     Intento 1: ". $estadisticaJugador["intento1"]. "\n";
                echo "     Intento 2: ". $estadisticaJugador["intento2"]. "\n";
                echo "     Intento 3: ". $estadisticaJugador["intento3"]. "\n";
                echo "     Intento 4: ". $estadisticaJugador["intento4"]. "\n";
                echo "     Intento 5: ". $estadisticaJugador["intento5"]. "\n";
                echo "     Intento 6: ". $estadisticaJugador["intento6"]. "\n";
				echo "\n";
                break;
        }
    }
    echo "*************************************** \n";
}
//Fin modulo.

// FUNCION 10 solicitarJugador
// FUNCION EXTRA: Es una funcion que contiene un array de usuarios
/**
* Inicializa un arreglo que contiene el nombre de los jugadores 
* @return array
*/function cargarUsuarios(){
    //array $coleccionUsuarios indexado, almacena nombres de usuarios                                  
    $coleccionUsuarios = ["ignacio","nicolas","paulina","silvina",];
    return $coleccionUsuarios;
}
//Fin Modulo.

// FUNCION 10 solicitarJugador
// FUNCION EXTRA: Es una funcion para agregar un nuevo usuario si es necesario.
/**
 * Comprueba si existe un usuario y permite agregar un nuevo usuario
 * @param string $nombre
 * @return string 
 */
    function agregarUsuario($nombre){
    //boolean $cortar
    //string $respuesta
    $cortar = true;
    echo "\nEl usuario ".$nombre." ya existe, ¿Desea continuar? [si/no] ";
    $respuesta = trim(fgets(STDIN));
do{
    if($respuesta == "si" ){
        $nombre = $nombre;
        $cortar = true;
    }else if($respuesta == "no" ){
        echo "\n". escribirRojo("Ingrese un nombre distinto");
        $nombre = solicitarJugador();
        $cortar = true;        
    }else if($respuesta != "si" || $respuesta != "no"){
        echo "\nIngrese una opcion válida, debe ingresar [si/no]";
        $respuesta = trim(fgets(STDIN));
        $cortar = false;
    }                         
}while($cortar == false);
return $nombre;

}
//Fin modulo.

// FUNCION 10 solicitarJugador
// FUNCION EXTRA: Es una funcion que determina si un usuario esta registrado o no.
/**
* Determina si un usuario existe en el arreglo de usuarios
* @param array $coleccionUsuarios
* @param string $nombre
* @return boolean
*/
    function usuarioExistente($coleccionUsuarios, $nombre){ 
    //int $valor, $cantPalabra
    //boolean $existeUsuario
    $valor= 0;
    $cantUsuarios = count($coleccionUsuarios);// cuenta la cantidad de Usuarios.
    $existeUsuario  = false;
    while ($valor < $cantUsuarios && !$existeUsuario) {
    $existeUsuario  = $coleccionUsuarios[$valor] == $nombre;// compara si el usuario es igual a alguno del arreglo $coleccionUsuarios.
    $valor++;
 }
 return $existeUsuario;
}
//Fin modulo.

// FUNCION 10 solicitarJugador:
/**
 * Solicita al usuario un nombre, la funcion retorna el nombre de usuario en minusculas.
 * El nombre debe iniciar con letras.
 * @return string
 */

    function solicitarJugador(){
    // string $nombre, $respuesta
    // boolean $esLetra, $usuarioExiste
    // array $coleccionUsuarios
    // int $i
    do{
        $coleccionUsuarios = cargarUsuarios();
        echo "\nEscribe un nombre de usuario (¡Debe iniciar con letras!): ";
        $nombre = trim(fgets(STDIN));
        $nombre = strtolower($nombre); //Esta funcion convierte un string a letra minuscula 
        $esLetra = ctype_alpha($nombre[0]); //Esta función ctype_alpha comprueba si los caracter de la variable son letras 
        if($esLetra == 1){
            $esLetra = true;
            $usuarioExiste = usuarioExistente($coleccionUsuarios, $nombre);
            if($usuarioExiste == false){
                array_push($coleccionUsuarios, $nombre);
                $nombre = $nombre;
            }else{
                $nombre = agregarUsuario($nombre);               
            }
         } else{
                $esLetra = false;
                echo "\n". escribirRojo("El nombre debe iniciar con letras...")."\n";
        }
     }while($esLetra == false);
     return $nombre;
     
    }
    
// Fin Modulo.

// FUNCION 11 PARTIDAS ORDENADAS segun palabras y segun nombres de jugador
// MODULO EXTRA: que compara los nombres y los ordena de menor a mayor
/**
 * @param string $a
 * @param string $b
 * @return int
 */
function comparaPorNombre($a, $b){
     if ($a["jugador"] == $b["jugador"]) {
         $orden = 0;
     } elseif ($a["jugador"] < $b["jugador"]) {
         $orden = -1;
     } else {
         $orden = 1;
     }
     return $orden;
 }
 //Fin Modulo.

// FUNCION 11 PARTIDAS ORDENADAS segun palabras y segun nombres de jugador
// MODULO EXTRA: que compara las palabras y las ordena de menor a mayor
/**
 * @param string $a
 * @param string $b
 * @return int
 */
function comparaPorPalabra($a, $b)
{
   if ($a["palabraWordix"] == $b["palabraWordix"] ) {
       $orden = 0;
   }elseif ($a["palabraWordix"] < $b["palabraWordix"] ) {
       $orden = -1;
   } else {
       $orden = 1;
   }
   return $orden;
}
//FIN MODULO COMPRAR PALABRAS

// FUNCION 11 PARTIDAS ORDENADAS segun palabras y segun nombres de jugador
 /**
 *Muestra la colección de partidas ordenada
 *por el nombre del jugador y por la palabra._
 * @param array $coleccionPartida
 */
function ordenarPartidas($coleccionPartida){
// al usar la funcion uasort debe ingresarse el array y los nombres de las funciones creada de comparacion.
echo "\n". escribirVerde("** Colección ordenadas alfabeticamente por palabra **")."\n";
uasort($coleccionPartida,"comparaPorPalabra");//Ordena los elementos usando una función de comparación definida por el usuario.. Mantiene la correlación de los índices
print_r($coleccionPartida); // Imprime en pantalla el arreglo
echo "\n". escribirVerde("** Colección ordenadas alfabeticamente por nombre **")."\n";
uasort($coleccionPartida,"comparaPorNombre");
print_r($coleccionPartida); // Imprime en pantalla el arreglo
}
//fin modulo.


//FUNCION EXTRA para jugar con una palabra elegida.
/**
* Verifica si un jugador ya jugó con la palabra seleccionada.
* @param string $nombreJugador
* @param array $coleccionPartida
* @param array $coleccionPalabras
* @param int $numeroPalabra
* @return boolean
*/
function palabraJugada($nombreJugador, $coleccionPartida, $coleccionPalabras, $numeroPalabra){
//boolean $fueUsada
//int $cantPartidas, $i 

        $fueUsada = false;
        $cantPartidas = count($coleccionPartida);
        $i = 0;
        while($i < $cantPartidas &&  $fueUsada == false){
            if(strcmp($nombreJugador, $coleccionPartida[$i]["jugador"]) == 0){//strcmp Compara string a nivel binario
                if(strcmp($coleccionPalabras[$numeroPalabra], $coleccionPartida[$i]["palabraWordix"]) == 0){
                    $fueUsada = true;
                }
            }
            $i++;
        }
        return $fueUsada;
    }
//Fin modulo.

//FUNCION EXTRA! (Volver al Menu)
function volverAlMenu (){
    // $opcionVolverMenu (cualquier tecla)
    echo "\n";
    echo escribirGris("** Presione cualquier tecla para volver al menu principal **");
    $opcionVolverMenu = trim(fgets(STDIN));
        if ($opcionVolverMenu == $opcionVolverMenu){
    }
    
}
//Fin Modulo.
    
/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:

//array $coleccionPartida, $coleccionPalabras, $coleccionUsuarios, $datosPartida, $resumenJugador
//int $cantPalabra, $cantPartidas, $opcionMenu, $numeroPalabra, $i, $numPartida, $partidaGanada, 
//boolean $validacion, 
//string $nombre, $nombreSolicitado, $mostrarPartida, $partidasOrdenadas, $palabra


//Inicialización de variables:

$coleccionPartida = cargarPartida();
$coleccionPalabras = cargarColeccionPalabras();
$coleccionUsuarios = cargarUsuarios();
$cantPalabra = count($coleccionPalabras)-1;
$cantPartidas = count($coleccionPartida)-1;

do {
    $opcionMenu = seleccionOpcion();
    switch ($opcionMenu) { //Es una funcion similar a If, pero compara una misma variable con distintos valores.
        
        case 1: //Jugar con una palabra elegida, se solicita nombre e indice de palabra.
            $nombre = solicitarJugador();
            do{
            $numeroPalabra = solicitarNumeroEntre(0, (count($coleccionPalabras)-1));
            $validacion = palabraJugada($nombre, $coleccionPartida, $coleccionPalabras, $numeroPalabra);
            if(!$validacion){
                $datosPartida= jugarWordix($coleccionPalabras[$numeroPalabra],$nombre);
                for($i=0; $i <= $cantPartidas;$i++){
                    if($i == $cantPartidas){
                       array_push($coleccionPartida,$datosPartida );  
                    }
                }
            } 
            else{
                echo escribirRojo("El jugador ya ha jugado con la palabra seleccionada"). ", puede intentar con otra \n";
                echo "\n";
            }
             }while($validacion);
    
             volverAlMenu();
                break;
        case 2: //Jugar con una palabra aleateoria, se solicita nombre y el programa elige una palabra no jugada y al azar. 
                $nombre = solicitarJugador();
                do{
                    $numeroPalabra = rand(0, (count($coleccionPalabras)-1));
                    $validacion = palabraJugada($nombre, $coleccionPartida, $coleccionPalabras, $numeroPalabra);
                    if(!$validacion){
                        $datosPartida= jugarWordix($coleccionPalabras[$numeroPalabra],$nombre);
                        for($i=0; $i <= $cantPartidas;$i++){
                            if($i == $cantPartidas){
                               array_push($coleccionPartida,$datosPartida );
                            }
                        }
                    } 
                    else{
                        $numeroPalabra = rand(0, (count($coleccionPalabras)-1));
                        $validacion = true;
                    }
                     }while($validacion);
                volverAlMenu();
                break;
        case 3: //Muestra una partida elegida por el usuario, se solicita el indice de la misma 
            $numPartida = solicitarNumeroEntre(0,count($coleccionPartida)-1);
            encontrarPartida($numPartida,$coleccionPartida);
            volverAlMenu();
            break;
        case 4: //Muestra la primer partida ganada por un usuario, se solicita el nombre del mismo
            $nombreSolicitado = solicitarJugador();
            $partidaGanada  = partidaGanadora($coleccionPartida, $nombreSolicitado); // llama a la funcion partidaGanada para que retorne el indice de la partida ganada
                if ($partidaGanada >= 0) {
                     $mostrarPartida = encontrarPartida($partidaGanada,$coleccionPartida);
                } else if ($partidaGanada == -1){
                    echo "\n El jugador ";
                    echo escribirAmarillo($nombreSolicitado);
                    echo escribirRojo("No ganó ninguna partida. ")."\n";
                }
            volverAlMenu();
            break;
        case 5: // Muestra un resumen con las estadisticas obtenidas por un jugador, se solicita el nombre del mismo
            $nombre = solicitarJugador();
            $resumenJugador = obtenerPartidasJugador($coleccionPartida, $nombre);
            if($resumenJugador["partidas"] != 0){
                estadisticas($resumenJugador);
            }
            else{ 
                echo "********************************************************** \n";
                echo escribirRojo("********** NO EXISTE REGISTRO DE ESTE JUGADOR **********")."\n";
                echo "********************************************************** \n";
            }
            volverAlMenu();
            break;
        case 6: // Muestra las partidas ordenadas alfabeticamente
            $partidasOrdenadas = ordenarPartidas( $coleccionPartida);
            print_r($partidasOrdenadas);
            volverAlMenu();
            break;
        case 7: //Agrega una palabra de 5 letras
            $palabra = leerPalabra5Letras();
            $coleccionPalabras = agregarPalabra($coleccionPalabras, $palabra);
            volverAlMenu();
            break;
        case 8: //SALIR
            echo escribirGris(" Saliendo...")."\n";
        break;

    }
} while ($opcionMenu !=8);
