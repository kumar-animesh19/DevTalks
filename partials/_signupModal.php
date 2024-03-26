<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup for an iDiscuss Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/FORUM/partials/_handleSignup.php" method="POST">
                    <div class="form-group">
                        <label for="semail">Email address</label>
                        <input type="email" class="form-control" id="semail" name="semail" required>
                    </div>
                    <div class="form-group">
                        <label for="spassword">Password</label>
                        <input type="password" class="form-control" id="spassword" name="spassword" required>
                    </div>
                    <div class="form-group">
                        <label for="scpassword">Password</label>
                        <input type="password" class="form-control" id="scpassword" name="scpassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Signup</button>
                </form>
            </div>
        </div>
    </div>
</div>