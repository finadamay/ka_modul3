@extends('layouts.app')

@section('content')
<section class="contact-section" style="margin-top: -70px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title text-center">Data Pesanan</h2>
            </div>
            <div class="col-lg-8 mx-auto">
                <a href="{{route('pesanan.create')}}" class="btn btn-primary mb-3">Tambah Pesanan</a>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Jumlah Parfum</th>
                            <th>Harga</th>
                            <th></th>
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
                                <td>
                                    <div class="d-flex" style="gap: 1rem;">
                                        <a href="{{route('pesanan.edit', $pesanan->id)}}" class="btn btn-primary px-4 py-2">Edit</a>
                                        <form action="{{route('pesanan.destroy', $pesanan->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger px-4 py-2" style="background-image: none;background-color: #dc3545; border-color: #dc3545">Hapus</button>
                                        </form>
                                    </div>
                                </td>
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