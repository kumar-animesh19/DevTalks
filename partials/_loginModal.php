<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login to iDiscuss</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/FORUM/partials/_handleLogin.php" method="POST">
                    <div class=" form-group">
                        <label for="lemail">Email address</label>
                        <input type="email" class="form-control" id="lemail" name="lemail">

                    </div>
                    <div class="form-group">
                        <label for="lpassword">Password</label>
                        <input type="password" class="form-control" id="lpassword" name="lpassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>