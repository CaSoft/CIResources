<?php
/**
 * Helper for date, time and datetime
 *
 * Functions to help formating dates
 *
 * Version 0.1
 *   - Copied from a project
 *
 * Version 0.2
 *   - Refactored source
 *   - Translation into English
 *
 * @author Evaldo Junior <junior@casoft.info>
 * @version 0.2
 * @subpackage helpers
 */

/**
 * This function formats a date from YYYY-MM-DD to DD/MM/YYYY
 *
 * @param string $date String of a date using YYYY-DD-DD format
 * @return string
 */
function casoft_date_to_brazil($date) {
    return substr($date, 8, 2).'/'.substr($date, 5, 2).'/'.substr($date, 0, 4);
}

/**
 * This function formats a date from DD/MM/YYYY (Brazilian date format) to YYYY-MM-DD
 * Usually use to format dates before sending to database
 *
 * @param string $date
 * @return string
 */
function casoft_brazil_to_date($date) {
    return substr($date, 6, 4).'-'.substr($date, 3, 2).'-'.substr($date, 0, 2);
}

/**
 * This function returns only the day of a date (format DD/MM/YYYY)
 *
 * @param string $date
 * @return string
 */
function casoft_get_day($date) {
    return substr($date, 0, 2);
}

/**
 * This function returns only the month of a date (forma DD/MM/YYYY)
 *
 * @param string $date
 * @return string
 */
function casoft_get_month($date) {
    return substr($date, 3, 2);
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
function casoft_pegar_nome_mes($mes) {
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
