<?php

namespace Yeeraf\Thaibaht;

class Thaibaht
{
    const TEXTNUMBER = ['', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า', 'สิบ'];
    const DIGITNAME = ['', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน'];

    private $result;
    private $suffix;

    public function __construct($suffix = 'บาท')
    {
        $this->result = '';
        $this->suffix = $suffix;
    }

    public function convertToText(float $number)
    {
        return $this->numberToThaiText($number) . $this->suffix;
    }

    public function getText()
    {
        return $this->result;
    }

    private function numberToThaiText($amount)
    {
        $bahtText = '';

        if ($amount >= 1000000) {
            $bahtText .= $this->numberToThaiText(intval($amount / 1000000)) . 'ล้าน';
            $amount = intval(fmod($amount, 1000000));
        }

        $divider = 100000;
        $pos = 0;

        while ($amount > 0) {
            $n = intval($amount / $divider);

            if ($n == 1 && $divider == 1) {
                $bahtText .= $bahtText != '' ? 'เอ็ด' : self::TEXTNUMBER[$n];
            } elseif ($n == 2 && $divider == 10) {
                $bahtText .= 'ยี่';
            } elseif ($n == 1 && $divider == 10) { } else {
                $bahtText .= self::TEXTNUMBER[$n];
            }
            $bahtText .= $n ? self::DIGITNAME[5 - $pos] : '';
            $amount = $amount % $divider;
            $divider = $divider / 10;

            $pos++;
        }
        return $bahtText;
    }
}
