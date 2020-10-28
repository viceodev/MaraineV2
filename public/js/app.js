//Messeger functionality

if(document.querySelector(".message")){

let messagebox = document.querySelector(".message");
let message = messagebox.innerHTML;
let messageContent = `<div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"/></svg>
</div>

<span>
${message}
</span>
<a href="#" class="close">×</a>`;
messagebox.style.display = 'flex';
messagebox.innerHTML = messageContent;

let closeMessage =  function(){
    let close = document.querySelector('a.close');
    close.parentElement.style.display = "none";
}
document.querySelector('a.close').addEventListener('click', closeMessage);

}

if(document.querySelector('#nav-modal')){
    $nav = document.querySelector('section#nav-modal');
    $main =  document.querySelector('section#nav-modal nav');
    let status = false;

    let toggle = function(e){
            if(e.target == $nav){
                show();
            }
    }

    let show =  function(){
        if(status === false){
            $nav.style.cssText = `display: block`;
            $main.classList.add('fade');
            $main.style.cssText = "transform: scale(100%);";   
            status = true;
        }else if(status === true){
            $main.style.cssText = "transform:scale(200%);";
            $nav.style.cssText = `display: none;`;
            status = false;
        }
        
    }


    let profiles = document.querySelectorAll('#profile');

    profiles.forEach((profile) => {
        profile.addEventListener('click', show);
    });

    window.addEventListener('click', toggle);
}

if(document.querySelector(".sidebar")){
    let sidebar = document.querySelector(".sidebar");
    let toggles = document.querySelectorAll("div.sidebar-toggle");
    let status = false;

    let toggle =  function(e){
        if(e.target == sidebar){
            show();
        }
    }

    let show =  function(){
        if(status === false){
           sidebar.style.cssText = "left:0; background-color: rgba(0,0,100, 0.1);"; 
           status = true;
        }else{
            sidebar.style.cssText = "left: = -100%; background-color:transparent;";
            status = false;
        }
        
    }


    toggles.forEach((toggle) => {
        toggle.addEventListener('click', show);
    });
    
    window.addEventListener('click', toggle);
}

if(document.querySelector('input#search')){
    let search = document.querySelector('input#search');

    let show =  function(){
        search.style.cssText = "border-color: blue;";
    }

    let toggle = function(){
        search.style.cssText = "border-color: black";
    }

    search.addEventListener('focus', show);
    search.addEventListener('blur', toggle);
}

if(document.querySelectorAll("i[id^='password']")){
    let passwords = document.querySelectorAll("i[id^='password']");

    passwords.forEach((password) => {
        let passwordId = password.id;
        
        password.setAttribute('onclick', `changeEye('${passwordId}')`);
        password.classList.add('fade');
    });
}

if(document.querySelector("#dark")){
    let dark =  document.querySelector("#dark");

    let darkMode =  function(){
        let html =  document.querySelector('html');

        html.classList.add('dark');
    }

    dark.onclick = darkMode;
}