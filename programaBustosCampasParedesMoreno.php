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
        "LEJOS", "CISNE", "MESSI", "CATAR", "HOJAS",
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
    $coleccionPartida [0]=["palabraWordix" => "LEJOS","jugador" => "silvina","intentos" => 1,"puntaje" => 15];// arreglo inicializado
    $coleccionPartida [1]=["palabraWordix" => "CISNE","jugador" => "paulina","intentos" => 4,"puntaje" => 13]; 
    $coleccionPartida [2]=["palabraWordix" => "MESSI","jugador" => "nicolas","intentos" => 2,"puntaje" => 17];
    $coleccionPartida [3]=["palabraWordix" => "QATAR","jugador" => "ignacio","intentos" => 2,"puntaje" => 17];
    $coleccionPartida [4]=["palabraWordix" => "HOJAS","jugador" => "silvina","intentos" => 5,"puntaje" => 11]; 
    $coleccionPartida [5]=["palabraWordix" => "FUEGO","jugador" => "nicolas","intentos" => 3,"puntaje" => 11];
    $coleccionPartida [6]=["palabraWordix" => "NAVES","jugador" => "ignacio","intentos" => 2,"puntaje" => 16];
    $coleccionPartida [7]=["palabraWordix" => "PIANO","jugador" => "paulina","intentos" => 3,"puntaje" => 9];
    $coleccionPartida [8]=["palabraWordix" => "PISOS","jugador" => "nicolas","intentos" => 6,"puntaje" => 12]; 
    $coleccionPartida [9]=["palabraWordix" => "QUESO","jugador" => "silvina","intentos" => 5,"puntaje" => 11];

    return ($coleccionPartida);  
}

//fin modulo

//*********************************/
//FALTA MODULO DE MENU DE OPCIONES /
//*********************************/


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
 * @param array $coleccionPalabras
 * @return array colección de palabras con la nueva palabra.
 */
function agregarPalabra($coleccionPalabras)
{
 //String $nuevaPalabra, 
 //Boolean $verificaPalabra
 //array $nuevo

 do{
    echo "Ingrese una palabra de 5 letras:";
    $nuevaPalabra = strtoupper(trim(fgets(STDIN))); //convierte la palabra a MAYUSCULA
    $verificaPalabra = palabraExistente($coleccionPalabras, $nuevaPalabra);
    if ($verificaPalabra == false) {
        $nuevo= array($nuevaPalabra);
        $coleccionPalabras = array_merge($coleccionPalabras , $nuevo);// une 2 arreglo  con la funcion array_merge para agregar la nueva  palabra
    }else {
        echo "La palabra ya existe \n";
    }
}while ($verificaPalabra == true);

return $coleccionPalabras;

}
//fin modulo

// FUNCION 8 SELECIONAR PARTIDA GANADORA
/**
* Obtiene índice de la primera partida ganadora.
* @param string $nombreJugador
* @return int
*/
function partidaGanadora($coleccionPalabra,$nombreJugador){
    //Int $n, $i, $indice,$puntaje
   
   
    $n= $coleccionPalabra;
    $puntaje=0;
    $primerPuntaje=0;
    $i=0;
   
    while ( $i <= $n && ($primerPuntaje == 0)) {
     if ( $coleccionPalabra [ $i ]["jugador"] == $nombreJugador){
       if ( $coleccionPalabra[ $i ]["puntaje"] > $puntaje ) {
                   
             $primerPuntaje = 2;
              $indice = $i;
       }
           else {
           $indice = -1;
          }
   }
   $i ++;
    }
   return  $indice ;
   }

// FUNCION 10 solicitarJugador

/**
 * Solicita al usuario un nombre, la funcion retorna el nombre de usuario en minusculas.
 * El nombre debe iniciar con letras.
 * @return string
 */

function solicitarJugador(){
    // string $nickUsuario
    // boolean $esLetra
    do{
        echo "\nEscribe un nombre de usuario (¡Debe iniciar con letras!): ";
        $nombre = trim(fgets(STDIN));
        $nombre = strtolower($nombre); //Esta funcion convierte un string a letra minuscula 
        $esLetra = ctype_alpha($nombre[0]); //Esta función comprueba si el primer caracter del nombre de usuario es una letras 
        if($esLetra == 1){
            $esLetra = true;
            //echo "\n<<Nick registrado con éxito>> \nBienvenido ".$nickUsuario;
            return $nombre;
        }else{
            $esLetra = false;
            echo "\nEl nick debe iniciar con letras...\n";
        }
    }while($esLetra == false);
}


// FUNCION 11 PARTIDAS ORDENADAS segun palabras y segun nombres de jugador
 /**
 *Muestra la colección de partidas ordenada
 *por el nombre del jugador y por la palabra.
 * @param array $coleccionPartida
 */

