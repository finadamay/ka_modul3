@extends('layouts.app')

@section('content')
<section class="contact-section" style="margin-top: -70px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title text-center">Login Admin</h2>
            </div>
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <form class="form-contact contact_form" action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <p>Username</p>
                            <div class="form-group">
                                <input class="form-control valid" name="username" id="username" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your username'" placeholder="Enter your username" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <p>Password</p>
                            <div class="form-group">
                                <input class="form-control valid" name="password" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your password'" placeholder="Enter your password" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3 text-center">
                        <button type="submit" class="button button-contactForm boxed-btn">Login</button>
                    </div>
                </form>
                @if(session('alert'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: '{!! addslashes(session('error')) !!}',
                        });
                    </script>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection