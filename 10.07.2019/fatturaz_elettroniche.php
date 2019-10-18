<!DOCTYPE html>
<html>
<head><title> Fatturazioni Elettroniche </title></head>
<body>

<?php

include("aesPhp/aesCrypt.php");
include("aesPhp/aesDecrypt.php");

define('PSW', 'password');

$xml = <<< XML

<p:FatturaElettronica xmlns:ds="http://www.w3.org/2000/09/xmldsig#" xmlns:p="http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" versione="FPA12" xsi:schemaLocation="http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2 http://www.fatturapa.gov.it/export/fatturazione/sdi/fatturapa/v1.2/Schema_del_file_xml_FatturaPA_versione_1.2.xsd">
<FatturaElettronicaHeader>
<DatiTrasmissione>
<IdTrasmittente>
<IdPaese> </IdPaese>
<IdCodice> </IdCodice>
</IdTrasmittente>
<ProgressivoInvio> </ProgressivoInvio>
<FormatoTrasmissione> </FormatoTrasmissione>
<CodiceDestinatario> </CodiceDestinatario>
</DatiTrasmissione>
<CedentePrestatore>
<DatiAnagrafici>
<IdFiscaleIVA>
<IdPaese> </IdPaese>
<IdCodice> </IdCodice>
</IdFiscaleIVA>
<Anagrafica>
<Denominazione> </Denominazione>
</Anagrafica>
<RegimeFiscale> </RegimeFiscale>
</DatiAnagrafici>
<Sede>
<Indirizzo> </Indirizzo>
<CAP> </CAP>
<Comune> </Comune>
<Provincia> </Provincia>
<Nazione> </Nazione>
</Sede>
</CedentePrestatore>
<CessionarioCommittente>
<DatiAnagrafici>
<CodiceFiscale> </CodiceFiscale>
<Anagrafica>
<Denominazione> </Denominazione>
</Anagrafica>
</DatiAnagrafici>
<Sede>
<Indirizzo> </Indirizzo>
<CAP> </CAP>
<Comune> </Comune>
<Provincia> </Provincia>
<Nazione> </Nazione>
</Sede>
</CessionarioCommittente>
</FatturaElettronicaHeader>
<FatturaElettronicaBody>
<DatiGenerali>
<DatiGeneraliDocumento>
<TipoDocumento> </TipoDocumento>
<Divisa> </Divisa>
<Data> </Data>
<Numero> </Numero>
<Causale>
LA FATTURA FA RIFERIMENTO AD UNA OPERAZIONE AAAA BBBBBBBBBBBBBBBBBB CCC DDDDDDDDDDDDDDD E FFFFFFFFFFFFFFFFFFFF GGGGGGGGGG HHHHHHH II LLLLLLLLLLLLLLLLL MMM NNNNN OO PPPPPPPPPPP QQQQ RRRR SSSSSSSSSSSSSS
</Causale>
<Causale>
SEGUE DESCRIZIONE CAUSALE NEL CASO IN CUI NON SIANO STATI SUFFICIENTI 200 CARATTERI AAAAAAAAAAA BBBBBBBBBBBBBBBBB
</Causale>
</DatiGeneraliDocumento>
<DatiOrdineAcquisto>
<RiferimentoNumeroLinea> </RiferimentoNumeroLinea>
<IdDocumento> </IdDocumento>
<NumItem> </NumItem>
<CodiceCUP> </CodiceCUP>
<CodiceCIG> </CodiceCIG>
</DatiOrdineAcquisto>
<DatiContratto>
<RiferimentoNumeroLinea> </RiferimentoNumeroLinea>
<IdDocumento> </IdDocumento>
<Data> </Data>
<NumItem> </NumItem>
<CodiceCUP> </CodiceCUP>
<CodiceCIG> </CodiceCIG>
</DatiContratto>
<DatiConvenzione>
<RiferimentoNumeroLinea>1</RiferimentoNumeroLinea>
<IdDocumento> </IdDocumento>
<NumItem> </NumItem>
<CodiceCUP> </CodiceCUP>
<CodiceCIG> </CodiceCIG>
</DatiConvenzione>
<DatiRicezione>
<RiferimentoNumeroLinea> </RiferimentoNumeroLinea>
<IdDocumento> </Id Documento>
<NumItem> </NumItem>
<CodiceCUP> </CodiceCUP>
<CodiceCIG> </CodiceCIG>
</DatiRicezione>
<DatiTrasporto>
<DatiAnagraficiVettore>
<IdFiscaleIVA>
<IdPaese> </IdPaese>
<IdCodice> </IdCodice>
</IdFiscaleIVA>
<Anagrafica>
<Denominazione> </Denominazione>
</Anagrafica>
</DatiAnagraficiVettore>
<DataOraConsegna> </DataOraConsegna>
</DatiTrasporto>
</DatiGenerali>
<DatiBeniServizi>
<DettaglioLinee>
<NumeroLinea> </NumeroLinea>
<Descrizione> </Descrizione>
<Quantita> </Quantita>
<PrezzoUnitario> </PrezzoUnitario>
<PrezzoTotale> </PrezzoTotale>
<AliquotaIVA> </AliquotaIVA>
</DettaglioLinee>
<DatiRiepilogo>
<AliquotaIVA> </AliquotaIVA>
<ImponibileImporto> </ImponibileImporto>
<Imposta> </Imposta>
<EsigibilitaIVA> </EsigibilitaIVA>
</DatiRiepilogo>
</DatiBeniServizi>
<DatiPagamento>
<CondizioniPagamento> </CondizioniPagamento>
<DettaglioPagamento>
<ModalitaPagamento> </ModalitaPagamento>
<DataScadenzaPagamento> </DataScadenzaPagamento>
<ImportoPagamento> </ImportoPagamento>
</DettaglioPagamento>
</DatiPagamento>
</FatturaElettronicaBody>
</p:FatturaElettronica>

XML;

$fileName = __DIR__.'/prova.xml';
$key = 'password';

$fileW = fopen($fileName, 'w');
$write = fwrite($fileW, $xml);

fclose($file);

encryptFile($fileName, $key, $fileName . '.enc');

$key === PSW or die("La Chiave Del File Non E' Corretta!\n");
   decryptFile($fileName . '.enc', $key, $fileName . '.dec');
       
unlink("prova.xml");

?>

<style type="text/css">

#header{
     margin-top:  200px;}
     
     #fatt{
     margin-top:  50px;}
     
     #form{
     margin-top:  10px;
     width:100%;
      margin: center;
      -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    text-align: center;}
    
#cognome{
     margin-top:  10px;
     margin-left: -30px;
     width:100%;
      margin: center;
      -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    text-align: center;}
    
#via{
     margin-top:  10px;
     margin-left:  10px;
     width:100%;
      margin: center;
      -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    text-align: center;}
    
    #cf{
     margin-top:  10px;
     margin-left:  12px;
     width:100%;
      margin: center;
      -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    text-align: center;}
    
    #importo{
     margin-top:  10px;
     margin-left: -20px;
     width:100%;
      margin: center;
      -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    text-align: center;}
    
        #cu{
     margin-top:  10px;
     margin-left:   -70px;
     width:100%;
      margin: center;
      -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    text-align: center;}

</style>

</body>
</html>
