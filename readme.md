[![Build Status](https://travis-ci.org/fhferreira/Sicoob.svg?branch=master)](https://travis-ci.org/fhferreira/Sicoob)

##Proposta: 
###Geração de Arquivos de Remessa CNAB 240/400 Sicoob/Cred-Acif

```php
//Laravel
use File;
use Exception;
use Sicoob\Remessa\CNAB240\Arquivo;
use Sicoob\Remessa\CNAB240\Boleto;

class BoletoService {
   
   public function geraArquivo($boletos, $mes, $ano)
    {
        $directory = "remessa/$mes/$ano";

        $path = public_path($directory);

        if (!$boletos) {
          throw new Exception("Não há boletos para geração do arquivo.");
        }

        if (!File::isDirectory($path)) {
            $result = File::makeDirectory($path, 0775, true);
        }

        $emissao = date('dmY');
        $hora = date('Hsi');
        //Lote fixo ou realize o registro no banco de dados e torne-o incremental.
        $lote = 1;
        $inscricao = 2;
        //CNPJ do CEDENTE
        $numero_inscricao = '00000000000000';
        //RAZAO SOCIAL CEDENTE
        $nome_empresa = 'DA HADOUKEN RYU LTDA';
        $agencia_cooperativa = 1234;
        $dv_prefixo = 1;
        $conta_corrente = 123;
        $dv_conta_corrente = 4;

        $arquivo = new Arquivo();
        $arquivo->fill([
            'lote' => $lote,
            'header' => [
                'inscricao' => $inscricao,
                'numero_inscricao' => $numero_inscricao,
                'nome_empresa' => $nome_empresa,
                'agencia_cooperativa' => $agencia_cooperativa,
                'dv_prefixo' => $dv_prefixo,
                'conta_corrente' => $conta_corrente,
                'dv_conta_corrente' => $dv_conta_corrente,
                'data_geracao' => $emissao,
                'hora_geracao' => $hora,
            ],
            'header_lote' => [
                'inscricao' => $inscricao,
                'numero_inscricao' => $numero_inscricao,
                'nome_empresa' => $nome_empresa,
                'agencia_cooperativa' => $agencia_cooperativa,
                'dv_prefixo' => $dv_prefixo,
                'conta_corrente' => $conta_corrente,
                'dv_conta_corrente' => $dv_conta_corrente,
                'data_gravacao' => $emissao,
            ]
        ]);

        $countBoleto=0;
        foreach ($boletos as $countBoleto => $boletoArr) {

            $date = isset($boletoArr->periodoBarras[1]) ? $boletoArr->periodoBarras[1]: $boletoArr->periodoBarras[0];
            $dtVencimento = date('dmY', strtotime($date));
            $emissao = date('dmY');
            $hora = date('His');

            $valor_boleto = $boletoArr->totalAPagar;
            $nosso_numero = '000000000001011     ';
            $numero_documento = str_pad($boletoArr->registro . $boletoArr->nr_pessoa_fisica_id, 
            15, 
            '0', 
            STR_PAD_RIGHT);
            $message3 = isset($boletoArr->periodoBarras[1]) ? sprintf("Data: %s à %s", 
            $boletoArr->periodoBarras[0],
            $boletoArr->periodoBarras[1]
            ) : $boletoArr->periodoBarras[0];
            $message4 = isset($boletoArr->intervaloBarras[1]) ? sprintf("Barra: %s à %s", 
            $boletoArr->intervaloBarras[0],
            $boletoArr->intervaloBarras[1]
            ) : $boletoArr->intervaloBarras[0];

            $tamanho = 40;
            $endereco = $boletoArr->endereco;
            /*
            Caso o endereço seja maior que o tamanho necessário, 
            localiza o "Número do endereço" na string e ajusta a string com o numero cortando
            Somente a parte descritiva
            para que o endereço caiba no espaço e seja localizável.
            */
            if (strlen($endereco) > $tamanho) {
                preg_match('/^([^\d]*[^\d\s]) *(\d.*)$/', $endereco, $match);
                $end1 = "";
                if(isset($match[1])) {
                    $end1 = substr($match[1], 0, 40 - (strlen($match[2]) + 1));
                    $endereco = sprintf("%s,%s", $end1, $match[2]);
                } else {
                    $endereco = substr($endereco, 0, 40);
                }
            }

            $Boleto = new Boleto();
            $Boleto->fill([
                'valor' => $valor_boleto,
                'lote' => $lote,
                'count' => ($countBoleto + 1),
                'segmentP' => [
                    'num_cc_agencia_codigo' => $agencia_cooperativa,
                    'digito_verificador' => $dv_prefixo,
                    'conta_corrente' => $conta_corrente,
                    'conta_corrente_dv' => $dv_conta_corrente,
                    'nosso_numero' => $nosso_numero,
                    'carteira' => '1',
                    'numero_documento' => $numero_documento,
                    'data_vencimento' => $dtVencimento,
                    'data_emissao' => $emissao,
                    'data_juros_mora' => $dtVencimento,
                ],
                'segmentQ' => [
                    'tipo_inscricao_pagador' => $boletoArr->tipo_inscricao_pagador,
                    'numero_inscricao' => $boletoArr->numero_inscricao,
                    'nome' =>  $boletoArr->nome,
                    'endereco' =>  $endereco,
                    'bairro' =>  $boletoArr->bairro,
                    'CEP' =>  $boletoArr->cep,
                    'sufixo_CEP' =>  $boletoArr->sufixo_cep,
                    'cidade' =>  $boletoArr->cidade,
                    'uf' =>  $boletoArr->uf,
                ],
                'segmentR' => [
                    'informacao_3' => $message3,
                    'informacao_4' => $message4,
                ],
                'segmentS' => [
                    'informacao_5' => $message3,
                    'informacao_6' => $message4,
                    'informacao_7' => 'Telefones para Contato: (16) 99999-9999',
                    'informacao_8' => $mes . '/' . $ano . ' de vencimento',
                    'informacao_9' => 'Pagavel até o dia o ultimo dia do mes',
                ]
            ]);

            $arquivo->addBoleto($Boleto);
        }
        
        $filename = '/remessa.' . $mes . '-' . $ano . "-" . ($countBoleto + 1) . '-boletos.rem';
        $path = $path . $filename;
        $arquivo->render(false, $path, true);
        return $directory . $filename;
    }

}
```

###Leitura de Arquivos de Retorno CNAB 240/400 Sicoob/Cred-Acif
```php
//Laravel
use Illuminate\Http\Request;
class BoletoService {

    public function postBaixar(Request $request)
    {

        if (!$request->hasFile('arquivo')) {
            return "Arquivo não importado/enviado.";
        }

        $files = $request->file('arquivo');

        $boletos = [];
        foreach ($files as $file):
            $path = public_path("/retorno");
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $arquivoObj = new \Sicoob\Retorno\CNAB240\Arquivo($path . '/' . $filename);
            foreach($arquivoObj->boletos as $boleto) {
                $boleto->codigoMov = $boleto->segmentT->fields['codigo_movimento_retorno']->value;
                $boleto->numeroInscricao = $boleto->segmentT->fields['numero_inscricao']->value;
                $boleto->vencimento = $boleto->segmentT->fields['data_vencimento']->value;
                //Busca o boleto registrado no banco de dados
                $boletoDB = \App\Core\Helpers\Boleto::get($boleto->numeroInscricao, $boleto->vencimento);
                $boleto->boletoDB = $boletoDB;
                $verifica = null;
                if ($boletoDB) {
                    //Verifica e realiza a baixa/liquidação ou mudança de status
                    $verifica = \App\Core\Helpers\Boleto::verifica($boleto, $boleto->codigoMov);
                } else {
                    $verifica = [
                      'status' => false,
                      'status_msg' => "Boleto não encontrado"
                    ];
                }
                $boleto->verifica = $verifica;
                array_push($boletos, $boleto);
            }
        endforeach;

        return $boletos;
    }
}
```
