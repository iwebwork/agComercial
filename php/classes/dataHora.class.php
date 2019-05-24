<?php
	class dataHora{

		public function foramatoData($value)
		{
			//echo $value;
			return date("d/m/Y", strtotime($value));
		}
	}