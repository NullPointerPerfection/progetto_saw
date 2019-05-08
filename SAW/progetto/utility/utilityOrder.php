<?php
    include_once 'utility_DB.php';
    function displayAll($ordinamento, $segno){
		$var = " ORDER BY $ordinamento $segno";
        $res = Query_select("articoli", "*", null, true, $var);
		if (!$res){
            //header('Location: pagina_errore.php');
            return "<div class='nores'>-NESSUN RISULTATO-<br><img src='img/Castellan.png'></div>";
            exit();
        }
        if (mysqli_num_rows($res) === 0) return "<div class='nores'>-NESSUN RISULTATO-<br><img src='img/Castellan.png'></div>";

        return printOggetti($res);
    }

    function my_search($id, $ordinamento, $segno, $categorie){
        $res = search($id, $ordinamento, $segno, $categorie);
        if (!$res){
            header('Location: pagina_errore.php');
            exit();
        }
        if (mysqli_num_rows($res) === 0) return "<div class='nores'>-NESSUN RISULTATO-<br><img src='img/Castellan.png'></div>";
        return printOggetti($res);
    }
    
    function printOggetti($res){
        $lista[] ="<div id = 'box'> ";
        $i = 1;
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $nome = $row["nome"];
            $prezzo = $row["prezzo"];
            $path_img = $row["path_img"];
            $desc = $row["descrizione"];
            $lista[] = "<div id = 'cella$i' class='ogg'>";
            $lista[] = "<img src = 'img/articoli/$path_img' class='lx'>";           
            $lista[] = "<div id = 'txt$i' class='und'>";
            $lista[] = "<span class='vegas'>$nome</span>";
            $lista[] = "<div class='amma'>Prezzo: <span class='vegas'>$prezzo$</span>	
            <button class='toshop' onclick=\"abcd('$nome', 'c$i')\"><i class='glyphicon glyphicon-shopping-cart tbot'></i></button>
            <br><div id='c$i' class='allerta'></div>
            </div>";
            $lista[] = "<br><div class='desc'>$desc</div>";
            $lista[] = "</div>";
            $lista[] = "</div>";
            $i++;
        }
        $lista[] = "</div>";
        return $lista;
    }
?>
