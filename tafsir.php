<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://equran.id/api/v2/surat",
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
        <h2 class="card-title">Tafsir Surah</h2>
    </div>
</div>
<div class="container rounded-3">
    <div class="row mt-3 d-inline-flex justify-content-center">
        <?php foreach ($result->data as $surah) { ?>
            <div class="card content m-1 text" style="width:15rem;">
                <a href="detail_tafsir.php?nomor=<?= $surah->nomor ?>" class="text-decoration-none text">
                    <div class="card-body">
                        <h5 class="card-text"><?= $surah->nomor ?>. <?= $surah->namaLatin ?></h5>
                        <h1 class="card-title d-flex justify-content-end"><?= $surah->nama ?></h1>
                        <span class="text-center badge bg-success"><?= $surah->tempatTurun ?></span>
                        <span class="text-center badge bg-success"><?= $surah->arti ?></span>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>

<?php include_once 'footer.php'; ?>