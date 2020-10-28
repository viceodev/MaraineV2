<section class="personal">
    <p class="box-header">Edit Your personal details</p>

    <form action="" method="POST">
        @csrf

        <label for="name">Full name</label><br>
        <input type="text" name="name" id="name" value="{{Auth::user()->name}}"><br>

        <label for="">Unknown</label><br>
        <input type="text" name="" id=""><br>

        <div class="hr"></div>

        <p class="birthday-title">Birthday</p>

        <div class="birthday">
            <span>
                <select name="day" id="day"></select>
                <label for="day">day</label>    
            </span>

            <span class="skew">
                <select name="month" id="month" class="capitalize"></select>
                <label for="month">month</label>
            </span>

            <span>
                <select name="year" id="year">
                    <option value="null">Year</option>
                </select>

                <label for="year">Year</label>
            </span>
           
        </div><div class="hr"></div>

        <div class="address">
            <section class="first">
                <div>
                    <label for="state">State</label><br>
                    <input type="text" name="state" id="state" value="{{Auth::user()->state}}">
                </div>

                <div>
                    <label for="lga">L.G.A</label><br>
                    <input type="text" name="lga" id="lga" value="{{Auth::user()->state}}">
                </div>                
            </section>


            <div class="second">
                <label for="postal">Postal Code</label><br>
                <input type="text" name="postal" id="postal" value="{{Auth::user()->state}}">
            </div>
        </div>

        <div class="hr mb-5"></div>

        <div class="p-button">
            <button type="submit">Update Details</button>
        </div>
        
    </form>
</section>