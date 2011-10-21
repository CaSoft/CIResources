<?php
/**
 * Helper para data e hora
 *
 * Aqui há funções para auxiliar na formatação de data e hora
 *
 * @author Evaldo Junior <junior@casoft.info>
 * @version 0.1
 * @package moedas
 * @subpackage helpers
 */

/**
 * Esta função formata uma data no formado AAAA-MM-DD para o formato DD/MM/AAAA
 *
 * @param string $data Data no formado AAAA-MM-DD
 * @return string
 */
function date_to_brazil($data) {
    return substr($data, 8, 2).'/'.substr($data, 5, 2).'/'.substr($data, 0, 4);
}

/**
 * Esta função formata uma data no formado DD/MM/AAAA para o formato AAAA-MM-DD
 * use esta função para inserir datas no MySQL
 *
 * @param string $data Data no formato DD/MM/AAAA
 * @return string
 */
function brazil_to_date($data) {
    return substr($data, 6, 4).'-'.substr($data, 3, 2).'-'.substr($data, 0, 2);
}

/**
 * Esta função retorna apenas o dia de uma data no formato DD/MM/AAAA
 *
 * @param string $data Data no formato DD/MM/AAAA
 * @return string Apenas o dia
 */
function pegar_dia($data) {
    return substr($data, 0, 2);
}

/**
 * Esta função retorna apenas o mês de uma data no formato DD/MM/AAAA
 *
 * @param string $data Data no formato DD/MM/AAAA
 * @return string Apenas o mês
 */
function pegar_mes($data) {
    return substr($data, 3, 2);
}

/**
 * Esta função retorna apenas o ano de uma data no formato DD/MM/AAAA
 *
 * @param string $data Data no formato DD/MM/AAAA
 * @return string Apenas o ano
 */
function pegar_ano($data) {
    return substr($data, 6, 4);
}

/**
 * Esta função retorna a hora de um campo no formado AAAA-MM-DD hh:mm:ss
 *
 * @param string    $datahora       Data-hora no formato
 * @param boolean   $pega_segundos  Define se devem ser retornados os segundos
 */
function extract_hour_from_datetime($datahora, $pega_segundos = false) {
    $limite = ($pega_segundos) ? 8 : 5;
    return substr($datahora, 11, $limite);
}

/**
 * Esta função retorna o nome de um mês de acordo com o número dele
 *
 * @param integer   $mes    Número do mês. Ex: 3: Março
 * @return string   Nome do mês
 */
function nome_mes($mes) {
    $meses = array(
        'Janeiro',
        'Fevereiro',
        'Março',
        'Abril',
        'Maio',
        'Junho',
        'Julho',
        'Agosto',
        'Setembro',
        'Outubro',
        'Novembro',
        'Dezembro'
    );

    return $meses[(int)$mes - 1];
}

/**
 * Esta função retorna o dia da semana da data passada como parâmetro
 *
 * @param integer   $data
 * @return string   Dia da semana
 */
 function dia_semana($data) {
	$ano =  substr("$data", 0, 4);
	$mes =  substr("$data", 5, -3);
	$dia =  substr("$data", 8, 9);

	$dia_semana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

	switch($dia_semana) {
		case"0":
                    $dia_semana = "Domingo";
                break;

		case"1":
                    $dia_semana = "Segunda-feira";
                break;

		case"2":
                    $dia_semana = "Terça-feira";
                break;

		case"3": 
                    $dia_semana = "Quarta-feira";
                break;

                case"4":
                    $dia_semana = "Quinta-feira";
                break;

                case"5":
                    $dia_semana = "Sexta-feira";
                break;

                case"6":
                    $dia_semana = "Sábado";
                break;
	}
        
	return $dia_semana;
}


/* End of file datas_helper.php */
/* Location: ./system/application/helpers/datas_helper.php */