<div class="card-body">
            <div class="form-group mb-3">
                <label for="name">Full Name</label>
                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="name" placeholder="Enter user full name" value ="{{ $user->name ?? '' }}"/>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="Enter email" value ="{{ $user->email ?? '' }}"/>
                 @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="Password" />
                 @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="password_confirmation">Retype Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Retype Password" />
            </div>
        </div>