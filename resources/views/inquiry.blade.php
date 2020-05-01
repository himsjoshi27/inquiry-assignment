@extends('layouts.guest')

@section('content')

    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">

                                @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success</strong> {{ session()->get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">{{ __('inquiry.inquiry_demo') }}</h3></div>
                                <div class="card-body">
                                    <form method="post" id="inquiry-validation">
                                        @csrf
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputFullName">{{ __('inquiry.full_name') }}*</label>
                                            <input class="form-control py-4 @error('full_name') is-invalid @enderror" value="{{old('full_name')}}" name="full_name" id="inputFullName" type="text" placeholder="{{ __('inquiry.full_name') }}" />
                                            @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="inputCompanyName">{{ __('inquiry.company_name') }}*</label>
                                            <input class="form-control py-4 @error('company_name') is-invalid @enderror" value="{{old('company_name')}}" name="company_name" id="inputCompanyName" type="text" placeholder="{{ __('inquiry.company_name') }}" />
                                            @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="state">{{ __('inquiry.state') }}*</label>
                                                    <select class="form-control @error('state') is-invalid @enderror" name="state" id="state">
                                                        @foreach($states as $state)
                                                        <option value="{{$state->id}}" {{ old('state') == $state->id ? 'selected' : '' }}>{{$state->name}}</option>
                                                        @endforeach
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
                                                    <label for="city">{{ __('inquiry.city') }}*</label>
                                                    <select class="form-control @error('city')  is-invalid @enderror" name="city" id="city">

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
                                            <label class="small mb-1" for="inputEmailAddress">{{ __('inquiry.email') }}*</label>
                                            <input class="form-control py-4 @error('email') is-invalid @enderror" value="{{old('email')}}" id="inputEmailAddress" name="email" type="email" aria-describedby="emailHelp" placeholder="{{ __('inquiry.email') }}" />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="phone">{{ __('inquiry.phone') }}*</label>
                                            <input class="form-control py-4 @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{old('phone')}}" type="text" placeholder="{{ __('inquiry.phone') }}" />
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
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js" crossorigin="anonymous"></script>
    <script crossorigin="anonymous">

        // add custom regex for compan name and full name
        $.validator.addMethod('regex', function(value, element, param) {
            var check = false;
            var re = new RegExp(param);
            return this.optional(element) || re.test(value);
            // return this.optional(element) || value.match(typeof param == 'string' ? new RegExp(param) : param);
        },'Please enter a value in the correct format.');

        /*
        event called on every document load
         */
        $(document).ready(function () {
            // trigger state change for page load
            triggerStateChange();

            // event called on state change
            $('#state').on('change', function () {
                triggerStateChange();
            });

            // add form validation
            $( "#inquiry-validation" ).validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    full_name: {
                        required: true,
                        // regex: "/^[a-zA-Z]+(?:\\s[a-zA-Z]+)+$/",
                        // regex: "^[a-z]([-']?[a-z]+)*( [a-z]([-']?[a-z]+)*)+$",
                        minlength: 3,
                        maxlength: 20
                    },
                    company_name: {
                        required: true,
                        // regex: "/^[\pL\s0-9-]+$/u",
                        minlength: 3,
                        maxlength: 50
                    }
                }
            });
        });

        /*
        get state ID from element and Call city ajax to get city record
        @return void
         */
        function triggerStateChange() {
            var subjectId = $('#state option:selected').val();
            getCitiesAjax(subjectId);
        }

        /*
        call city ajax
        @param subjectId
        @return void
         */
        function getCitiesAjax(subjectId) {
            $.ajax({
                'type': "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{url('/city-list')}}",
                data: {'state_id': subjectId},
                success: function (response) {
                    if(response.status == 1){
                        arrangeCitiesData(response.data)
                    }
                }
            });
        }

        /*
        arrange cities data and set it in HTML
        @param cities
        @return void
         */
        function arrangeCitiesData(cities) {
            var city_id = '{{ old('city') ? old('city') : 1 }}';
            var html = '';
            $.each(cities, function (index, element) {
                var selected = city_id == element.id ? 'selected' : '';
                html += "<option value='" + element.id + "' " + selected + ">" + element.name + "</option>";
            });

            $('#city').html(html);
        }
    </script>
@endsection


