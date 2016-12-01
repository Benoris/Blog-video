<?php

/**
 * Construit un élément SELECT basé sur le tableau associatif $liste, 
 * sélectionnant l'option $courant, et ajoute les éventuels attributs à
 * la balise select 
 * @param string $name nom du champ de saisie
 * @param array $options tableau associatif value=>texte de l'option
 * @param mixed $default sert à indiquer l'option initialement sélectionnée
 * @param array $class classe attribuér à la balise
 * @param string $id id de la balise
 * @return string élement html select prêt à l'emploi
 */
function select($name, $options, $default=null, $class=null, $id=null)
{
    $element = '<select name="' . $name . '" ';
    if (!empty($id)) { 
        $element .= 'id="' . $id . '" ';
    }
    if (!empty($class)) { 
        $element .= 'class="' . $class . '" ';
    }

    $element .= '>\n';
    foreach ($options as $key => $value)
        if ($key == $default)
            $element .= "<option value=\"$key\" selected=\"selected\">$value</option>\n";
        else
            $element .= "<option value=\"$key\" >$value</option>\n";

    $element .= "</select>";
    return $element;
}