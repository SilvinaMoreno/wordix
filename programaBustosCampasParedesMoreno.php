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

    //array $coleccionPalabras indexado almacena palabras

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
 *Inicializa una estructura de datos con ejemplos de Partidas y devuelve
 *la colección de partidas descrita.
 * @return array
 */

 function cargarPartida(){

    //array $coleccionPartida( multidemensional ( indexado + asociativo) almacena datos de partidas)                                                     

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
 * funcion Menú de Opciones 
 * @return int
 */
function seleccionOpcion(){
    // int $numeroDeOpcion 
    echo "*********************MENÚ DE OPCIONES********************* \n";
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

// FUNCION 7 agregar una nueva palabra
//cree una funcion para verificar si existe ya una palabra en la coleccion de palabras palabraExistente(); 

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

//fin modulo

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
    $verificaString = esPalabra($palabra); //Verifica que sean letras
    if($verificaString == false){
        echo "\nERROR; Debe ingrersar letras.\n";
        $palabra= leerPalabra5Letras(); //Exige que sea una palabra de 5 letras
        $verificaPalabra = true; 
    }else{
        $verificaPalabra = palabraExistente($coleccionPalabras, $palabra); //Verifica que la palabra no exista
        if ($verificaPalabra == false) {
            array_push($coleccionPalabras,$palabra); //la funcion array_push sirve para agregar un elemento al final del array
            echo "\nPalabra añadida exitosamente";
        }else {
            echo "La palabra ya existe \n";
            $palabra = leerPalabra5Letras();
        }
    }
}while ($verificaPalabra == true);

return $coleccionPalabras;

}

//fin modulo

// FUNCION 8 SELECIONAR PARTIDA GANADORA
/**
* Obtiene índice de la primera partida ganadora.
* @param array $coleccionPartida
* @param string $nombreJugador
* @return int
*/
function partidaGanadora($coleccionPartida,$nombreJugador){
    //Int $cantPartidas, $i, $indice,$puntaje
   
    $cantPartidas = count($coleccionPartida)-1; //contador 
    $puntaje = 0;
    $primerPuntaje = 0;
    $i = 0; //número de ciclos e indice de partida 
   
    while ( $i <= $cantPartidas && ($primerPuntaje == 0)) {
        if ( $coleccionPartida [ $i ]["jugador"] == $nombreJugador){
            if ( $coleccionPartida[ $i ]["puntaje"] > $puntaje ) {
                $primerPuntaje =  $coleccionPartida[ $i ]["puntaje"]; 
                $indice = $i;
            }else {
                $indice = -1;
            }
        }
        $i ++;
    }
    return  $indice ;
   }

//fin módulo

//FUNCION 9 RESUMEN JUGADOR
//Se creo una funcion que filtra en un array los datos de un jugador y lo retorna

    /**
     * Obtiene todas las partidas jugadas por un usuario
     * @param array $coleccionPartida
     * @param string $nombreJugador
     * @return array
     */
    function obtenerPartidasJugador($coleccionPartida,$nombreJugador){
        //array $partidasDelJugador

        $partidasDelJugador = []; //Guarda los datos de las partidas del jugador
        $partidasDelJugador = array_filter ($coleccionPartida,function($partida)use($nombreJugador){
            return ($partida["jugador"] == $nombreJugador);
        }
    ); //Fin array_filter; Filtra los datos especificados de un array. 
    return $partidasDelJugador;
}

//FIN Modulo

//FUNCION 9 RESUMEN JUGADOR
/**
* Muestra en pantalla los datos de partidas de un jugador y los retorna
* @param array $coleccionPartida
* @param string $nombreJugador
*/

