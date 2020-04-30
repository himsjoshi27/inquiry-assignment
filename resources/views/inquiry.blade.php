@extends('layouts.guest')

@section('content')

    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">{{ __('inquiry.inquiry_demo') }}</h3></div>
                                <div class="card-body">
                                    <form method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputFullName">{{ __('inquiry.full_name') }}</label>
                                            <input class="form-control py-4 @error('full_name') is-invalid @enderror" name="full_name" id="inputFullName" type="text" placeholder="{{ __('inquiry.full_name') }}" />
                                            @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="inputCompanyName">{{ __('inquiry.company_name') }}</label>
                                            <input class="form-control py-4 @error('company_name') is-invalid @enderror" name="company_name" id="inputCompanyName" type="text" placeholder="{{ __('inquiry.company_name') }}" />
                                            @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="state">{{ __('inquiry.state') }}</label>
                                                    <select class="form-control @error('state') is-invalid @enderror" name="state" id="state">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                    @error('state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="city">{{ __('inquiry.city') }}</label>
                                                    <select class="form-control @error('city')  is-invalid @enderror" name="city" id="city">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                    @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">{{ __('inquiry.email') }}</label>
                                            <input class="form-control py-4 @error('email') is-invalid @enderror" id="inputEmailAddress" name="email" type="email" aria-describedby="emailHelp" placeholder="{{ __('inquiry.email') }}" />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="phone">{{ __('inquiry.phone') }}</label>
                                            <input class="form-control py-4 @error('phone') is-invalid @enderror" id="phone" name="phone" type="text" placeholder="{{ __('inquiry.phone') }}" />
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary btn-block" >{{ __('inquiry.submit') }}</button>
                                        </div>
                                    </form>
                                </div>
                                {{--<div class="card-footer text-center">
                                    <div class="small"><a href="register.html">Have an account? Go to login</a></div>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            @include('inc.footer')
        </div>
    </div>

@endsection


@section('after-script')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
@endsection


