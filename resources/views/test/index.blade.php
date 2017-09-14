<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style1.css') }}">
    

    </head>

          

    <div class="body"></div>
    <div class="grad"></div>
    <div class="header">
      <div>Merge<span>OnlineSys</span></div>
    </div>
    <br>

    <div class="login">
      <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}


                          @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                          @endif
                           @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                          @endif

                        <div class="form-group">
                           
                            <div class="col-md-6">
                                <input id="email" type="text" placeholder="User" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                              
                            </div>
                        </div>

                        <div class="form-group">
                           <div class="col-md-6">
                                <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                               
                            </div>
                        </div>

                        
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                            
                            
                    </form>
                </div>
    </div>



     


   

    
     <script src="{{ asset('js/app.js') }}"></script>



     
 
 


</html>
