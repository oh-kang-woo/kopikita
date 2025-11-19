@extends('layouts.app')

@section('content')

<section class="hero">
    <div class="text-block">
        <h2>apa itu KopiKita?</h2>

        <p>
            KopiKita merupakan sebuah komunitas untuk berbagi semua hal tentang kopi,
            terutama bagi pecinta kopi.
        </p>

        <p>
            Berawal dari semangat sederhana: ngopi bareng, ngobrol santai, nambah teman,
            kami hadir sebagai ruang nyaman untuk siapa saja yang ingin berbincang
            seputar kopi hidup–pilih duduk. Di sini, teman baru, cerita baru, dan dimana
            pun menikmati aroma biji kopi yang baru digiling.
        </p>
    </div>

    <div class="image-block">
        <img src="{{ asset('images/kopikeluarga.jpeg')}}" alt="Ilustrasi Kopi" />
    </div>
</section>

@endsection
