<?php

$nomor = $_GET["nomor"];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://equran.id/api/v2/surat/" . $nomor,
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
    <div class="row pb-3">
        <div class="audio-container d-flex justify-content-around">
            <div class="audio text-center">
                <label>Abdullah Al Juhany</label>
                <div class="audio-player-small p-2">
                    <audio src="<?= $result->data->audioFull->{'01'} ?>" id="audio-player-1"></audio>
                    <button class="btn btn-success btn-sm" onclick="toggleAudio('audio-player-1', this)">
                        <i class="fas fa-play"></i>
                    </button>
                </div>
            </div>
            <div class="audio text-center">
                <label>Abdul Muhsin Al Qasim</label>
                <div class="audio-player-small p-2">
                    <audio src="<?= $result->data->audioFull->{'02'} ?>" id="audio-player-2"></audio>
                    <button class="btn btn-success btn-sm" onclick="toggleAudio('audio-player-2', this)">
                        <i class="fas fa-play"></i>
                    </button>
                </div>
            </div>
            <div class="audio text-center">
                <label>Abdurrahman As Sudais</label>
                <div class="audio-player-small p-2">
                    <audio src="<?= $result->data->audioFull->{'03'} ?>" id="audio-player-3"></audio>
                    <button class="btn btn-success btn-sm" onclick="toggleAudio('audio-player-3', this)">
                        <i class="fas fa-play"></i>
                    </button>
                </div>
            </div>
            <div class="audio text-center">
                <label>Ibrahim Al Dossari</label>
                <div class="audio-player-small p-2">
                    <audio src="<?= $result->data->audioFull->{'04'} ?>" id="audiofull-player-4"></audio>
                    <button class="btn btn-success btn-sm" onclick="toggleAudio('audiofull-player-4', this)">
                        <i class="fas fa-play"></i>
                    </button>
                </div>
            </div>
            <div class="audio text-center">
                <label>Misyari Rasyid Al Afasi</label>
                <div class="audio-player-small p-2">
                    <audio src="<?= $result->data->audioFull->{'05'} ?>" id="audio-player-5"></audio>
                    <button class="btn btn-success btn-sm" onclick="toggleAudio('audio-player-5', this)">
                        <i class="fas fa-play"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php foreach ($result->data->ayat as $ayat) { ?>
    <div class="container content rounded-3">
        <div class="row mt-3 p-3">
            <p class="p-1"><?= $result->data->nomor ?>:<?= $ayat->nomorAyat ?></p>
            <h3 class="p-1 text-center" style="color: #48aa2b"><?= $ayat->teksArab ?></h3>
            <strong class="p-1"><?= $ayat->teksLatin ?></strong>
            <hr>
            <p class="p-1"><?= $ayat->teksIndonesia ?></p>
        </div>
    </div>
<?php } ?>
<script>
    var audioPlayers = document.querySelectorAll('audio');
    var playButtons = document.querySelectorAll('.audio-container button');

    function toggleAudio(playerId, button) {
        var audio = document.getElementById(playerId);

        if (audio.paused) {
            pauseAllAudio();
            audio.play();
            button.innerHTML = '<i class="fas fa-pause"></i>';
        } else {
            audio.pause();
            button.innerHTML = '<i class="fas fa-play"></i>';
        }
    }

    function pauseAllAudio() {
        for (var i = 0; i < audioPlayers.length; i++) {
            audioPlayers[i].pause();
            playButtons[i].innerHTML = '<i class="fas fa-play"></i>';
        }
    }
</script>

<?php include_once 'footer.php'; ?>