@extends('layouts.app')

@section('content')
<section class="contact-section" style="margin-top: -70px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title text-center">Data Pesanan</h2>
            </div>
            <div class="col-lg-8 mx-auto">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Jumlah Parfum</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                        ?>
                        @foreach ($pesananData as $pesanan)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $pesanan->nama }}</td>
                                <td>{{ $pesanan->jenis }}</td>
                                <td>{{ $pesanan->jumlahParfum }}</td>
                                <td>{{ $pesanan->harga }}</td>
                            </tr>
                            <?php
                                $no++;
                            ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Contact Area End -->
@endsection
