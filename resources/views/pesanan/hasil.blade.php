@extends('layouts.app')

@section('content')
<section class="contact-section" style="margin-top: -70px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title text-center">Bukti Pesanan</h2>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <form class="form-contact contact_form" action="{{ route('pesanan.download') }}" method="post">
                    @csrf
                    @if(session('success'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: '{{ session('success') }}',
                            });
                        </script>
                    @endif

                    <table style="border: none; width: 80%;" >
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $nama }}</td>
                        </tr>
                        <tr>
                            <td>Jenis</td>
                            <td>:</td>
                            <td>{{ $jenis }}</td>
                        </tr>
                        <tr>
                            <td>Total Perfume</td>
                            <td>:</td>
                            <td>{{ $jumlahParfum }}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>:</td>
                            <td>{{ $harga }}</td>
                        </tr>
                    </table>

                    <input type="hidden" name="nama" value="{{ $nama }}">
                    <input type="hidden" name="jenis" value="{{ $jenis }}">
                    <input type="hidden" name="jumlahParfum" value="{{ $jumlahParfum }}">
                    <input type="hidden" name="harga" value="{{ $harga }}">
                    <div class="form-group mt-3 text-center" >
                        <button type="submit" class="button button-contactForm boxed-btn" style="margin-top: 20px;">Download Bukti Pesanan</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</section>
@endsection