function resumenJugador($coleccionPartida,$nombreJugador){
    //array $estadisticasJugador, $partidasDelJugador
    
    $coleccionUsuarios = cargarUsuarios();
    $nombreJugador = strtolower($nombreJugador);
    $existe = usuarioExistente($coleccionUsuarios, $nombreJugador);
    if($existe == true){
    $estadisticasJugador = []; //arreglo vacío
    $estadisticasJugador = ["jugador"=>$nombreJugador,"partidas"=>0,"puntajeTotal"=>0,
    "victorias"=>0,"porcentajeVictoria"=>0,"intento1"=>0,"intento2"=>0,"intento3"=>0,"intento4"=>0,"intento5"=>0,"intento6"=>0]; //Arreglo inicializado en cero
    $partidasDelJugador = obtenerPartidasJugador($coleccionPartida,$nombreJugador);
    $estadisticasJugador ["partidas"] = count($partidasDelJugador);
    foreach($partidasDelJugador as $partida){
        $estadisticasJugador["puntajeTotal"] = $estadisticasJugador["puntajeTotal"] + $partida["puntaje"]; //Acumulador de puntaje TOTAL
        if($partida["puntaje"] > 0){
            $estadisticasJugador["victorias"]++; //Contador de victorias
        }
        switch ($partida["intentos"]){
            case 1: 
                $estadisticasJugador["intento1"]++;
                break;
            case 2: 
                $estadisticasJugador["intento2"]++;
                break;
            case 3: 
                $estadisticasJugador["intento3"]++;
                break;
            case 4: 
                $estadisticasJugador["intento4"]++;
                break;
            case 5: 
                $estadisticasJugador["intento5"]++;
                break;
            case 6: 
                $estadisticasJugador["intento6"]++;
                break;
        }
    }
    if($estadisticasJugador["victorias"] > 0){
        $estadisticasJugador["porcentajeVictoria"] = (int)(($estadisticasJugador["victorias"]*100)/($estadisticasJugador["partidas"])); //calculo de porcentaje de victorias
    }else{
        $estadisticasJugador["porcentajeVictoria"] = $estadisticasJugador["porcentajeVictoria"]  ; 
    }
    echo "********************************************************** \n";
    echo "Jugador: ". $estadisticasJugador["jugador"]. "\n";
    echo "Partidas: ". $estadisticasJugador["partidas"]. "\n";
    echo "Puntaje Total: ". $estadisticasJugador["puntajeTotal"]. "\n";
    echo "Victorias: " . $estadisticasJugador["victorias"]. "\n";
    echo "Porcentaje Victorias: ". $estadisticasJugador["porcentajeVictoria"]. " %\n";
    echo "Adivinadas: \n";
    echo "     Intento 1: ". $estadisticasJugador["intento1"]. "\n";
    echo "     Intento 2: ". $estadisticasJugador["intento2"]. "\n";
    echo "     Intento 3: ". $estadisticasJugador["intento3"]. "\n";
    echo "     Intento 4: ". $estadisticasJugador["intento4"]. "\n";
    echo "     Intento 5: ". $estadisticasJugador["intento5"]. "\n";
    echo "     Intento 6: ". $estadisticasJugador["intento6"]. "\n";
    echo "********************************************************** \n";
}else{
    echo "********************************************************** \n";
    echo "*********** NO EXISTE REGISTRO DE ESTE JUGADOR *********** \n";
    echo "********************************************************** \n";
}
    }

//Fin modulo

// FUNCION 10 solicitarJugador
//Se creo una funcion que contiene un array de usuarios


 /**
 * Inicializa un arreglo que contiene el nombre de los jugadores 
 * @return array
 */function cargarUsuarios(){

    //array $coleccionUsuarios indexado, almacena nombres de usuarios                                                     

    $coleccionUsuarios = ["ignacio","nicolas","paulina","silvina",];
    
    return $coleccionUsuarios;

 }

 //se creo una funcion para agregar un nuevo usuario si es necesario

/**
 * Comprueba si existe un usuario y permite agregar un nuevo usuario
 * @param string $nombre
 * @return string 
 */

function agregarUsuario($nombre){
    //Boolean $cortar
    //strin $respuesta

    $cortar = true;
    echo "\nEl usuario '".$nombre."' ya existe, ¿Desea continuar? [s/n] ";
    $respuesta = trim(fgets(STDIN));
do{
    if($respuesta == "s" ){
        $nombre = $nombre;
        $cortar = true;
    }else if($respuesta == "n" ){
        echo "\nIngrese un nombre distinto";
        solicitarJugador();
        $cortar = true;
    }else if($respuesta != "s" || $respuesta != "n"){
        echo "\nIngrese una opcion válida, debe ingresar [s/n]";
        $respuesta = trim(fgets(STDIN));
        $cortar = false;
    }                         
}while($cortar == false);

return $nombre;

 }

