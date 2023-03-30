<?php
    use Carbon\Carbon;

function workload($time1, $time2){
    $start = explode(":",$time1);
    $end = explode(":",$time2);

    $time1 = Carbon::createFromTime($start[0], $start[1], $start[2]);
    $time2 = Carbon::createFromTime($end[0], $end[1], $end[2]);

    $difference = $time2->diffInSeconds($time1);

    return gmdate("H:i", $difference);
}

function workload_lot($times){

    if ($times == [] || $times == null) {
        $data = '00:00';
    }else{
        $hora    = 00;
        $minuto  = 00;

        foreach ($times as $minute) {
            $split = explode(":",$minute);

            $hora    += $split[0];
            $minuto  += $split[1];

            $hour = number_format(floor($minuto/60 + $hora), '0');

            $data = str_pad($hour, 2, "0", STR_PAD_LEFT).':'.str_pad($minuto%60, 2, "0", STR_PAD_LEFT);
        }
    }

    return $data;
}

function mask($mask,$str){
    if($str !== '' && $str !== null) {
        $str = str_replace(" ","",$str);
        $str = str_replace("-","",$str);
        $str = str_replace('(',"",$str);
        $str = str_replace(')',"",$str);

        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }
    }else{ $mask = null;}

    return $mask;
}

function rem_char($data){
    if($data !== '' && $data !== null) {
        $data = str_replace(" ","",$data);
        $data = str_replace("-","",$data);
        $data = str_replace(array( '(', ')' ),"",$data);
    }

    return $data;
}

function telep($phone){

    if(strlen($phone)==11){
        $tel = mask('## #####-####',$phone);
    }elseif(strlen($phone)==10){
        $tel = mask('## ####-####',$phone);
    }elseif(strlen($phone)==9){
        $tel = mask('#####-####',$phone);
    }elseif(strlen($phone)==8){
        $tel = mask('####-####',$phone);
    }else{
        $tel = mask('## #####-####',$phone);
    }

    return $tel;
}

function event_sts($status, $date = null){
    switch ($status) {
        case '0': $sts = 'CANCELADO'; break;    // * 0. Cancelado  - rgb(255, 221, 221) cinza
        case '1': $sts = 'PLANEJANDO'; break;   // * 1. Planejando - rgb(244, 225, 140) amarelo
        case '2': $sts = ($date > now())? 'CONFIRMADO': 'RELATÓRIO'; break;   // * 2. Confirmado - rgb(166, 249, 221) Verde
        case '3': $sts = 'FINALIZADO'; break;   // * 3. Executado  - rgb(255, 255, 255) branco
    }
        return $sts;
}

function day_month($date){
    $raw_day = date('d',strtotime($date));
    $raw_month = date('M',strtotime($date));
    $raw_year = date('Y',strtotime($date));
    switch (date('M',strtotime($date))){
        case 'Jan': $raw_month = 'janeiro'; break;
        case 'Feb': $raw_month = 'fevereiro'; break;
        case 'Mar': $raw_month = 'março'; break;
        case 'Apr': $raw_month = 'abril'; break;
        case 'May': $raw_month = 'maio'; break;
        case 'Jun': $raw_month = 'junho'; break;
        case 'Jul': $raw_month = 'julho'; break;
        case 'Aug': $raw_month = 'agosto'; break;
        case 'Sep': $raw_month = 'setembro'; break;
        case 'Oct': $raw_month = 'outubro'; break;
        case 'Nov': $raw_month = 'novembro'; break;
        case 'Dec': $raw_month = 'dezembro'; break; }

    switch (date('w',strtotime($date))){
        case 1: $raw_week = 'segunda'; break;
        case 2: $raw_week = 'terça'; break;
        case 3: $raw_week = 'quarta-feira'; break;
        case 4: $raw_week = 'quinta-feira'; break;
        case 5: $raw_week = 'sexta-feira'; break;
        case 6: $raw_week = 'sábado'; break;
        case 0: $raw_week = 'domingo'; break; }

    $full_date = $raw_week.', '.$raw_day.' de '.$raw_month.' de '.$raw_year;
    return $full_date;
}

