<?php
    session_start();

    include_once 'dbaux.php';

    function my_search($id){
        $res = search($id);

        if (!$res) return "not fuond";
        if (mysqli_num_rows($res) == 0) return "nessun risultato";

        $_SESSION['oggetti'] = $res;

        return printOggetti($res);
    }

    function printOggetti($res){
        $lista[] ="<div id = 'box'> ";
        $i = 1;

        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $nome = $row["nome"];
            $prezzo = $row["prezzo"];
            $disponibilità = $row["disponibilità"];
            $path_img = $row["path_img"];

            $lista[] = "<div id = 'cella'".$i.">";

            $lista[] = "<div id = 'img'".$i.">";
            $lista[] = "<img src = 'img/'".$path_img.">";
            $lista[] = "</div>";

            $lista[] = "<div id = 'txt'".$i.">";
            $lista[] = "<div>". $nome. "  ".$prezzo."</div>";
            $lista[] = "</div>";

            $lista[] = "<div id = 'sim'".$i.">";
            if($disponibilità == "disponibile")
                $lista[] = "D";
            elseif ($disponibilità == "non disponibile")
                $lista[] = "X";
            else
                $lista[] = "L";
            $lista[] = "</div>";

            $lista[] = "</div>";
            $i++;
        }
        $lista[] = "</div>";
        return $lista;
    }

    function ordinamentoCrescente($aux1, $aux2){
        $prezzo1 = $aux1['prezzo'];
        $prezzo2 = $aux2['prezzo'];

        if ($prezzo1 === $prezzo2) {
            return 0;
        }
        return ($prezzo1 > $prezzo2) ? 1 : -1;
    }

    function ordinamentoDecrescente($aux1, $aux2){
        $prezzo1 = $aux1['prezzo'];
        $prezzo2 = $aux2['prezzo'];

        if ($prezzo1 === $prezzo2) {
            return 0;
        }
        return ($prezzo1 < $prezzo2) ? 1 : -1;
    }

    function filtroOrdinamento($value){

        $elem = $_SESSION['oggetti'];

        if($value == "crescente"){
            uasort($elem, "ordinamentoCrescente");
        }elseif ($value == "decrescente"){
            uasort($elem, "ordinamentoDecrescente");
        }

        $_SESSION['oggetti'] = $elem;
        return printOggetti($elem);
    }

    function filtroCheckBox($value){
        $elem = $_SESSION['oggetti'];

        $res = array();

        while ($row = mysqli_fetch_array($elem, MYSQLI_ASSOC)) {
            if($row['categoria'] == $value)
                $res[] = $row['categoria'];
        }

        $_SESSION['oggetti'] = $res;
        return printOggetti($res);
    }
?>