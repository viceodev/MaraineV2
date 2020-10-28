<section class="email">
    <p class="box-header">Change Your Primary Email</p>

    <form action="" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{Auth::user()->email}}">

        <div class="hr mt-3 mb-5"></div>
        <div class="p-button">
            <button type="submit">Update Email</button>
        </div>
    </form>
</section>