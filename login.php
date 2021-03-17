<form id="login-form">
    <div class="form-group mt-3">
        <label for="email">Email cím</label>
        <div class="position-relative">
            <span class="icon">
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
            <input type="email" class="form-control input-field" id="email">
        </div>
        <div class="invalid-feedback" id="emailHiba"></div>
    </div>

    <div class="form-group">
        <label for="jelszo">Jelszó</label>
        <div class="position-relative">
            <span class="icon">
                <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
            <input type="password" class="form-control input-field" id="jelszo">
        </div>
        <div class="invalid-feedback" id="jelszoHiba"></div>
    </div>

    <div class="invalid-feedback" id="emailcimvagyjelszoHiba"></div>

    <button type="button" class="btn btn-primary btn-style mt-3 mb-3" id="bejelentkezes" onclick="userLogin()">Bejelentkezés</button>
</form>