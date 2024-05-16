<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Jadwal Sholat</title>
</head>
<body>
    <main>
        <div class="header">
            <h2>Jadwal Sholat</h2>
            <div class="lokasi">
                <img src="css/lokasi.svg" alt="">
                <p>Pontianak</p>
            </div>
            {{-- <div id="waktu-live" >
                <span id="jam"></span>:
                <span id="menit"></span>:
                <span id="detik"></span>
            </div> --}}
            
        </div>
        <div class="jadwal-sholat">
            @foreach ($jadwalSholat as $items => $waktuSholat)
             @if ($items !== 'tanggal' && $items !== 'date')
            <div class="sholat">
                <p class="title">{{ ucfirst($items) }}</p>
                <p class="waktu-sholat " id="up">{{ $waktuSholat }}</p>
                <input type="hidden" id="laksanakan" value="{{$waktuSholat}}">
            </div>
                @endif
            @endforeach
        </div>

        <footer>
            <div class="container">
                <marquee behavior="scroll" direction="left" scrollamount="10" id="runningText">
                    Ini adalah contoh running text di HTML.
                </marquee>
            </div>
            <div id="waktu-live" >
                <span id="jam"></span>:
                <span id="menit"></span>:
                <span id="detik"></span>
            </div>
        </footer>
        
        


    
    </main>
    
</body>
<script>

    function repeatText(text, times) {
        return new Array(times + 1).join(text+' ');
    }
    // Ambil elemen marquee
    var marquee = document.getElementById('runningText');
    // Teks yang ingin diulang
    var originalText = "Ini adalah contoh running text di HTML";
    // Jumlah kali pengulangan
    var repeatTimes = 5;
    // Gabungkan teks yang diulang
    var repeatedText = repeatText(originalText, repeatTimes);
    // Masukkan teks yang diulang ke dalam elemen marquee
    marquee.textContent = repeatedText;

    function updateWaktu() {
    var now = new Date();
    var jam = now.getHours();
    var menit = now.getMinutes();
    var detik = now.getSeconds();
    

    // Mengatur format jam, menit, dan detik ke format dua digit
    jam = padZero(jam);
    menit = padZero(menit);
    detik = padZero(detik);

    // Menampilkan waktu ke dalam elemen dengan ID yang sesuai
    document.getElementById('jam').innerHTML = jam;
    document.getElementById('menit').innerHTML = menit;
    document.getElementById('detik').innerHTML = detik;

    // Mendapatkan waktu sholat dari elemen tersembunyi
    var waktuSolat = document.getElementById('laksanakan').value;

    // Menghapus kelas 'active-waktu' dari elemen dengan ID 'up'
    document.getElementById('up').classList.remove('active-waktu');

    // Jika waktu live sama dengan waktu sholat tertentu, beri gaya khusus
    if (jam + ':' + menit === waktuSolat) {
        document.getElementById('up').classList.add('active-waktu');
    }
}
    function padZero(n) {
        return (n < 10 ? '0' : '') + n;
    }

    // Memperbarui waktu setiap detik
    setInterval(updateWaktu, 1000);

    // Memanggil fungsi untuk pertama kali saat halaman dimuat
    updateWaktu();

    setTimeout(function() {
        location.reload();
    }, 5000); 
</script>
</html>