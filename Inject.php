<?php

$ban =[
    "cat",
    "/",
    "strings",
    "type",
    "less",
    "head",
    "tail",
    "echo",
    "|",
    "nl",
    "%",
    "\'",
    "\"",
    "bash",
    "more",
    "@",
    "&",
    "^",
    "*",
    "<",
    ">",
    "\\",
    ";",
    "exec",
    "system",
    "passthru"
];
try
{
    if($_SERVER['REQUEST_METHOD'] ===  'GET')
    {
    
        $kocak = strtolower($_GET['command']);
    
        for($i =0; $i <count($ban); $i++)
        {
            if(str_contains($kocak, $ban[$i]))
            {
    
                header('Location: /' );
                exit();
            }
        }

        $attack = shell_exec($_GET['command']);
        // future-note: should store the note into env variable
        
        if(!isset($attack))
        {
            echo "<p>Attack unsuccessful sir</p><br>";
        }else
        {
            echo $attack;
        }
        
    }else if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
    
        echo "<h1>Focus up Commander, HEAD to the other way!</h1><br>";
    
    }    
}catch(Throwable $e)
{
    echo "Error: " . $e->getMessage() . "<br>";  
    echo "Error code: " . $e->getCode() . "<br>";
}

echo "<br><br><a href=\"/\">Go back, rewrite the attack!</a>";
