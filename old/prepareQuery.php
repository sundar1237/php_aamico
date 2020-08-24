<?php

$values="1;Frische Tomaten;beyound_3;0
2;Artischocken;beyound_3;0
3;Peporoni;beyound_3;0
4;Gorgonzola;beyound_3;0
5;Vorderschinken;beyound_3;0
6;Salami(scharf);beyound_3;0
7;Speck;beyound_3;0
8;Thon;beyound_3;0
9;Kapern;beyound_3;0
10;Champignons;beyound_3;0
11;Auberginen;beyound_3;0
12;Pfefferschoten;beyound_3;0
13;Salami;beyound_3;0
14;Birne;beyound_3;0
15;Erbsen;beyound_3;0
16;Eier;beyound_3;0
17;Ananas;beyound_3;0
18;Spinat;beyound_3;0
19;Meeresfrüchte;direct;2
20;Oliven;beyound_3;0
21;Sardllen;beyound_3;0
22;Zwiebeln;beyound_3;0
23;Knoblauch;beyound_3;0
24;Rucola;beyound_3;0
25;Poulet;direct;1.5
26;Risencrevetten;direct;2
27;Crevetten;direct;1.5
28;Lachs;direct;2
29;Kebab Fleisch;direct;3
30;Grana Padano;beyound_3;1";
$list = explode("\n", $values);
echo count($list);
echo "INSERT INTO `extra`(`seqNo`, `name`, `type`, `unitPrice`) VALUES \n";
for ($x = 0; $x < count($list); $x++) {
    $cells = explode(";",$list[$x]);
    echo "(";
    for ($y = 0; $y < count($cells); $y++) {
        if($y==(count($cells)-1)){
            echo $cells[$y]."),";
        }else{
            if ($y==1){
                echo "'".$cells[$y]."',";
            }else if ($y==2){
                echo "'".$cells[$y]."',";
            }else if ($y==4){
                echo "'".$cells[$y]."',";
            }else{
                echo $cells[$y].",";
            }
        }
    }
}