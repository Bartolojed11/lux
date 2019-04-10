@extends('layouts.app')
@section('content')
        <div class="w3-display-container container margin-topbottom">
        <div class="w3-center" id="contact">
                <span class="w3-xlarge w3-bottombar w3-border-black w3-padding-16">Get in touch with us</span><br><br>
            </div>

            <form class="w3-container" action="#" target="_blank">
                <div class="w3-section">
                    <label>Name</label>
                    <input class="w3-input w3-border w3-hover-border-blue shadow-sm" style="width:100%;" type="text" name="Name" required>
                </div>
                <div class="w3-section">
                    <label>Email</label>
                    <input class="w3-input w3-border w3-hover-border-blue shadow-sm" style="width:100%;" type="text" name="Email" required>
                </div>
                <div class="w3-section">
                    <label>Subject</label>
                    <input class="w3-input w3-border w3-hover-border-blue shadow-sm" style="width:100%;" name="Subject" required>
                </div>
                <div class="w3-section">
                    <label>Message</label>
                    <!-- <input class="w3-input w3-border w3-hover-border-blue" style="width:100%;" name="Message" required> -->
                    <textarea name="" cols="30" rows="10" class="w3-input w3-border w3-hover-border-blue shadow-sm" style="width:100%;" required></textarea>
                </div>
                <button type="submit" class="btn btn-secondary shadow-sm w3-block">Send</button>
            </form>
            </div>
@endsection