<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>nat-login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <section class="container my-3">
        <form action="{{route('nataccount.natloginsubmit')}}" method="post">
            @csrf
            <div class="card">
                <div class="card-herder">
                    <h1>nat - LOGIN</h1>
        
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="natemail" class="form-label">Email</label>
                        <input type="email" class="form-control" 
                        id="natemail" name="natemail"
                        placeholder="natemail@example.com"/>
                        @error('natemail')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <span id="natemail-error">
                        </span>
                     </div>
                     <div class="mb-3">
                        <label for="natpass" class="form-label">Password</label>
                        <input type="password" class="form-control" 
                        id="natpass" name="natpass"
                        placeholder="*******"/>
                        @error('natpass')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <span id="natpass-error">
                        </span>
                     </div>

                </div>
        
                <div class="card-footer">
                    <button class="btn btn-primary">Submit</button>

                    @if(Session::has('nat-error'))
                        <div class="alert alert-danger">
                            <ul>
                                {{Session::get('nat-error') }}
                            </ul>

                        </div>
                    @endif

                </div>

            </div>
        </form>

    </section>
</body>
</html>