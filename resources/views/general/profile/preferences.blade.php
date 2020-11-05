<section class="preference">
    <p class="box-header">Update Email Preferences</p>

    <form action="{{route('profile.preference.update')}}" method="POST">
        @csrf

        <div>
            <label for="security">send me notifications on security issues</label>
            <input type="checkbox" name="preference[]" id="security" value="security" 
            @if(in_array('security', $info['preference'])) checked @endif >
        </div>

        <div>
            <label for="update">send me notifications on new assignments and tickets update</label>
            <input type="checkbox" name="preference[]" id="update" value="update" 
            @if(in_array('update', $info['preference'])) checked @endif >
        </div>


        <div>
            <label for="products">send me notifications on products and services</label>
            <input type="checkbox" name="preference[]" id="products" value="products"
            @if(in_array( 'products', $info['preference'])) checked @endif >
        </div>

        <div class="hr mt-1 mb-3"></div>

        <section class="p-button">
            <button type="submit">Update Preferences</button>
        </section>
    </form>
</section>