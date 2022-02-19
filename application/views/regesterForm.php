<form action="" method="post" id="saveRegester" name="savelogin">
    <div class="mb-3">
        <label class="mb-2 text-muted" for="email">Name</label>
        <input id="name" type="name" class="form-control" name="name" value="" autofocus>
        <div class="nameError invalid-feedback">
            
        </div>
    </div>

    <div class="mb-3">
        <label class="mb-2 text-muted" for="email">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="">
        <div class="emailError invalid-feedback">
            
        </div>
    </div>

    <div class="mb-3">
        <div class="mb-2 w-100">
            <label class="text-muted" for="password">Password</label>
        </div>
        <input id="password" type="password" class="form-control" name="password">
        <div class="passwordError invalid-feedback">
            
        </div>
    </div>

    <div class="d-flex align-items-center">
        <div class="form-check">
            <input type="checkbox" name="remember" id="remember" class="form-check-input">
            <label for="remember" class="form-check-label">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary ms-auto">
            Regester
        </button>
    </div>
</form>