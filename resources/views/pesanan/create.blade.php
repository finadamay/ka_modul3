@extends('layouts.app')

@section('content')
<section class="contact-section" style="margin-top: -70px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title text-center">Pesan</h2>
            </div>

            <div class="col-lg-8 mx-auto">
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                {{-- dd('halo') --}}
                <form class="form-contact contact_form" action="{{ route('pesanan.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <p>Nama</p>
                            <div class="form-group">
                                <input class="form-control valid" name="nama" id="nama" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name" required>
                            </div>
                        </div>
                        <div class="col-12" style="margin-bottom: 30px;">
                            <p>Jenis</p>
                            <div class="form-group">
                                <select class="form-control" name="jenis" id="jenis" required>
                                    <option value="" disabled selected style="width: 300px">Pilih Jenis</option>
                                    <option value="gantungan kunci - ukki" style="width: 300px">Gantungan Kunci - UKKI</option>
                                    <option value="jersey - ukm badminton" style="width: 300px">Jersey - UKM Badminton</option>
                                    {{-- <option value="love distopia" style="width: 300px">Love Distopia</option>
                                    <option value="coconut scent" style="width: 300px">Coconut Scent</option>
                                    <option value="vicious pain" style="width: 300px">Vicious Pain</option>
                                    <option value="ciello" style="width: 300px">Ciello</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <p>Total Barang</p>
                            <div class="form-group">
                                <input class="form-control valid" name="jumlahParfum" id="jumlahParfum" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your total perfumes'" placeholder="Enter your total shoes" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3 text-center">
                        <button type="submit" class="button button-contactForm boxed-btn">Add Pesanan</button>
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