function ordenarPartidas($coleccionPartida){

    // Esta funcion compara las palabras y las ordena de menor a mayor
     function comparaPorPalabra($a, $b)
 {
     if ($a["palabraWordix"] == $b["palabraWordix"] ) {
         $orden = 0;
     } elseif ($a["palabraWordix"]  < $b["palabraWordix"] ) {
         $orden = -1;
     } else {
         $orden = 1;
     }
     return $orden;
 }
 
 // Esta funcion compara los nombres y los ordena de menor a mayor
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
    // al usar la funcion uasort debe ingresarse el array e los nombre de las funciones creada de comparacion.
     uasort($coleccionPartida,"comparaPorPalabra");//Ordena los elementos usando una función de comparación definida por el usuario.. Mantiene la correlación de los índices
     print_r($coleccionPartida); // Imprime en pantalla el arreglo
     uasort($coleccionPartida,"comparaPorNombre");
     print_r($coleccionPartida); // Imprime en pantalla el arreglo
 }
//fin modulo

/**
* FUNCION RESUMEN DE JUGADOR
* @param array $coleccionPartida
*/

function resumenJugador ($coleccionPartida){
    $jugadorInvocado = solicitarJugador();
    $estadisticasJugador = [];
    $estadisticasJugador = ["jugador"=>$jugadorInvocado,"partidas"=>0,"puntajeTotal"=>0,"victorias"=>0,"porcentajeVictoria"=>0,"intento1"=>0,"intento2"=>0,"intento3"=>0,"intento4"=>0,"intento5"=>0,"intento6"=>0];
    $arregloPartidasJugador = obtenerPartidasJugador($coleccionPartida,$jugadorInvocado);
    $estadisticasJugador ["partidas"] = count($arregloPartidasJugador);
    foreach($arregloPartidasJugador as $partida){
        $estadisticasJugador["puntajeTotal"] = $estadisticasJugador["puntajeTotal"] + $partida["puntaje"];
        if($partida["puntaje"]>0){
            $estadisticasJugador["victorias"]++;
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
    $estadisticasJugador["porcentajeVictoria"] = (int)(($estadisticasJugador["victorias"]*100)/($estadisticasJugador["partidas"]));
    
    echo "********************************************************** \n";
    echo "Jugador: ". $estadisticasJugador["jugador"]. "\n";
    echo "Partidas: ". $estadisticasJugador["partidas"]. "\n";
    echo "Puntaje Total: ". $estadisticasJugador["puntajeTotal"]. "\n";
    echo "Victorias: " . $estadisticasJugador["victorias"]. "\n";
    echo "Porcentaje Victorias: ". $estadisticasJugador["porcentajeVictoria"]. "\n";
    echo "Adivinadas: \n";
    echo "     Intento 1: ". $estadisticasJugador["intento1"]. "\n";
    echo "     Intento 2: ". $estadisticasJugador["intento2"]. "\n";
    echo "     Intento 3: ". $estadisticasJugador["intento3"]. "\n";
    echo "     Intento 4: ". $estadisticasJugador["intento4"]. "\n";
    echo "     Intento 5: ". $estadisticasJugador["intento5"]. "\n";
    echo "     Intento 6: ". $estadisticasJugador["intento6"]. "\n";
    echo "********************************************************** \n";
    }
    //OBTENER PARTIDAS JUGADOR
    function obtenerPartidasJugador($coleccionPartida,$nombreJugador){
    $partidasDelJugador = [];
    $partidasDelJugador = array_filter($coleccionPartida,function($partida)use($nombreJugador){
        return ($partida["jugador"] == $nombreJugador);
    });
        return $partidasDelJugador;
    }
    
/**
* FUNCION ENCONTRAR PARTIDA CON UN NUMERO SOLICITADO
* 
* 
*/
    
function encontrarPartida (){
$arregloPartida = cargarPartida();
$cantPartidas = count($arregloPartida)-1;
$solicitarNum = solicitarNumeroEntre(0,$cantPartidas); 
$encontrarPartida = $arregloPartida[$solicitarNum];
echo "********************************************************** \n";
echo "Partida WORDIX ". $solicitarNum. ": palabra ". $arregloPartida[$solicitarNum]["palabraWordix"], "\n";
echo "Jugador: ". $arregloPartida[$solicitarNum]["jugador"]. "\n";
echo "Puntaje: ". $arregloPartida[$solicitarNum]["puntaje"]. " puntos \n";
    if($arregloPartida[$solicitarNum]["puntaje"] > 0){
            echo "Intento: Adivinó la palabra en ". $arregloPartida[$solicitarNum]["intentos"]. " intentos \n";
    }else{
            echo "Intento: No adivinó la palabra \n";
    }
    echo "********************************************************** \n";
    
    }
    

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:

//CREAR una variable para llamar al arreglo de partidas cargarPartidas()
//CREAR una variable para llamar al arreglo de palabras coleccionPalabras()

//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);

//

/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/
