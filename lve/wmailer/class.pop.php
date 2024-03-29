<?php
/*******************************************************************
 *			
 * 			Fichier			:	class.pop.php 
 * 			Cr&eacute;&eacute; le			:	04 juin 2003 
 * 			Derni&egrave;re modif	:	27 juin 2003 
 * 			Email			:	wascripts@phpcodeur.net 
 * 
 * 				Copyright � 2002-2003 phpCodeur
 * 
 *******************************************************************/

/*******************************************************************
 *  This program is free software; you can redistribute it and/or 
 * 	modify it under the terms of the GNU General Public License as 
 * 	published by the Free Software Foundation; either version 2 of 
 *  the License, or (at your option) any later version. 
 *******************************************************************/

if( !defined('CLASS_POP_INC') )
{

define('CLASS_POP_INC', 1); 

/*
 * Classe de connexion et consultation de serveur POP
 * 
 * Les sources qui m'ont bien aid&eacute;es : 
 * 
 * @link : http://www.interpc.fr/mapage/billaud/telmail.htm
 * @link : http://www.devshed.com/Server_Side/PHP/SocketProgramming/page8.html
 * @link : http://www.commentcamarche.net/internet/smtp.php3
 * @link : http://abcdrfc.free.fr/
 * 
 * Toutes les commandes de connexion et de dialogue avec le serveur sont 
 * d&eacute;taill&eacute;es dans la RFC 1939.
 * 
 * @link : http://abcdrfc.free.fr/rfc-vf/rfc1939.html (fran�ais)
 * @link : http://www.rfc-editor.org/rfc/rfc1939.txt (anglais)
 * 
 * @author  Bobe <wascripts@phpcodeur.net>
 * @version 1.0
 * @access  public
 */
class Pop {
	
	/*
     * Identifiant de connexion
     * 
     * @var	resource
	 * 
	 * @access private
     */
	var $connect_id 	= NULL; 
	
	/*
     * Nom ou IP du serveur pop � contacter
     * 
     * @var	string
	 * 
	 * @access public
     */
	var $pop_server 	= ''; 
	
	/*
     * Port d'acc&eacute;s (en g&eacute;n&eacute;ral, 110)
     * 
     * @var	integer
	 * 
	 * @access public
     */
	var $pop_port 		= 110; 
	
	/*
     * Nom d'utilisateur du compte
     * 
     * @var	string
	 * 
	 * @access public
     */
	var $pop_user 		= ''; 
	
	/*
     * Mot de passe d'acc&eacute;s au compte
     * 
     * @var	string
	 * 
	 * @access public
     */
	var $pop_pass 		= ''; 
	
	/*
     * Derni&egrave;re r&eacute;ponse envoy&eacute;e par le serveur
     * 
     * @var	string
	 * 
	 * @access private
     */
	var $reponse    	= ''; 
	
	/*
     * Tableau contenant les donn&eacute;es des emails lus
     * 
     * @var	string
	 * 
	 * @access private
     */
	var $contents    	= array(); 
	
	/*
     * Dur&eacute;e maximale d'une tentative de connexion
     * 
     * @var	string
	 * 
	 * @access public
     */
	var $timeout    	= 3; 
	
	/*
     * Log contenant le dialogue avec le serveur POP
     * 
     * @var	string
	 * 
	 * @access public
     */
	var $log		  	= ''; 
	
	/*
     * Variable contenant le dernier message d'erreur
     * 
     * @var	string
	 * 
	 * @access public
     */
	var $msg_error		= ''; 
	
	/*
     * Debug mode activ&eacute;/d&eacute;sactiv&eacute;. 
	 * Si activ&eacute;, le dialogue avec le serveur s'affiche � l'&eacute;cran, une &eacute;ventuelle erreur stoppe le script
     * 
     * @var	boolean
	 * 
	 * @access public
     */
	var $debug      	= FALSE; 
	
	/*
	 * Pop::Pop()
	 * 
	 * Si l'argument vaut TRUE, la connexion est &eacute;tablie automatiquement avec les param&egrave;tres par d&eacute;faut 
	 * de la classe. (On suppose qu'ils ont &eacute;t&eacute; pr&eacute;alablement remplac&eacute;s par les bons param&egrave;tres)
	 * 
	 * @param boolean $auto_connect	: TRUE pour &eacute;tablir la connexion � l'instanciation de la classe
	 * 
	 * @return void
	 */
	function Pop($auto_connect = false)
	{
		if( $auto_connect )
		{
			$this->connect($this->pop_server, $this->pop_port, $this->pop_user, $this->pop_pass); 
		}
	}
	
	/*
	 * Pop::connect()
	 * 
	 * Etablit la connexion au serveur POP et effectue l'identification
	 * 
	 * @param string  $pop_server	: Nom ou IP du serveur
	 * @param integer $pop_port		: Port d'acc&eacute;s au serveur POP
	 * @param string  $pop_user		: Nom d'utilisateur du compte
	 * @param string  $pop_pass		: Mot de passe du compte
	 * 
	 * @access public
	 * 
	 * @return boolean
	 */
	function connect($pop_server = '', $pop_port = 110, $pop_user = '', $pop_pass = '')
	{
		$this->pop_server = ( $pop_server != '' ) ? $pop_server : $this->pop_server; 
		$this->pop_port   = ( $pop_port > 0 ) ? $pop_port : $this->pop_port; 
		$this->pop_user   = ( $pop_user != '' ) ? $pop_user : $this->pop_user; 
		$this->pop_pass   = ( $pop_pass != '' ) ? $pop_pass : $this->pop_pass; 
		
		//
		// Ouverture de la connexion au serveur POP
		//
		if( !($this->connect_id = @fsockopen($this->pop_server, $this->pop_port, $errno, $errstr, $this->timeout)) )
		{
			$this->error("connect_to_pop() :: Echec lors de la connexion au serveur pop : $errno $errstr"); 
			return false; 
		}
		
		if( !$this->get_reponse() )
		{
			return false; 
		}
		
		//
		// Identification
		//
		$this->put_data('USER ' . $this->pop_user); 
		if( !$this->get_reponse() )
		{
			return false; 
		}
		
		$this->put_data('PASS ' . $this->pop_pass); 
		if( !$this->get_reponse() )
		{
			return false; 
		}
		
		return true; 
	}
	
	/*
	 * Pop::put_data()
	 * 
	 * Envoit les donn&eacute;es au serveur
	 * 
	 * @param string $input	: Donn&eacute;es � envoyer
	 * 
	 * @access private
	 * 
	 * @return void
	 */
	function put_data($input)
	{
		if( $this->debug )
		{
			echo nl2br(htmlentities($input)) . '<br />'; 
			flush(); 
		}
		
		$this->log .= $input . "\r\n"; 
		
		fputs($this->connect_id, $input . "\r\n"); 
	}
	
	/*
	 * Pop::get_reponse()
	 * 
	 * R&eacute;cup&egrave;re la r&eacute;ponse du serveur
	 * 
	 * @access private
	 * 
	 * @return boolean
	 */
	function get_reponse()
	{
		$this->reponse = fgets($this->connect_id, 150); 
		
		if( $this->debug )
		{
			echo htmlentities($this->reponse) . '<br />'; 
			flush(); 
		}
		
		$this->log .= $this->reponse; 
		
		if( !(substr($this->reponse, 0, 3) == '+OK') )
		{
			$this->error('send_data() :: ' . htmlentities($this->reponse)); 
			return false; 
		}
		else
		{
			return true; 
		}
	}
	
	/*
	 * Pop::stat_box()
	 * 
	 * Commande STAT
	 * Renvoie le nombre de messages pr&eacute;sent et la taille totale (en octets)
	 * 
	 * @access public
	 * 
	 * @return array
	 */
	function stat_box()
	{
		$this->put_data('STAT'); 
		if( !$this->get_reponse() )
		{
			return false; 
		}
		
		list(, $total_msg, $total_size) = explode(' ', $this->reponse); 
		
		return array('total_msg' => $total_msg, 'total_size' => $total_size); 
	}
	
	/*
	 * Pop::list_mail()
	 * 
	 * Commande LIST
	 * Renvoie un tableau avec leur num&eacute;ro en index et leur taille pour valeur
	 * Si un num&eacute;ro de message est donn&eacute;, sa taille sera renvoy&eacute;e
	 * 
	 * @param integer $num		: Num&eacute;ro du message
	 * 
	 * @access public
	 * 
	 * @return mixed
	 */
	function list_mail($num = 0)
	{
		$msg_send = 'LIST'; 
		if( $num > 0 )
		{
			$msg_send .= ' ' . $num; 
		}
		
		$this->put_data($msg_send); 
		if( !$this->get_reponse() )
		{
			return false; 
		}
		
		if( $num == 0 )
		{
			$list = array(); 
			
			do
			{
				$Tmp = fgets($this->connect_id, 150); 
				
				if( $this->debug )
				{
					echo $Tmp . '<br />'; 
				}
				
				if( substr($Tmp, 0, 1) != '.' )
				{
					list($mail_id, $mail_size) = explode(' ', $Tmp); 
					$list[$mail_id] = $mail_size; 
				}
			}
			while( substr($Tmp, 0, 1) != '.' ); 
			
			return $list; 
		}
		else
		{
			list(,, $mail_size) = explode(' ', $this->reponse); 
			
			return $mail_size; 
		}
	}
	
	/*
	 * Pop::read_mail()
	 * 
	 * Commande RETR/TOP
	 * Renvoie un tableau avec leur num&eacute;ro en index et leur taille pour valeur
	 * 
	 * @param integer $num		: Num&eacute;ro du message
	 * @param integer $max_line	: Nombre maximal de ligne � renvoyer (par d&eacute;faut, tout le message)
	 * 
	 * @access public
	 * 
	 * @return boolean
	 */
	function read_mail($num, $max_line = 0)
	{
		if( !$max_line )
		{
			$msg_send = 'RETR ' . $num; 
		}
		else
		{
			$msg_send = 'TOP ' . $num . ' ' . $max_line; 
		}
		
		$this->put_data($msg_send); 
		if( !$this->get_reponse() )
		{
			return false; 
		}
		
		$output = ''; 
		
		do
		{
			$Tmp = fgets($this->connect_id, 150); 
			
			if( $this->debug )
			{
				echo nl2br(htmlentities($Tmp)) . '<br />'; 
			}
			
			if( substr($Tmp, 0, 1) != '.' )
			{
				$output .= $Tmp; 
			}
		}
		while( substr($Tmp, 0, 1) != '.' ); 
		
		$output = preg_replace("/\r\n?/", "\n", $output); 
		
		preg_match("/^(.+?)\n\n(.*?)$/s", $output, $match); 
		
		$this->contents[$num]['headers'] = trim(preg_replace("/\n( |\t)+/", ' ', $match[1])); 
		$this->contents[$num]['message'] = trim($match[2]); 
		
		return true; 
	}
	
	/*
	 * Pop::parse_headers()
	 * 
	 * R&eacute;cup&egrave;re les ent�tes de l'email sp&eacute;cifi&eacute; par $num et renvoi un tableau avec le 
	 * nom des ent�tes et leur valeur
	 * 
	 * @param string $str
	 * 
	 * @access public
	 * 
	 * @return mixed
	 */
	function parse_headers($str)
	{
		if( is_numeric($str) )
		{
			if( !isset($this->contents[$str]['headers']) )
			{
				if( !$this->read_mail($str) )
				{
					return false; 
				}
			}
			
			$str = $this->contents[$str]['headers']; 
		}
		
		$headers = array(); 
		
		$lines = explode("\n", $str); 
		for( $i = 0; $i < count($lines); $i++ )
		{
			list($name, $value) = explode(':', $lines[$i]); 
			
			$name = strtolower($name); 
			$headers[$name] = $this->decode_mime_header($value); 
		}
		
		return $headers; 
	}
	
	/*
	 * Pop::infos_header()
	 * 
	 * @param string $str
	 * 
	 * @return array
	 */
	function infos_header($str)
	{
		$total = preg_match_all("/([^ =]+)=\"?([^\" ]+)/", $str, $matches); 
		
		$infos = array(); 
		for( $i = 0; $i < $total; $i++ )
		{
			$infos[strtolower($matches[1][$i])] = $matches[2][$i]; 
		}
		
		return $infos; 
	}
	
	/*
	 * Pop::decode_mime_header()
	 * 
	 * D&eacute;code l'ent�te donn&eacute; s'il est encod&eacute;
	 * 
	 * @param $str
	 * 
	 * @access private
	 * 
	 * @return string
	 */
	function decode_mime_header($str)
	{
		//
		// On v&eacute;rifie si l'ent�te est encod&eacute; en base64 ou en quoted-printable, et on 
		// le d&eacute;code si besoin est.
		//
		$total = preg_match_all('/=\?[^?]+\?(Q|q|B|b)\?([^?]+)\?\=/', $str, $matches); 
		
		for( $i = 0; $i < $total; $i++ )
		{
			if( $matches[1][$i] == 'Q' || $matches[1][$i] == 'q' )
			{
				$tmp = preg_replace('/=([a-zA-Z0-9]{2})/e', 'chr(ord("\\x\\\\1"));', $matches[2][$i]); 
				$tmp = str_replace('_', ' ', $tmp); 
			}
			else
			{
				$tmp = base64_decode($matches[2][$i]); 
			}
			
			$str = str_replace($matches[0][$i], $tmp, $str); 
		}
		
		return trim($str); 
	}
	
	/*
	 * Pop::extract_files()
	 * 
	 * Parse l'email demand&eacute; et renvoie des informations sur les fichiers joints &eacute;ventuels
	 * Retourne un tableau contenant les donn&eacute;es (nom, encodage, donn&eacute;es du fichier ..) sur les fichiers joints 
	 * ou false si aucun fichier joint n'est trouv&eacute; ou que l'email correspondant � $num n'existe pas.
	 * 
	 * [pas au point: beta]
	 * 
	 * @param integer $num 	: Num&eacute;ro de l'email � parser
	 * 
	 * @access public
	 * 
	 * @return mixed
	 */
	function extract_files($num)
	{
		if( !isset($this->contents[$num]) )
		{
			if( !$this->read_mail($num) )
			{
				return false; 
			}
		}
		
		$headers = $this->parse_headers($this->contents[$num]['headers']); 
		$message = $this->contents[$num]['message']; 
		
		//
		// On v&eacute;rifie si le message comporte plusieurs parties
		//
		if( !isset($headers['content-type']) || !stristr($headers['content-type'], 'multipart') )
		{
			return false; 
		}
		
		$infos = $this->infos_header($headers['content-type']); 
		
		$boundary = $infos['boundary']; 
		$parts    = array(); 
		$files    = array(); 
		$lines    = explode("\n", $message); 
		$offset   = 0; 
		
		for( $i = 0; $i < count($lines); $i++ )
		{
			if( strstr($lines[$i], $infos['boundary']) )
			{
				$offset         = sizeof($parts); 
				$parts[$offset] = ''; 
				
				if( isset($parts[$offset - 1]) )
				{
					preg_match("/^(.+?)\n\n(.*?)$/s", trim($parts[$offset - 1]), $match); 
					
					$local_headers = trim(preg_replace("/\n( |\t)+/", ' ', $match[1])); 
					$local_message = trim($match[2]); 
					
					$local_headers = $this->parse_headers($local_headers); 
					
					$content_type = $this->infos_header($local_headers['content-type']); 
					if( isset($local_headers['content-disposition']) )
					{
						$content_disposition = $this->infos_header($local_headers['content-disposition']); 
					}
					
					if( !empty($content_type['name']) || !empty($content_disposition['filename']) )
					{
						$pos = sizeof($files); 
						
						$files[$pos]['filename'] = ( !empty($content_type['name']) ) ? $content_type['name'] : $content_disposition['filename']; 
						$files[$pos]['encoding'] = $local_headers['content-transfer-encoding']; 
						$files[$pos]['data']     = base64_decode($local_message); 
						$files[$pos]['filesize'] = strlen($files[$pos]['data']); 
						$files[$pos]['filetype'] = substr($local_headers['content-type'], 0, strpos($local_headers['content-type'], ';')); 
					}
				}
				
				continue;
			}
			
			if( isset($parts[$offset]) )
			{
				$parts[$offset] .= $lines[$i] . "\n"; 
			}
		}
		
		return $files; 
	}
	
	/*
	 * Pop::delete_mail()
	 * 
	 * Commande DELE
	 * Demande au serveur d'effacer le message correspondant au num&eacute;ro donn&eacute;
	 * 
	 * @param $num (integer)	: Num&eacute;ro du message
	 * 
	 * @access public
	 * 
	 * @return boolean
	 */
	function delete_mail($num)
	{
		$this->put_data('DELE ' . $num); 
		
		return $this->get_reponse(); 
	}
	
	/*
	 * Pop::reset()
	 * 
	 * Commande RSET
	 * Annule les derni&egrave;res commandes (effacement ..)
	 * 
	 * @access public
	 * 
	 * @return boolean
	 */
	function reset()
	{
		$this->put_data('STAT'); 
		
		return $this->get_reponse(); 
	}
	
	/*
	 * Pop::quit()
	 * 
	 * Commande QUIT
	 * Ferme la connexion au serveur
	 * 
	 * @access public
	 * 
	 * @return void
	 */
	function quit()
	{
		if( is_resource($this->connect_id) )
		{
			$this->put_data('QUIT'); 
			fclose($this->connect_id); 
		}
	}
	
	/*
	 * Pop::error()
	 * 
	 * @param string $msg_error 	: Le message d'erreur, � afficher si mode debug
	 * 
	 * @access private
	 * 
	 * @return void
	 */
	function error($msg_error)
	{
		if( $this->debug )
		{
			$this->quit(); 
			exit($msg_error); 
		}
		
		if( $this->msg_error == '' )
		{
			$this->msg_error = $msg_error; 
		}
	}
}

}
?>