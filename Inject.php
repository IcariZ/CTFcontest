<?php

// menggiring player untuk menggunakan "tac" sebagai print file dan ${HOME:0:1} (kasih hint) pengganti /
// banyakin BAN
// tutorial run web di docker (inggris)
// tes unicode injection
$ban =[
    "cat",
    "/",
    "strings",
    "type",
    "less",
    "head",
    "tail",
    "echo",
    "more",
    "whoami",
    "pwd",
    "busybox",
    ";",
    "\'",
    "\"",
    " ",
    
    //base64
    //
];

// belajar command buat baca file

if($_SERVER['REQUEST_METHOD']===  'GET')
{

    $kocak = strtolower($_GET['command']);

    // REDIRECT KE / kalo pake word di $ban

    for($i =0; $i <count($ban); $i++)
    {
        if(str_contains($kocak, $ban[$i]))
        {
            header('Location: /' );
            exit();
        }
    }

    // regis nama ke env varbel sengaja ga ada black list buat / supaya di reuse buat command inj

    // vuln
    return shell_exec($_GET['command']);
    
}else if($_SERVER['REQUEST_METHOD'] === 'POST')
{

    echo "<h1>Focus up Commander, HEAD to the other way!</h1><br>";

}else
{
    echo "it's not working";
}

echo "<br><br><a href=\"/\">Go back, rewrite the attack!</a>";
