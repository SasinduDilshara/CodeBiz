<?php

function input_block($type, $label, $name, $value='', $inputAttrs=[], $divAttrs=[])
{   
    $divstr = stringAttrs($divAttrs);
    $inputstr = stringAttrs($inputAttrs);
    $html = '<div' . $divstr . '>';
    $html .= '<label for="'. $name .'">'. $label . '</label>';
    $html .= '<input type="'. $type .'" id="'. $name .'" name="'. $name .'" value="'. $value .'"'. $inputstr .'/>'; 
    $html .= '</div>';
    return $html;//easy to perform forms
}


function stringAttrs($attrs)
{
    $string = '';
    foreach($attrs as $key => $value)
    {
        $string .= ' ' . $key . '="' . $value . '"';
    }
    return $string;
}

//$attrs = ['class' => "red",'onclick'=>"return false"]
// gives us <div class="red" onclick="return falsez"></div>

function submitTag($buttonText,$inputAttrs=[])
{
	//$divstr = stringAttrs($divAttrs);
    $inputstr = stringAttrs($inputAttrs);
    $html = '<input type="submit" value="'.$buttonText.'"'.$inputstr.' />';
    return $html;
}

function submitBlock($buttonText,$inputAttrs=[],$divAttrs=[])
{
	//$divstr = stringAttrs($divAttrs);
	$divstr = stringAttrs($divAttrs);
    $inputstr = stringAttrs($inputAttrs);
    // $inputstr = stringAttrs($inputAttrs);

    $html = '<div'.$divstr.'>';
    $html .= '<input type="submit" value="'.$buttonText.'"'.$inputstr.' />';
    $html.='</div>';
    return $html;
}

?>