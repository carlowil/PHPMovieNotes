<?php
function validate($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function guidv4($data = null) {
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}


function truncate($data, $maxLen, $append="&hellip;") {
    $data = validate($data);
    if (strlen($data) > $maxLen) {
        $string = wordwrap($data, $maxLen);
        $string = explode("\n", $string, 2);
        $string = $string[0] . $append;
        return $string;
    }
    return $data;
}
?>