<section class="email">
    <p class="box-header">Change Your Primary Email</p>

    <form action="" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{Auth::user()->email}}">

        <div class="hr mt-2 mb-3"></div>
        <div class="p-button">
            <button type="submit">Update Email</button>
        </div>
    </form>

@if(Auth::user()->email_verified_at == null)
    <form action="" method="POST">
        <p for="email" class="pt-1 pb-1" style="color:red;">Your email has not been verified</p>

        <div class="hr mt-1 mb-2"></div>
        <div class="p-button">
            <button type="submit">Verify Email</button>
        </div>
    </form>

@endif
</section>