<?php

namespace Rada87\DpdGeoApi\Models\Request\Address\Address;

use Rada87\DpdGeoApi\Models\AModelRequest;

class Country extends AModelRequest {
    public $isoAlpha3;

    public function convertToAlpha3($isoAlpha2) {
        // Mapování dvoupísmenných ISO kódů na třípísmenné ISO kódy pro evropské země
        $isoMapping = [
            'AL' => 'ALB',
            'AD' => 'AND',
            'AT' => 'AUT',
            'BY' => 'BLR',
            'BE' => 'BEL',
            'BA' => 'BIH',
            'BG' => 'BGR',
            'HR' => 'HRV',
            'CY' => 'CYP',
            'CZ' => 'CZE',
            'DK' => 'DNK',
            'EE' => 'EST',
            'FO' => 'FRO',
            'FI' => 'FIN',
            'FR' => 'FRA',
            'DE' => 'DEU',
            'GI' => 'GIB',
            'GR' => 'GRC',
            'GL' => 'GRL',
            'VA' => 'VAT',
            'HU' => 'HUN',
            'IS' => 'ISL',
            'IE' => 'IRL',
            'IM' => 'IMN',
            'IT' => 'ITA',
            'JE' => 'JEY',
            'LV' => 'LVA',
            'LI' => 'LIE',
            'LT' => 'LTU',
            'LU' => 'LUX',
            'MK' => 'MKD',
            'MT' => 'MLT',
            'MD' => 'MDA',
            'MC' => 'MCO',
            'ME' => 'MNE',
            'NL' => 'NLD',
            'NO' => 'NOR',
            'PL' => 'POL',
            'PT' => 'PRT',
            'RO' => 'ROU',
            'RU' => 'RUS',
            'SM' => 'SMR',
            'RS' => 'SRB',
            'SK' => 'SVK',
            'SI' => 'SVN',
            'ES' => 'ESP',
            'SJ' => 'SJM',
            'SE' => 'SWE',
            'CH' => 'CHE',
            'UA' => 'UKR',
            'GB' => 'GBR'
        ];

        // Kontrola, zda dvoupísmenný ISO kód existuje v mapování
        if (isset($isoMapping[$isoAlpha2])) {
            $this->isoAlpha3 = $isoMapping[$isoAlpha2];
        }

        return $this->isoAlpha3;
    }
}
