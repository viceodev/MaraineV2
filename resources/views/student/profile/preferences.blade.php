<section class="preference">
    <p class="box-header">Update Email Preferences</p>

    <form action="/test" method="POST">
        @csrf

        <div>
            <label for="security">send me notifications on security issues</label>
            <input type="checkbox" name="preference[]" id="security" value="security">
        </div>

        <div>
            <label for="update">send me notifications on new assignments and tickets update</label>
            <input type="checkbox" name="preference[]" id="update" value="update">
        </div>


        <div>
            <label for="products">send me notifications on products and services</label>
            <input type="checkbox" name="preference[]" id="products" value="products">
        </div>

        <div class="hr mt-3 mb-5"></div>

        <section class="p-button">
            <button type="submit">Update Preferences</button>
        </section>
        
    </form>
</section>