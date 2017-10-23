<?php
class Planning {
	private		$jourFr = Array(0=>'Lundi', 1=>'Mardi', 2=>'Mercredi', 3=>'Jeudi', 4=>'Vendredi', 5=>'Samedi', 6=>'Dimanche');

	private $jourDebut;
	private $jourFin;

	private $heureDebut;
	private $heureFin;

	private $pas;
	private $minuteKeys;

	private $tabSemaine;

	const htmlSpace = '&nbsp;';
	const htmlEmptyCell = '<td bgcolor="#0007000A"> &nbsp; </td>';
	const htmlCellOpen = '<td>';
	const htmlCellClose = '</td>';
	const htmlRowOpen = '<tr>';
	const htmlRowClose = '</tr>';
	const htmlTableOpen = '<table class="tabPlanning">';
	const htmlTableClose = '</table>';

	const separateurHeure = 'h';

	public function __construct($jourDebut=1, $jourFin=5, $heureDebut=540, $heureFin=1260, $pas=30, $contenu = Array()){
		$this->jourDebut = $jourDebut;
		$this->jourFin = $jourFin;
		$this->heureDebut = $heureDebut;
		$this->heureFin = $heureFin;
		$this->pas = $pas;
		$this->contenu = $contenu;

		$this->initTableauSemaine($this->contenu);
		//$this->debugPHPArrays();
		$this->insererContenus($contenu);
	}



	private function genererMinutesKeys() {
		$keys = Array();
		for ($key=$this->heureDebut; $key<=$this->heureFin; $key+=$this->pas) {
			$keys[] = $key;
		}
		$this->keys = $keys;
		return $keys;
	}


	private function initTableauJour() {
		if ($this->pas !=0) {
			$numCells = ($this->heureDebut - $this->heureFin) / $this->pas;
		} else {
			echo 'pas == 0!!';
		}
		$keys = $this->genererMinutesKeys();
		$tabJour = array_fill_keys($keys, self::htmlEmptyCell );
		return $tabJour;
	}

	private function initTableauSemaine() {
		$this->tabSemaine = Array();
		$tabJour = $this->initTableauJour();
		for($i=$this->jourDebut; $i<=$this->jourFin; $i++) {
			$this->tabSemaine[$i] = $tabJour;
		}
	}

	private function getNumeroCellule($minutesDebut, $minutesFin) {
		return ($minutesFin - $minutesDebut) / $this->pas;
	}


	private function insererContenus($contenuPlanning) {
		foreach ($contenuPlanning as $contenuCellule) {
			$this->insererContenu($contenuCellule);
		}
	}


	private function insererContenu($contenuCellule) {
		$duree = $this->getNumeroCellule($contenuCellule->heureDebut, $contenuCellule->heureFin);
		$contenu = $contenuCellule->contenu.'<br />';
		$contenu .= $this->convertMinutesEnHeuresMinutes($contenuCellule->heureDebut);
		$contenu .= ' - '.$this->convertMinutesEnHeuresMinutes($contenuCellule->heureFin);

		$this->tabSemaine[$contenuCellule->numJour][$contenuCellule->heureDebut] = $this->genererCelluleHTML($contenu,$duree, '', $contenuCellule->bgColor);

		$key = $contenuCellule->heureDebut;
		for ($cpt = $duree-1; $cpt>0; $cpt--) {
			$key += $this->pas;
			$this->tabSemaine[$contenuCellule->numJour][$key] = '';
		}
	}


	public function debugPHPArrays() {
		echo '<pre>';
		print_r($this->tabSemaine);
		echo '</pre>';
	}


	public function genererHtmlTable() {
		$htmlTable = self::htmlTableOpen;

		$htmlTable .= $this->genererBandeauJours();

		$key = $this->heureDebut;
		$keyEnd = $this->heureFin;
		for ($key; $key <= $keyEnd; $key+=$this->pas) {
			$htmlTable .= self::htmlRowOpen;
			$htmlTable .= '<td class="cellhour">'.$this->convertMinutesEnHeuresMinutes($key).'</td>';
			foreach ($this->tabSemaine as $tabHeures) {
				$htmlTable .= $tabHeures[$key];
			}
			$htmlTable .= self::htmlRowClose;
		}
		$htmlTable .= self::htmlTableClose;
		return $htmlTable;
	}


	public function afficherHtmlTable() {
		echo $this->genererHtmlTable();
	}


	private function genererBandeauJours() {
		$daysLine = self::htmlRowOpen;
		$daysLine .= $this->genererCelluleHTML(self::htmlSpace);
		$day = $this->jourDebut;
		while ($day <= $this->jourFin) {
			$daysLine .= $this->genererCelluleHTML($this->jourFr($day), '', 'cellDay','');
			$day++;
		}
		$daysLine .= self::htmlRowClose;
		return $daysLine;
	}


	private function genererCelluleHTML($contenuCellule, $colspan = '', $class = '', $bgColor = '') {
		$celluleHTML = '<td';
		if (!empty($colspan))
			$celluleHTML .= ' rowspan="'.$colspan.'"';
		if (!empty($class))
			$celluleHTML .= ' class="'.$class.'"';
		if (!empty($bgColor))
			$celluleHTML .= ' bgcolor="'.$bgColor.'"';
		$celluleHTML .= '/>';
		if ($bgColor == '#900') {
			$celluleHTML .= '<font color="#FFF">';
			$celluleHTML .= $contenuCellule;
			$celluleHTML .= '</font></td>';
		}else {
			$celluleHTML .= $contenuCellule;
		}
		return $celluleHTML;
	}


	private function jourFr($dayNum) {
		return $this->jourFr[$dayNum];
	}


	private function convertMinutesEnHeuresMinutes($minutes) {
		$heure = floor($minutes /60);
		$minutes = ($minutes % 60);
		$minutes = str_pad($minutes, 2, '0', STR_PAD_LEFT);
		return ($heure. self::separateurHeure .$minutes);
	}
}
?>