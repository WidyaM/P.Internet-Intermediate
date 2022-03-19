<?php

class Transportasi {

    public $nama, $brand, $merk, $tipe, $harga;

    public function __construct( $nama = "nama", $brand = "brand", $merk = "merk", $tipe = "tipe",  $harga = 0) {

        $this->nama =$nama;
        $this->brand =$brand;
        $this->merk =$merk;
        $this->tipe =$tipe;
        $this->harga =$harga;

    }

    public function getlabel() {

        return "$this->brand, $this->merk, $this->tipe";
    }

    public function getInfoTransportasi() {

        $str = "{$this->nama} | {$this->getlabel()} (Rp. {$this->harga})";

        return $str;
    }

}

class Handphone {

    public $nama, $merk, $baterai, $harga;

    public function __construct( $nama = "nama", $merk = "merk", $baterai = "baterai", $harga = 0) {

        $this->nama =$nama;
        $this->merk =$merk;
        $this->baterai =$baterai;
        $this->harga =$harga;

    }

    public function getlabel() {

        return "$this->merk, $this->baterai";
    }

    public function getInfoElektronik() {

        $str = "{$this->nama} | {$this->getlabel()} (Rp. {$this->harga})";

        return $str;
    }

}

class Mobil extends Transportasi {

    public function getInfoTransportasi () {
        $str = "Mobil = {$this->nama}, {$this->getlabel()}, {$this->merk}, {$this->tipe}, {$this->harga} ";
        return $str;

    }

}

class Motor extends Transportasi {

    public function getInfoTransportasi () {
        $str = "Motor = {$this->nama}, {$this->getlabel()}, {$this->merk}, {$this->tipe}, {$this->harga} ";
        return $str;

    }

}

class Samsung extends Handphone {

    public function getInfoHandphone () {
        $str = "Samsung = {$this->nama}, {$this->getlabel()}, {$this->merk}, {$this->harga} ";
        return $str;

    }

}

class Iphone extends Handphone {

    public function getInfoHandphone () {
        $str = "Iphone = {$this->nama}, {$this->getlabel()}, {$this->merk}, {$this->harga} ";
        return $str;

    }

}
 
$transportasi1 = new Mobil("Mobil", "Daihatsu", "Terios", "R A/T Deluxe", "267150000");
$transportasi2 = new Mobil("Mobil", "Suzuki", "Ertiga", "GA - MT", "201900000");
$transportasi3 = new Motor("Motor", "Honda", "Vario", "125", "21600000");
$transportasi4 = new Motor("Motor", "", "Vario", "125", "21600000");
$handphone1 = new Samsung("Samsung", "Galaxy A12", "5000 mAh", "224000");
$handphone2 = new Samsung("Samsung", "Galaxy A52S", "4500 mAh", "5609000");
$handphone3 = new Iphone ("Iphone", "8", "1821 mAh", "3368000");
$handphone4 = new Iphone ("Iphone", "Xr", "2942 mAh", "7654321");

echo $transportasi1->getInfoTransportasi();
echo "<br>";
echo $transportasi2->getInfoTransportasi();
echo "<br>";
echo $transportasi3->getInfoTransportasi();
echo "<br>";
echo $transportasi4->getInfoTransportasi();
echo "<hr>";
echo $handphone1->getInfoHandphone();
echo "<br>";
echo $handphone2->getInfoHandphone();
echo "<br>";
echo $handphone3->getInfoHandphone();
echo "<br>";
echo $handphone4->getInfoHandphone();
echo "<hr>";

?>


