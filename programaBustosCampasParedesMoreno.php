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

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "LEJOS", "CISNE", "MESSI", "CATAR", "HOJAS",
    ];

    return ($coleccionPalabras);
}

// *****FUNCIONES CREADAS POR NOSOTROS*****

/**
 * Solicita al usuario un nombre, la funcion retorna el nick en minusculas.
 * El nombre debe iniciar con letras.
 * @return string
 */

function elegirNickName(){
    // string $nickUsuario, $nickModificado, $primerCaracter
    // boolean $esLetra
    do{
        echo "\nEscribe un NickName (¡Debe iniciar con letras!): ";
        $nickUsuario = trim(fgets(STDIN));
        $nickModificado = strtolower($nickUsuario);
        $primerCaracter = $nickModificado[0];
        $esLetra = ctype_alpha($primerCaracter);
        if($esLetra == 1){
            $esLetra = true;
            echo "\n<<Nick registrado con éxito>> \nBienvenido ".$nickModificado;
            return $nickModificado;
        }else{
            $esLetra = false;
            echo "\nEl nick debe iniciar con letras...\n";
        }
    }while($esLetra == false);
}
// FUNCION 2 CARGAR PARTIDAS
/**
 *Inicializa una estructura de datos con ejemplos de Partidas y devuelve
 *la colección de partidas descrita.
 * @return array
 */function cargarPartida(){

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


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);



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
