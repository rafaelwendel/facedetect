<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


/**
    * Retorna os nomes dos arquivos de um diretório
    * @author Rafael Wendel Pinheiro
    * @param String $dir Caminho do diretório a ser utilizado
    * @param Array  $tipos Tipos de extensões a serem retornadas
    * @return array
*/
function get_files_dir($dir, $tipos = null){
      if(file_exists($dir)){
          $dh =  opendir($dir);
          while (false !== ($filename = readdir($dh))) {
              if($filename != '.' && $filename != '..'){
                  if(is_array($tipos)){
                      $extensao = get_extensao_file($filename);
                      if(in_array($extensao, $tipos)){
                          $files[] = $filename;
                      }
                  }
                  else{
                      $files[] = $filename;
                  }
              }
          }
          if(is_array($files)){
              sort($files);
          }
          return $files;
      }
      else{
          return false;
      }
}

/**
    * Retorna a extensão de um arquivo
    * @author Rafael Wendel Pinheiro
    * @param String $nome Nome do arquivo a se capturar a extensão
    * @return resource Caminho onde foi salvo o arquivo, ou false em caso de erro
*/
function get_extensao_file($nome){
    $verifica = explode('.', $nome);
    return $verifica[count($verifica) - 1];
}


/**
    * Cria um arquivo
    * @author Rafael Wendel Pinheiro
    * @param String $nome Nome do arquivo a ser criado
    * @param String $extensao Extensão do arquivo a ser criado
    * @param String $conteudo Conteúdo do arquivo
    * @param String $pasta  Local onde será salvo o arquivo
    * @param bool   $sobrepor Define se haverá sobreposição em caso de arquivo existente
    * @return resource Caminho onde foi salvo o arquivo, ou false em caso de erro
*/
function criar_arquivo($nome, $conteudo, $pasta, $sobrepor = true){
    $caminho = $pasta . $nome;
    if((file_exists($caminho) && $sobrepor) || (!file_exists($caminho))){
        $ponteiro = fopen($caminho, 'w');
        if(!$ponteiro){
            return false;
        }
        fwrite($ponteiro, $conteudo);
        fclose($ponteiro);
        return $caminho;
    }
    else{
        return false;
    }
}


/**
    * Lê um arquivo
    * @author Rafael Wendel Pinheiro
    * @param String $arquivo O arquivo que deverá ser lido
    * @return resource Array com conteúdo lido no arquivo, ou false em caso de erro
*/
function ler_arquivo($arquivo){
    $ponteiro = fopen($arquivo, 'r');
    if($ponteiro){
        while(!feof($ponteiro)){
            $conteudo[] = fgets($ponteiro);
        }
        fclose($ponteiro);
        return $conteudo;
    }
    else{
        return false;
    }
}


/**
    * Cria um diretório
    * @author Rafael Wendel Pinheiro
    * @param String $nome Nome do diretório a ser criado
    * @return bool true se criar o diretório, ou false em caso de erro
*/
function criar_diretorio($caminho){
    if(!file_exists($caminho)){
        if(mkdir($caminho)){
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
}
?>