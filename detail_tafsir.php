<?php

$nomor = $_GET["nomor"];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://equran.id/api/v2/tafsir/" . $nomor,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => []
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $result = json_decode($response);
    // echo "<pre>";print_r($result);echo "</pre>";
}

include_once 'header.php';
include_once 'nav.php';
?>
<div class="container content rounded-3">
    <div class="row mt-3 text-center p-3">
        <h2><?= $result->data->namaLatin ?> | <?= $result->data->nama ?></h2>
        <strong><?= $result->data->tempatTurun ?> - <?= $result->data->arti ?> - <?= $result->data->jumlahAyat ?> Ayat</strong>
    </div>
    <hr>
    <div class="row p-3">
        <hp><?= $result->data->deskripsi ?></hp>
    </div>
</div>
<?php foreach ($result->data->tafsir as $tafsir) { ?>
    <div class="container content rounded-3">
        <div class="row mt-3 p-3">
            <p class="p-1"><?= $result->data->nomor ?>:<?= $tafsir->ayat ?></p>
            <hr>
            <p class="p-1"><?= $tafsir->teks ?></p>
        </div>
    </div>
<?php } ?>

<?php include_once 'footer.php'; ?>