//Se creo una funcion que determina si un usuario esta registrado o no

 /**
 * Determina si un usuario existe en el arreglo de usuarios
 * @param array $coleccionUsuarios
 * @param string $nombre
 * @return boolean
 */
function usuarioExistente($coleccionUsuarios, $nombre)
{ 
 // Int $valor, $cantPalabra
 // Boolean $existePalabra

 $valor= 0;
 $cantUsuarios = Count($coleccionUsuarios);// cuenta la cantidad de palabras
 $existeUsuario  = false;

 while ($valor < $cantUsuarios && !$existeUsuario) {
    $existeUsuario  = $coleccionUsuarios[$valor] == $nombre;// compara si la palabra es igual a alguna del arreglo
    $valor++;
 }
 return $existeUsuario;
}
//fin modulo

 /** MODULO EXTRA! (Solicitar Jugador Existente)
 * Solicita al usuario un nombre, la funcion retorna el nombre de usuario en minusculas.
 * El nombre debe iniciar con letras.
 * Si el usuario no existe, retorta el cartel de "NO existe el jugador".
 * @return string
 */
function solicitarJugadorExistente(){
    do{
        $coleccionUsuarios = cargarUsuarios();
        echo "\nEscribe un nombre de usuario (¡Debe iniciar con letras!): ";
        $nombre = trim(fgets(STDIN));
        $nombre = strtolower($nombre); //Esta funcion convierte un string a letra minuscula
        $usuarioExistente = usuarioExistente($coleccionUsuarios, $nombre);  
        if($usuarioExistente == true){
            $nombre = $nombre;
        }else{
            echo "\nNO existe el jugador. ";
        }
     }while($usuarioExistente == false);
     return $nombre;
    }
    
//FIN MODULO

/**
 * Solicita al usuario un nombre, la funcion retorna el nombre de usuario en minusculas.
 * El nombre debe iniciar con letras.
 * @return string
 */

function solicitarJugador(){
    // string $nombre, $respuesta
    // boolean $esLetra
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
            if($usuarioExiste == true){
                agregarUsuario($nombre);
                $nombre = $nombre;
            }else{
                echo "\nUsuario Agregado Exitosamente ";
                array_push($coleccionUsuarios, $nombre);
            }
         } else{
                $esLetra = false;
                echo "\nEl nombre debe iniciar con letras...\n";
        }
     }while($esLetra == false);
     return $nombre;
    }
    
//FIN MODULO


// FUNCION 11 PARTIDAS ORDENADAS segun palabras y segun nombres de jugador
 /**
 *Muestra la colección de partidas ordenada
 *por el nombre del jugador y por la palabra.
 * @param array $coleccionPartida
 */

function ordenarPartidas($coleccionPartida){

    // SUB Modulo que compara las palabras y las ordena de menor a mayor
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
 
 // SUB Modulo que compara los nombres y los ordena de menor a mayor
 function comparaPorNombre($a, $b)
 {
     if ($a["jugador"] == $b["jugador"]) {
         $orden = 0;
     } elseif ($a["jugador"] < $b["jugador"]) {
         $orden = -1;
     } else {
         $orden = 1;
     }
     return $orden;
 }

    // al usar la funcion uasort debe ingresarse el array y los nombres de las funciones creada de comparacion.
     echo "\n **Colección ordenadas alfabeticamente por palabra*** \n";
     uasort($coleccionPartida,"comparaPorPalabra");//Ordena los elementos usando una función de comparación definida por el usuario.. Mantiene la correlación de los índices
     print_r($coleccionPartida); // Imprime en pantalla el arreglo
     echo "\n **Colección ordenadas alfabeticamente por nombre*** \n";
     uasort($coleccionPartida,"comparaPorNombre");
     print_r($coleccionPartida); // Imprime en pantalla el arreglo

 }

//fin modulo

//FUNCION 6 ENCONTRAR PARTIDA
    
/**
* Devuelve los datos de una partida especificada por el usuario
* @param int $indicePartida
*/
    
