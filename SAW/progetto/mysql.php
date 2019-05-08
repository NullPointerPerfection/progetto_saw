<?php

include_once 'utility/utility_DB.php';
    include_once 'utility/utility.php';


class MySQL
{
    var $connessione;
    var $errore;

    function notifica_errore()
    {
        if (empty($this->errore)) return null;
        return $this->errore;
    }

    function insert($key=null, $elem){
            if(Query_insert('carrello', $key , $elem) === false){
                $this->errore = 'inserimento dati nel carrello fallita';
                $this->notifica_errore();
                return false;
            } return true;
    }

    function deleteAll($key, $values){
        if(Query_delete('carrello', $key, $values) === false){
            $this->errore = 'cancellazione dati nel carrello fallita';
            $this->notifica_errore();
        }
    }
    
    function delete($key){
		$condition = " utente = '". $_SESSION['username']. "' and prodotto = '$key';";
        if(Query_delete('carrello', $key, 'poppe' , $condition)){
            $this->errore = 'cancellazione dati nel carrello fallita';
            $this->notifica_errore();
        }
    }

    function select($colonne, $join=null){
		$condition = "utente= '". $_SESSION['username']. "'";
		if(!empty($join)){
			$condition = $join.$condition;
			$res = Query_select('carrello', $colonne, $condition, null, null, $condition);
		}else
			$res = Query_select('carrello', $colonne, $condition);
        if(!$res) return null;
        return $res;
    }
    
	function printAll(){
        $res = $this->select('*', ' inner join articoli on prodotto = nome where ');
        if(empty($res) || mysqli_num_rows($res) === 0){
            $this->errore = 'carrello vuoto';
            $this->notifica_errore();
            return "<div class='nores'>-CARRELLO VUOTO-<br><img src='img/Castellan.png'></div>";
        }
        return print_array($this->printOggetti($res));

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
            <button class='toshop' onclick=\"abcde('$nome', 'c$i')\"><i class='glyphicon glyphicon-remove tbot'></i></button>
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

    function size()
    {
        $res = select('');
        if(empty($res)) return 0;
        return mysqli_num_rows($res);
    }
}
