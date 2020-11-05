<section class="password">
    <p class="box-header">Change Your Password</p>

    <form action="{{route('profile.password.update')}}" method="POST">
        @csrf 

        <div class="password" id="password-1">
            <div>

            <label for="current-password">Current Password</label>
            <input type="password" name="current_password" id="current-password" placeholder="Current Password"> 

            </div>

            <i id="password-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"/></svg></i>
        </div>

        <div class="password" id="password-2">
            <div>
            
            <label for="new-password">New Password</label>
            <input type="password" name="new_password" id="new-password" placeholder="New Password"> 

            </div>

            <i id="password-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"/></svg></i>
        </div>

        <div class="password" id="password-3">
            <div>
            <label for="confirm-password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm-password" placeholder="Confirm Password"> 
            </div>

            <i id="password-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"/></svg></i>
        </div>
        
        <div class="hr mt-3 mb-5"></div>
        <div class="p-button">
            <button type="submit">Update Password</button>
        </div>
        
    </form>
</section>