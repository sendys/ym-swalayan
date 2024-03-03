<footer class="main-footer" style="color: white;">
    <div class="pull-right hidden-xs">Version 1.0.0+1</div>
    {{ '```' }} Copyright © {{ date('Y') }} 3BC. All rights reserved. {{ '```' }}
</footer>

<!-- Small modal -->
<div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4>Log Out <i class="fa fa-lock"></i></h4>
            </div>
            <div class="modal-body">
                <p><i class="fa fa-question-circle"></i> Apakah Anda yakin ingin log out? <br /></p>
                <div class="actionsBtns row justify-content-center">
                    <form action="{{ route('logout') }}" method="post" id="logoutForm">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