function address($street, $number, $complement, $neighborhood, $city, $state, $zipcode){
    $zipcode = mask("#####-###",$zipcode);

    if($number       !== '' && $number       !== null) { $number       = ', '.$number       ;}
    if($complement   !== '' && $complement   !== null) { $complement   = ', '.$complement   ;}
    if($neighborhood !== '' && $neighborhood !== null) { $neighborhood = ', '.$neighborhood ;}
    if($city         !== '' && $city         !== null) { $city         = ', '.$city         ;}
    if($state        !== '' && $state        !== null) { $state        = ', '.$state        ;}
    if($zipcode      !== '' && $zipcode      !== null) { $zipcode      = ', '.$zipcode      ;}

    $result = $street.$number.$complement.$neighborhood.$city.$state.$zipcode;
    return $result;
}

function image_compress($image, $id){
    // Caminho da imagem original
    $imagem_original = $image;

    // Define a qualidade da imagem comprimida (0 a 100)
    $qualidade = 70;

    // Obtém informações sobre a imagem original
    $informacoes_imagem = getimagesize($imagem_original);

    // Cria uma nova imagem a partir da imagem original
    if ($informacoes_imagem['mime'] == 'image/jpeg') {
        $imagem = imagecreatefromjpeg($imagem_original);
    } elseif ($informacoes_imagem['mime'] == 'image/png') {
        $imagem = imagecreatefrompng($imagem_original);
    } else {
        // caso a imagem não seja JPEG ou PNG, exibe uma mensagem de erro
        echo 'Tipo de imagem não suportado.';
        exit;
    }

    // Cria uma imagem comprimida a partir da imagem original
    $result = imagejpeg($imagem, 'storage/public/events/'.$id.'/optimized', $qualidade);

    // Libera a memória ocupada pelas imagens
    imagedestroy($imagem);

    return $result;
}

function search_zipcode($data){
    $zipcode = preg_replace("/[^0-9]/", "", $data);
    $address = [];

    if ($zipcode!=null || $zipcode!='') {
    if (strlen($zipcode) == 8) {

        $ch = curl_init("https://viacep.com.br/ws/{$zipcode}/json/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));
        curl_close($ch);

        if (!isset($result->erro)) {

            switch ($result->uf) {
                case 'AC': $address['zone'] =  1; break;
                case 'AL': $address['zone'] =  2; break;
                case 'AM': $address['zone'] =  3; break;
                case 'AP': $address['zone'] =  4; break;
                case 'BA': $address['zone'] =  5; break;
                case 'CE': $address['zone'] =  6; break;
                case 'ES': $address['zone'] =  7; break;
                case 'GO': $address['zone'] =  8; break;
                case 'MA': $address['zone'] =  9; break;
                case 'MG': $address['zone'] = 10; break;
                case 'MS': $address['zone'] = 11; break;
                case 'MT': $address['zone'] = 12; break;
                case 'PA': $address['zone'] = 13; break;
                case 'PB': $address['zone'] = 14; break;
                case 'PE': $address['zone'] = 15; break;
                case 'PI': $address['zone'] = 16; break;
                case 'PR': $address['zone'] = 17; break;
                case 'RJ': $address['zone'] = 18; break;
                case 'RN': $address['zone'] = 19; break;
                case 'RO': $address['zone'] = 20; break;
                case 'RR': $address['zone'] = 21; break;
                case 'RS': $address['zone'] = 22; break;
                case 'SC': $address['zone'] = 23; break;
                case 'SE': $address['zone'] = 24; break;
                case 'SP': $address['zone'] = 25; break;
                case 'TO': $address['zone'] = 26; break;
                case 'DF': $address['zone'] = 27; break;
            }

            $address['street']        = $result->logradouro;
            $address['neighborhood']  = $result->bairro;
            $address['city']          = $result->localidade;

        }else{
            $address['street']        = null;
            $address['neighborhood']  = null;
            $address['city']          = null;
            $address['zone']          = null;

            session()->flash('message', 'Endereço não identificado...');
        }

    }else{
        $address['street']        = null;
        $address['neighborhood']  = null;
        $address['city']          = null;
        $address['zone']          = null;

        session()->flash('message', 'Quantidade de números incorreta para CEP.');
    }
    }else{
        $address['street']        = null;
        $address['neighborhood']  = null;
        $address['city']          = null;
        $address['zone']          = null;

        session()->flash('message', 'Nenhum valor foi encontrado no campo CEP.');
    }

    return $address;
}
