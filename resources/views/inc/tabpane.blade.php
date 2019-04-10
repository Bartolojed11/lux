<div class="col-lg-8 col-sm-12 shadow-sm">
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link @if($page === 'profile') active @endif" data-toggle="tab" href="#profile">PROFILE</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($page === 'settings') active @endif" data-toggle="tab" href="#settings">SETTINGS</a>
    </li>
</ul>
<div class="tab-content">
    <div id="profile" class="container tab-pane @if($page === 'profile') active @endif"><br>
        <h3>PERSONAL INFORMATION</h3><hr>
        <div class="row">
            <div class="col-lg-2"><p>Name:</p></div>
            <div class="col-lg-10"><p>&nbsp;&nbsp;&nbsp;Jed Bartolo</p></div>

            <div class="col-lg-2"><p>Email:</p></div>
            <div class="col-lg-10"><p>&nbsp;&nbsp;&nbsp;dejchavez11@gmail.com</p></div>

            <div class="col-lg-2"><p>Phone no:</p></div>
            <div class="col-lg-10"><p>&nbsp;&nbsp;&nbsp;09101957443</p></div>
            <div class="col-lg-2"><p>Address:</p></div>
            <div class="col-lg-10"><p>&nbsp;&nbsp;&nbsp;Sagay City , Negros Occidental</p></div>
        </div>
    </div>
    <div id="settings" class="container tab-pane fade @if($page === 'settings') active @endif"><br>
        <h3>Menu 2</h3>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
</div>
</div>
