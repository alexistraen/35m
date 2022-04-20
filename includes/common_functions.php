<?php

function cleanMovieTitleUrl($movieTitle) {

    $movieTitle = str_replace(["-", "(", ")", ":", "!", "?", ".", ","], "", $movieTitle);
    $movieTitle = trim($movieTitle);
    $movieTitle = str_replace([" ", "__", "'"], "_", $movieTitle);

    $toFind = ["À","Á","Â","Ã","Ä","Å","à","á","â","ã","ä","å",
    "Ò","Ó","Ô","Õ","Ö","Ø","ò","ó","ô","õ","ö","ø","È","É","Ê",
    "Ë","è","é","ê","ë","Ç","ç","Ì","Í","Î","Ï","ì","í","î","ï",
    "Ù","Ú","Û","Ü","ù","ú","û","ü","ÿ","Ñ","ñ"];
	$replaceBy = ["A","A","A","A","A","A","a","a","a","a","a","a",
    "O","O","O","O","O","O","o","o","o","o","o","o","E","E","E",
    "E","e","e","e","e","C","c","I","I","I","I","i","i","i","i",
    "U","U","U","U","u","u","u","u","y","N","n"];

    return str_replace($toFind, $replaceBy, $movieTitle);
}