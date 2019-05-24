<?php
	class Checkbox
	{

		public function strCheckboxTipoAberto()
		{
			$str = '<input name="tipo1" value="1" class="" type="checkbox" id="gridCheck1" checked>
					<label class="" for="gridCheck1">
						Eventos Abertos
					</label>	
					<input name="tipo2" value="0" class="" type="checkbox" id="gridCheck1">
					<label class="" for="gridCheck1">
						Eventos Fechados
					</label>';
			return $str;
		}

		public function strCheckboxTipoFechado()
		{
			$str = '<input name="tipo1" value="0" class="" type="checkbox" id="gridCheck1">
					<label class="" for="gridCheck1">
						Eventos Abertos
					</label>	
					<input name="tipo2" value="1" class="" type="checkbox" id="gridCheck1" checked>
					<label class="" for="gridCheck1">
						Eventos Fechados
					</label>';
			return $str;
		}

		public function strCheckboxTipoAmbos()
		{
			$str = '<input name="tipo1" value="1" class="" type="checkbox" id="gridCheck1" checked>
					<label class="" for="gridCheck1">
						Eventos Abertos
					</label>	
					<input name="tipo2" value="1" class="" type="checkbox" id="gridCheck1" checked>
					<label class="" for="gridCheck1">
						Eventos Fechados
					</label>';
			return $str;
		}

		public function ifCheckbox($valueA,$valueB)
		{
			if(!empty($valueA) || !empty($valueB)){
				//echo "Não esta vazio";
				$valor1 = intval($valueA);
				$valor2 = intval($valueB);
				if($valor1 == 1 && $valor2 == 0){
					echo $this->strCheckboxTipoAberto();
					//echo "Retornou o tipo aberto";
				}else if($valor1 == 0 && $valor2 == 1){
					echo $this->strCheckboxTipoFechado();
					//echo "Retornou o tipo fechado";
				}else if($valor1 == 1 && $valor2 == 1){
					echo $this->strCheckboxTipoAmbos();
					//echo "Retornou o tipo ambus";
				}else{
					echo "Nenhum deles foi atendido";
				}
			}else{
				$this->strCheckboxTipoAberto();
			}
		}

	}