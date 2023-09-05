<!-- Right-aligned login form (Inline Form) -->
                <div class="col-lg-8 align-content-lg-end">
                    <form method="POST" action="/user/signout" class="form-inline">

                        @csrf

                        <div class="input-group">
                            <i class="btn bi bi-search" style="font-size: 2rem; color: cornflowerblue;"></i>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <i class="btn bi bi-chat" style="font-size: 2rem; color: cornflowerblue;"></i>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <button class="btn btn-success" type="submit">Create Post</button>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <button class="btn btn-danger" type="submit">Sign Out</button>
                        </div>
                    </form>
                </div>
