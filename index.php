<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Lampa - Каталог фильмов и сериалов</title>
    
<meta name="description" content="Приложение для просмотра каталога фильмов и сериалов на телевизорах, приставках и смартфонах." />

<meta property="og:title" content="Lampa - Каталог фильмов и сериалов">
<meta property="og:description" content="Приложение для просмотра каталога фильмов и сериалов на телевизорах, приставках и смартфонах.">
<meta property="og:image:type" content="image/png">
<meta property="og:image" content="og.png">

<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
<link rel="manifest" href="icons/site.webmanifest" crossorigin="use-credentials">
<link rel="mask-icon" href="icons/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="icons/favicon.ico">
<meta name="msapplication-TileColor" content="#1d1f20">
<meta name="msapplication-config" content="icons/browserconfig.xml">
<meta name="theme-color" content="#1d1f20">

<meta name="referrer" content="never">

<link rel="stylesheet" href="./vender/scrollbar/jquery.scrollbar.css">
<link rel="stylesheet" href="./vender/keypad/style.css">

<link rel="stylesheet" href="css/app.css?v=4.56">

<!-- AUTH STYLES -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Mulish:wght@300;400;600&display=swap');
    :root { --ab: #0e0f11; --as: #16181b; --abr: rgba(255,255,255,0.07); --aa: #e8c55a; --aa2: #c9a83c; --at: #f0ede8; --am: rgba(240,237,232,0.4); --ae: #e85a5a; --ai: rgba(255,255,255,0.05); --ar: 12px; }
    #auth-wall { position:fixed; inset:0; z-index:999999; background:var(--ab); display:flex; align-items:center; justify-content:center; font-family:'Mulish',sans-serif; overflow:hidden; }
    #auth-wall::before { content:''; position:absolute; inset:0; background-image:linear-gradient(rgba(232,197,90,0.03) 1px,transparent 1px),linear-gradient(90deg,rgba(232,197,90,0.03) 1px,transparent 1px); background-size:60px 60px; pointer-events:none; }
    #auth-wall::after { content:''; position:absolute; bottom:-200px; left:50%; transform:translateX(-50%); width:700px; height:400px; background:radial-gradient(ellipse,rgba(232,197,90,0.08) 0%,transparent 70%); pointer-events:none; }
    .auth-box { position:relative; z-index:1; width:100%; max-width:420px; padding:48px 44px; background:var(--as); border:1px solid var(--abr); border-radius:20px; box-shadow:0 0 0 1px rgba(232,197,90,0.06),0 40px 80px rgba(0,0,0,0.6),inset 0 1px 0 rgba(255,255,255,0.05); animation:authAppear 0.5s cubic-bezier(0.16,1,0.3,1) both; }
    @keyframes authAppear { from{opacity:0;transform:translateY(24px) scale(0.97)} to{opacity:1;transform:translateY(0) scale(1)} }
    .auth-logo { font-family:'Bebas Neue',sans-serif; font-size:52px; letter-spacing:6px; color:var(--at); text-align:center; margin-bottom:4px; line-height:1; }
    .auth-logo span { color:var(--aa); }
    .auth-subtitle { text-align:center; font-size:12px; font-weight:300; letter-spacing:3px; text-transform:uppercase; color:var(--am); margin-bottom:32px; }
    .auth-tabs { display:flex; background:rgba(255,255,255,0.04); border-radius:10px; padding:4px; margin-bottom:28px; }
    .auth-tab { flex:1; padding:10px; text-align:center; font-family:'Bebas Neue',sans-serif; font-size:15px; letter-spacing:2px; color:var(--am); cursor:pointer; border-radius:7px; transition:background 0.2s,color 0.2s; user-select:none; }
    .auth-tab.active { background:var(--aa); color:#0e0f11; }
    .auth-panel { display:none; }
    .auth-panel.active { display:block; animation:panelIn 0.25s ease both; }
    @keyframes panelIn { from{opacity:0;transform:translateY(6px)} to{opacity:1;transform:translateY(0)} }
    .auth-field { margin-bottom:16px; }
    .auth-field label { display:block; font-size:11px; font-weight:600; letter-spacing:2px; text-transform:uppercase; color:var(--am); margin-bottom:8px; }
    .auth-field input { width:100%; padding:14px 16px; background:var(--ai); border:1px solid var(--abr); border-radius:var(--ar); color:var(--at); font-family:'Mulish',sans-serif; font-size:15px; outline:none; transition:border-color 0.2s,background 0.2s,box-shadow 0.2s; box-sizing:border-box; }
    .auth-field input:focus { border-color:rgba(232,197,90,0.4); background:rgba(232,197,90,0.04); box-shadow:0 0 0 3px rgba(232,197,90,0.08); }
    .auth-field input::placeholder { color:rgba(240,237,232,0.2); }
    .auth-remember { display:flex; align-items:center; gap:10px; margin-bottom:24px; cursor:pointer; user-select:none; }
    .auth-remember input[type="checkbox"] { appearance:none; -webkit-appearance:none; width:18px; height:18px; min-width:18px; border:1px solid var(--abr); border-radius:5px; background:var(--ai); cursor:pointer; position:relative; transition:all 0.2s; }
    .auth-remember input[type="checkbox"]:checked { background:var(--aa); border-color:var(--aa); }
    .auth-remember input[type="checkbox"]:checked::after { content:''; position:absolute; top:3px; left:6px; width:4px; height:8px; border:2px solid #0e0f11; border-top:none; border-left:none; transform:rotate(45deg); }
    .auth-remember span { font-size:13px; color:var(--am); }
    .auth-btn { width:100%; padding:15px; background:var(--aa); color:#0e0f11; border:none; border-radius:var(--ar); font-family:'Bebas Neue',sans-serif; font-size:18px; letter-spacing:3px; cursor:pointer; transition:background 0.2s,transform 0.1s,box-shadow 0.2s; box-shadow:0 4px 20px rgba(232,197,90,0.25); }
    .auth-btn:hover { background:var(--aa2); }
    .auth-btn:active { transform:scale(0.98); }
    .auth-btn:disabled { opacity:0.5; cursor:not-allowed; transform:none; }
    .auth-msg { margin-top:14px; padding:12px 16px; border-radius:var(--ar); font-size:13px; text-align:center; display:none; }
    .auth-msg.error { background:rgba(232,90,90,0.08); border:1px solid rgba(232,90,90,0.2); color:var(--ae); animation:shake 0.4s ease; }
    .auth-msg.success { background:rgba(90,197,90,0.08); border:1px solid rgba(90,197,90,0.25); color:#7de07d; }
    .auth-msg.visible { display:block; }
    @keyframes shake { 0%,100%{transform:translateX(0)} 20%{transform:translateX(-6px)} 40%{transform:translateX(6px)} 60%{transform:translateX(-4px)} 80%{transform:translateX(4px)} }
    .sub-expired { text-align:center; }
    .sub-expired__icon { font-size:48px; margin-bottom:12px; }
    .sub-expired__title { font-family:'Bebas Neue',sans-serif; font-size:28px; letter-spacing:3px; color:var(--at); margin-bottom:8px; }
    .sub-expired__desc { font-size:14px; color:var(--am); margin-bottom:6px; line-height:1.5; }
    .sub-expired__date { font-size:13px; color:var(--ae); margin-bottom:24px; }
    .sub-expired__card { background:rgba(255,255,255,0.04); border:1px solid var(--abr); border-radius:var(--ar); padding:16px 20px; margin-bottom:16px; text-align:left; }
    .sub-expired__card-label { font-size:11px; letter-spacing:2px; text-transform:uppercase; color:var(--am); margin-bottom:8px; }
    .sub-expired__card-value { font-family:'Bebas Neue',sans-serif; font-size:22px; letter-spacing:3px; color:var(--aa); word-break:break-all; }
    .sub-expired__note { font-size:12px; color:var(--am); margin:0 0 16px; line-height:1.5; }
    .sub-expired__logout { background:transparent; border:1px solid var(--abr); color:var(--am); font-size:12px; padding:10px; border-radius:var(--ar); cursor:pointer; width:100%; font-family:'Mulish',sans-serif; transition:border-color 0.2s,color 0.2s; }
    .sub-expired__logout:hover { border-color:var(--am); color:var(--at); }
    #auth-wall.auth-hide { animation:authFade 0.5s ease forwards; }
    @keyframes authFade { to{opacity:0;pointer-events:none} }
    .auth-spinner { display:inline-block; width:16px; height:16px; border:2px solid rgba(14,15,17,0.3); border-top-color:#0e0f11; border-radius:50%; animation:spin 0.6s linear infinite; vertical-align:middle; margin-right:6px; }
    @keyframes spin { to{transform:rotate(360deg)} }
    .auth-pass-hint { font-size:11px; color:var(--am); margin-top:5px; min-height:16px; }
    .auth-pass-hint.weak { color:#e85a5a; }
    .auth-pass-hint.medium { color:#e8c55a; }
    .auth-pass-hint.strong { color:#7de07d; }
</style>

</head>
<body style="background: #1d1f20;">


<!-- AUTH WALL -->
<div id="auth-wall">
    <div class="auth-box" id="auth-box-inner">
        <div class="auth-logo">LAM<span>PA</span></div>
        <div class="auth-subtitle">Добро пожаловать</div>
        <div class="auth-tabs">
            <div class="auth-tab active" id="tab-login" onclick="authSwitchTab('login')">ВОЙТИ</div>
            <div class="auth-tab" id="tab-register" onclick="authSwitchTab('register')">РЕГИСТРАЦИЯ</div>
        </div>
        <div class="auth-panel active" id="panel-login">
            <div class="auth-field"><label for="auth-login">Логин</label><input type="text" id="auth-login" placeholder="username" autocomplete="username" autocapitalize="off" spellcheck="false"></div>
            <div class="auth-field"><label for="auth-pass">Пароль</label><input type="password" id="auth-pass" placeholder="••••••••" autocomplete="current-password"></div>
            <label class="auth-remember"><input type="checkbox" id="auth-remember" checked><span>Запомнить на 24 часа</span></label>
            <button class="auth-btn" id="auth-submit">ВОЙТИ</button>
            <div class="auth-msg error" id="auth-error"></div>
        </div>
        <div class="auth-panel" id="panel-register">
            <div class="auth-field"><label for="reg-login">Логин</label><input type="text" id="reg-login" placeholder="username" autocomplete="off" autocapitalize="off" spellcheck="false"></div>
            <div class="auth-field"><label for="reg-pass">Пароль</label><input type="password" id="reg-pass" placeholder="••••••••" autocomplete="new-password"><div class="auth-pass-hint" id="reg-pass-hint"></div></div>
            <div class="auth-field"><label for="reg-pass2">Повторите пароль</label><input type="password" id="reg-pass2" placeholder="••••••••" autocomplete="new-password"></div>
            <button class="auth-btn" id="reg-submit">ЗАРЕГИСТРИРОВАТЬСЯ</button>
            <div class="auth-msg error" id="reg-error"></div>
            <div class="auth-msg success" id="reg-success"></div>
        </div>
    </div>
</div>


<script>
    window.youtube_lazy_load = true
</script>

<div class="welcome"></div>

<div id="app">

</div>

<div class="no-network hide">
    <div class="no-network__title">Ошибка</div>
    <div class="no-network__desc">Не удалось загрузить файл: <span class="no-network__file"></span></div>
</div>

<script src="./webos/webOSTV.js"></script>
<script src="./vender/jquery/jquery.js"></script>
<script src="./vender/notify/notify.js"></script>
<script src="./vender/scrollbar/jquery.scrollbar.js"></script>
<script src="./vender/navigator/navigator.js"></script>
<script src="./vender/keypad/keypad.js"></script>

<script>
    var lampa_url     = '';
    var cache_version = Math.floor((new Date()).getTime() / 9e5); // Новое значение каждые 15 минут
        
    function urlJoin(base, add) {
        if (base.charAt(base.length - 1) !== '/') {
            base += '/'
        }

        return base + add
    }

    function putScript(scripts, onload, onerror){
        var add = function(src){
            console.log('Loader', 'try-load-script', src)

            var trys = 0

            var sreateScript = function(){
                var script = document.createElement('script')

                script.type = 'text/javascript'

                script.onload = script.onreadystatechange = function(e) {
                    console.log('Loader', 'Script loaded', e)

                    if (!!onload) onload()
                };

                script.onerror = function(){
                    trys++

                    console.log('Loader', 'error-load-script', src)

                    if(trys < 3){
                        sreateScript()
                    } else if (!!onerror) {
                        onerror()
                    } else{
                        $('.no-network').removeClass('hide')

                        $('.no-network__file').text(window.location.href + '/' + src)
                    }
                }

                script.src = src

                document.getElementsByTagName('body')[0].appendChild(script)
            }

            sreateScript()
        }

        add(scripts)
    }

    function loadCurrentLampa() {
        putScript('app.min.js?v=' + cache_version, function () {})
    }

    function loadLocalLampa(){
        if(lampa_url !== '') window.local_lampa = true

        loadCurrentLampa()
    }

    if (typeof AndroidJS !== "undefined"
        && !!AndroidJS.getLampaURL
        && /^https?:\/\//i.test(AndroidJS.getLampaURL())
        && !/^https?:\/\//i.test(location.href)
    ) {
        lampa_url = urlJoin(AndroidJS.getLampaURL(),'')
    }

    if (lampa_url !== '') {
        putScript(
            urlJoin(lampa_url, 'lampainit.js?v=' + cache_version),
            false,
            function(){}
        )

        putScript(
            urlJoin(lampa_url, 'app.min.js?v=' + cache_version),
            function () {
                var css = urlJoin(lampa_url, 'css/app.css?v=' + cache_version)

                $('head').append('<link rel="stylesheet" href="' + css + '">')
            },
            function () {
                putScript(
                    urlJoin(lampa_url, 'lampa-main/app.min.js?v=' + cache_version),
                    function () {
                        var css = urlJoin(lampa_url, 'lampa-main/css/app.css?v=' + cache_version)

                        $('head').append('<link rel="stylesheet" href="' + css + '">')

                        putScript(
                            urlJoin(lampa_url, 'lampainit.js?v=' + cache_version),
                            false,
                            function(){}
                        )
                    },
                    loadLocalLampa
                )
            }
        )
    }
    else{
        loadCurrentLampa()
    }
</script>

<!-- AUTH JS -->
<script>
(function(){
    var API      = 'https://lampac.pegakmop.crazedns.ru/api.php';
    var PAY_LBL  = 'Номер карты для оплаты';
    var PAY_VAL  = '2200700768833807'; /* ← СВОЙ НОМЕР КАРТЫ */
    var S_KEY    = 'lampa_auth';
    var S_TTL    = 86400000; // 24ч

    function getSession(){ try{ var d=JSON.parse(localStorage.getItem(S_KEY)||'null'); if(!d) return null; if(Date.now()>d.e){localStorage.removeItem(S_KEY);return null;} return d; }catch(e){return null;} }
    function saveSession(u){ localStorage.setItem(S_KEY,JSON.stringify({u:u,e:Date.now()+S_TTL})); }
    function clearSession(){ localStorage.removeItem(S_KEY); }
    function authApi(data){ return fetch(API,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(data)}).then(function(r){return r.json();}); }

    function hideWall(){ var w=document.getElementById('auth-wall'); w.classList.add('auth-hide'); setTimeout(function(){if(w.parentNode)w.parentNode.removeChild(w);},500); }
    function authLogout(){ clearSession(); location.reload(); }

    function showMsg(id,txt,type){ var el=document.getElementById(id); if(!el)return; el.textContent=txt; el.className='auth-msg '+(type||'error'); el.classList.remove('visible'); void el.offsetWidth; el.classList.add('visible'); }

    function authSwitchTab(tab){
        ['login','register'].forEach(function(t){ document.getElementById('tab-'+t).classList.toggle('active',t===tab); document.getElementById('panel-'+t).classList.toggle('active',t===tab); });
        ['auth-error','reg-error','reg-success'].forEach(function(id){ var el=document.getElementById(id); if(el)el.classList.remove('visible'); });
        setTimeout(function(){ var el=document.getElementById(tab==='login'?'auth-login':'reg-login'); if(el)el.focus(); },50);
    }

    function showExpired(u,exp){
        var fmt=exp?exp.split('-').reverse().join('.'):'—';
        document.getElementById('auth-box-inner').innerHTML='<div class="sub-expired"><div class="sub-expired__icon">🔒</div><div class="sub-expired__title">Подписка истекла</div><div class="sub-expired__desc">Привет, <strong>'+u+'</strong>!<br>Доступ приостановлен.</div><div class="sub-expired__date">Дата истечения: '+fmt+'</div><div class="sub-expired__card"><div class="sub-expired__card-label">'+PAY_LBL+'</div><div class="sub-expired__card-value">'+PAY_VAL+'</div></div><p class="sub-expired__note">После оплаты напишите нам — доступ восстановим вручную.</p><button class="sub-expired__logout" onclick="authLogout()">Выйти</button></div>';
    }

    // Делаем authLogout и authSwitchTab глобальными (используются в onclick)
    window.authLogout = authLogout;
    window.authSwitchTab = authSwitchTab;

    var session = getSession();
    if(session){
        authApi({ action:'check_sub', username:session.u })
            .then(function(res){
                if(!res.ok || res.expired){
                    showExpired(session.u, res.subscription_expires);
                } else {
                    hideWall();
                }
            })
            .catch(function(){
                hideWall(); // нет связи — пускаем
            });
        return;
    }

    // Логин
    var submitBtn=document.getElementById('auth-submit');
    var loginInput=document.getElementById('auth-login');
    var passInput=document.getElementById('auth-pass');
    loginInput.focus();

    function handleLogin(){
        var u=loginInput.value.trim(), p=passInput.value;
        if(!u||!p){ showMsg('auth-error','Заполните все поля'); return; }
        submitBtn.disabled=true;
        submitBtn.innerHTML='<span class="auth-spinner"></span>ВХОД...';
        authApi({action:'login',username:u,password:p}).then(function(res){
            if(!res.ok){ showMsg('auth-error',res.error||'Ошибка входа'); submitBtn.disabled=false; submitBtn.innerHTML='ВОЙТИ'; passInput.value=''; passInput.focus(); return; }
            if(document.getElementById('auth-remember').checked) saveSession(u);
            if(res.expired){ showExpired(u,res.subscription_expires); }
            else { hideWall(); }
        }).catch(function(){ showMsg('auth-error','Ошибка соединения'); submitBtn.disabled=false; submitBtn.innerHTML='ВОЙТИ'; });
    }

    submitBtn.addEventListener('click',handleLogin);
    [loginInput,passInput].forEach(function(el){ el.addEventListener('keydown',function(e){ if(e.key==='Enter') handleLogin(); }); });

    // Регистрация
    var regBtn=document.getElementById('reg-submit');
    var regLogin=document.getElementById('reg-login');
    var regPass=document.getElementById('reg-pass');
    var regPass2=document.getElementById('reg-pass2');

    regPass.addEventListener('input',function(){
        var p=regPass.value, hint=document.getElementById('reg-pass-hint');
        if(!p){hint.textContent='';hint.className='auth-pass-hint';return;}
        var s=0; if(p.length>=8)s++; if(/[A-Z]/.test(p))s++; if(/[0-9]/.test(p))s++; if(/[^A-Za-z0-9]/.test(p))s++;
        if(s<=1){hint.textContent='Слабый пароль';hint.className='auth-pass-hint weak';}
        else if(s===2){hint.textContent='Средний пароль';hint.className='auth-pass-hint medium';}
        else{hint.textContent='Надёжный пароль';hint.className='auth-pass-hint strong';}
    });

    function handleRegister(){
        var u=regLogin.value.trim(), p=regPass.value, p2=regPass2.value;
        if(!u||!p||!p2){showMsg('reg-error','Заполните все поля');return;}
        if(p!==p2){showMsg('reg-error','Пароли не совпадают');return;}
        regBtn.disabled=true; regBtn.innerHTML='<span class="auth-spinner"></span>СОЗДАНИЕ...';
        authApi({action:'register',username:u,password:p}).then(function(res){
            if(res.ok){ showMsg('reg-success','Аккаунт создан! Войдите.','success'); regLogin.value=''; regPass.value=''; regPass2.value=''; document.getElementById('reg-pass-hint').textContent=''; setTimeout(function(){ authSwitchTab('login'); document.getElementById('auth-login').value=u; document.getElementById('auth-pass').focus(); },2000); }
            else showMsg('reg-error',res.error||'Ошибка регистрации');
        }).catch(function(){showMsg('reg-error','Ошибка соединения');}).finally(function(){regBtn.disabled=false;regBtn.innerHTML='ЗАРЕГИСТРИРОВАТЬСЯ';});
    }

    regBtn.addEventListener('click',handleRegister);
    [regLogin,regPass,regPass2].forEach(function(el){ el.addEventListener('keydown',function(e){ if(e.key==='Enter') handleRegister(); }); });
})();
</script>

</body>
</html>