function encontrarPartida ($indicePartida){
    //arrary $coleccionPartida
    //int $cantPatidas
    //Boolean $corte

    $coleccionPartida = cargarPartida();
    $cantPartidas = count($coleccionPartida)-1; //Cuenta la cantidad de partidas registradas, se le resta 1 por los indices
    do{
        if($indicePartida == 0 || $indicePartida <= $cantPartidas){ 
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

//FIN MODULO

//MODULO EXTRA! (Volver al Menu)
function volverAlMenu (){
    // $opcionVolverMenu (cualquier tecla)
    echo "\nPresione cualquier tecla para volver al menu principal: ";
    $opcionVolverMenu = trim(fgets(STDIN));
        if ($opcionVolverMenu == $opcionVolverMenu){
    }
    
}


/**
 * Esta funcion permite corroborar si la palabra elegida ya fue jugada por un jugador
 * 
 */

function jugarPalabraElegida($nombre){
    //int $i, $cantPalabras, $cantPartidas, $numeroPalabra, $cantPartidasJugador
    //array $coleccionPartida, $coleccionPalabras, $partidasJugador
    //boolean $palabraJugada, $tienePartidas 
    //string $palabra  

    //INICIALIZACIÓN DE VARIABLES
        $i = 0;
        $palabraJugada = false;
        $tienePartidas = false;
        $coleccionPartida = cargarPartida(); //Partidas
        $coleccionPalabras = cargarColeccionPalabras(); //Palabras Jugadas
        $cantPalabra = count(cargarColeccionPalabras())-1; //Cantidad de Palabras
        $cantPartidas = count(cargarPartida()); //Cantidad de Partidas
    //EMPIEZA PROGRAMA
        $numeroPalabra = solicitarNumeroEntre(0, $cantPalabra);
        $palabra = $coleccionPalabras[$numeroPalabra];
    //comprobar si el usuario ya jugo
        while($i = $cantPartidas && !$tienePartidas){
            $tienePartidas = $coleccionPartida[$i]["jugador"] == $nombre;
            $partidasJugador = obtenerPartidasJugador($coleccionPartida, $nombre); //Obtiene las partidas del jugador
            $cantPartidasJugador = count($partidasJugador); //Cuenta la cantidad de partidas
            sort($partidasJugador); //Ordena las partidas por incide desde el 0
            $i++;
        }

        if($tienePartidas == false){
            jugarWordix($palabra, $nombre);
        }else{
            $i = 0;
            while($i < $cantPartidasJugador && !$palabraJugada){
                $palabraJugada = $partidasJugador[$i]["palabraWordix"] == $palabra; 
                $i++;
            }
            if($palabraJugada == true){
                echo "\nUsted ya tiene una partida con esta palabra, elija otro número... ";
                jugarPalabraElegida($nombre);
            }else{
                jugarWordix($palabra, $nombre);
            }
        }
     }
    
    
/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:

// array $coleccionPartida, $coleccionPalabras, $coleccionUsuarios


//Inicialización de variables:

$coleccionPartida = cargarPartida();
$coleccionPalabras = cargarColeccionPalabras();
$coleccionUsuarios = cargarUsuarios();


//Proceso:

//$partida = jugarWordix("MELON", strtolower("MaJo")); //Partida de ejemplo
//print_r($partida);
//imprimirResultado($partida);

//




do {
    $cantPalabra= count(cargarColeccionPalabras())-1;
    $opcionMenu = seleccionOpcion();
    
    switch ($opcionMenu) { //Es una funcion similar a If, pero compara una misma variable con distintos valores.
        
        case 1: //Jugar con una palabra elegida, se solicita nombre e indice de palabra.
            
            break;
        case 2: //Jugar con una palabra aleateoria, se solicita nombre y el programa elige una palabra no jugada y al azar. 
            
            break;
        case 3: //Muestra una partida elegida por el usuario, se solicita el indice de la misma 
        
            break;
        case 4: //Muestra la primer partida ganada por un usuario, se solicita el nombre del mismo
            break;
        case 5: // Muestra un resumen con las estadisticas obtenidas por un jugador, se solicita el nombre del mismo
            break;
        case 6: // Muestra las partidas ordenadas alfabeticamente

            break;
        case 7: //Agrega una palabra de 5 letras
            
            break;
        case 8: //SALIR

            break;

    }
} while ($opcionMenu != 8);
