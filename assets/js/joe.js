(()=> {
    console.log('Hi curious people. Hope you like my site. follow me on twitter @jrutlanddesign');

    let nav = document.getElementsByTagName('nav')[0];
    let hamburger = document.getElementsByClassName('hamburger')[0];
    let closeButton = document.getElementsByClassName('close-menu')[0];
    
    hamburger.addEventListener('click', ()=>{
        nav.classList.add('open');
    }, false);
    closeButton.addEventListener('click', ()=>{
        nav.classList.remove('open');
    }, false);

    for(let i = 0; i < nav.children.length; i++){
        let child = nav.children[i];
        if(child.tagName === 'A') child.addEventListener('click', smoothScroll, false);
    }

    function smoothScroll(e){
        nav.classList.remove('open');
        let href = this.getAttribute('href');
        if(href.indexOf('#') === -1) return true;

        e.preventDefault();
        
        let target = document.getElementById(href.replace('#',''));
        if(!target) return;
        
        let offset = target.offsetTop;
        let currentScroll = window.scrollY;
        
        requestAnimationFrame(scroll.bind(null, currentScroll, offset));
    }
    
    function scroll(currentScroll, offset){
        let stopped = false;
        let increment = 90;
        let padding = 25;
        let offsetCheck = (offset - padding);



        if(currentScroll < offsetCheck){
            currentScroll = Math.floor(currentScroll + increment);
            if(currentScroll >= offsetCheck) {
                window.scrollTo(0,offsetCheck);
                stopped = true;
            }
        } else if(currentScroll > offsetCheck) {
            currentScroll = Math.floor(currentScroll - increment);
            if(currentScroll <=  offsetCheck) {
                window.scrollTo(0, offsetCheck);
                stopped = true;
            }
        }

        if(!stopped){
            window.scrollTo(0,currentScroll);
            requestAnimationFrame(scroll.bind(null, currentScroll, offset));
        }
        
    }







})();
