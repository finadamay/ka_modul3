@extends('layouts.app')

@section('content')
<section class="contact-section" style="margin-top: -70px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title text-center">Pesan</h2>
            </div>

            <div class="col-lg-8 mx-auto">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-contact contact_form" action="{{ route('pesanan.update', $pesanan->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <p>Nama</p>
                            <div class="form-group">
                                <input class="form-control valid" name="nama" id="nama" type="text" value="{{$pesanan->nama}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name" required>
                            </div>
                        </div>
                        <div class="col-12" style="margin-bottom: 30px;">
                            <p>Jenis</p>
                            <div class="form-group">
                                <select class="form-control" name="jenis" id="jenis" required>
                                    <option value="" disabled selected style="width: 400px">Pilih Jenis</option>
                                    <option value="ganci" style="width: 400px" selected="{{$pesanan->jenis === 'gantungan kunci - ukki'}}">Gantungan Kunci - UKKI</option>
                                    <option value="jersey" style="width: 400px" selected="{{$pesanan->jenis === 'jersey - ukm badminton'}}">Jersey - UKM Badminton</option>
                                    {{-- <option value="vicious pain" style="width: 400px" selected="{{$pesanan->jenis === 'vicious pain'}}">Vicious Pain</option>
                                    <option value="ciello" style="width: 400px" selected="{{$pesanan->jenis === 'ciello'}}">Ciello</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <p>Total Barang</p>
                            <div class="form-group">
                                <input class="form-control valid" name="jumlahParfum" id="jumlahParfum" value="{{$pesanan->jumlahParfum}}" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your total shoes'" placeholder="Enter your total shoes" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3 text-center">
                        <button type="submit" class="button button-contactForm boxed-btn">Update Pesanan</button>
                    </div>
                </form>
                @if(session('error'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: '{!! addslashes(session('error')) !!}',
                        });
                    </script>
                @endif
                @if(session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: '{{ session('success') }}',
                        });
                    </script>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
