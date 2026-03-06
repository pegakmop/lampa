(function () {
    'use strict';
	
    var timer = setInterval(function(){
        if(typeof Lampa !== 'undefined'){
            clearInterval(timer);

            if(!Lampa.Storage.get('lampac_initiale','false')) start();
			
            window.lampa_settings.torrents_use = false;
            window.lampa_settings.demo = false;
            window.lampa_settings.read_only = false;
			
            
			
            function addStore(){if(Lampa.Settings.main&&!Lampa.Settings.main().render().find('[data-component="pirate_store"]').length){var field=$(Lampa.Lang.translate("<div class=\"settings-folder selector\" data-component=\"pirate_store\" data-static=\"true\">\n\t\t\t<div class=\"settings-folder__icon\">\n\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" version=\"1.1\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"512\" height=\"512\" x=\"0\" y=\"0\" viewBox=\"0 0 490 490\" xml:space=\"preserve\"><path d=\"M153.125 317.435h183.75v30.625h-183.75z\" fill=\"white\"></path><circle cx=\"339.672\" cy=\"175.293\" r=\"42.642\" fill=\"white\"></circle><path d=\"M420.914 0H69.086C30.999 0 0 30.999 0 69.086v351.829C0 459.001 30.999 490 69.086 490h351.829C459.001 490 490 459.001 490 420.914V69.086C490 30.999 459.001 0 420.914 0zM69.086 30.625h237.883c-17.146 20.912-42.277 47.893-75.177 74.575-9.514-12.906-26.35-19.331-42.586-14.613l-69.644 20.242c-20.778 6.039-32.837 27.98-26.798 48.758l6.475 22.278c-21.375 8-44.353 14.456-68.614 19.267V69.086c0-21.204 17.257-38.461 38.461-38.461zm390.289 390.289c0 21.204-17.257 38.461-38.461 38.461H69.086c-21.204 0-38.461-17.257-38.461-38.461V232.459c27.504-4.993 53.269-12.075 77.268-20.816l3.811 13.111c6.038 20.778 27.98 32.837 48.758 26.799l69.643-20.242c20.778-6.039 32.837-27.98 26.799-48.758l-13.481-46.382c50.532-39.47 84.67-80.759 102.687-105.546h74.805c21.204 0 38.461 17.257 38.461 38.461v351.828z\" fill=\"white\"></path></svg>\n\t\t\t</div>\n\t\t\t<div class=\"settings-folder__name\">\u041F\u043B\u0430\u0433\u0438\u043D\u044B</div>\n\t\t</div>"));Lampa.Settings.main().render().find('[data-component="more"]').after(field);Lampa.Settings.main().update();}}Lampa.Settings.listener.follow('open',function(e){if(e.name=='main'){e.body.find('[data-component="pirate_store"]').on('hover:enter',function(){Lampa.Extensions.show({store:'http://q900950b.beget.tech/extensions', with_installed: true});});}});if(window.appready)addStore();else {Lampa.Listener.follow('app',function(e){if(e.type=='ready')addStore();});}
        }
    },200);
	
	var dcma_timer = setInterval(function(){
	  if(typeof window.lampa_settings != 'undefined' && (window.lampa_settings.fixdcma || window.lampa_settings.dcma)){
		clearInterval(dcma_timer)
		if (window.lampa_settings.dcma)
			window.lampa_settings.dcma = false;
	  }
	},100);

	function start(){
        Lampa.Storage.set('lampac_initiale','true');
        Lampa.Storage.set('source','tmdb');
        Lampa.Storage.set('proxy_tmdb','true');
        Lampa.Storage.set('poster_size','w200');
        Lampa.Storage.set('card_interfice_reactions', 'false');
        Lampa.Storage.set('skazonline2_view', 'false');
        Lampa.Storage.set('parser_use','true');
        	/*Удаляем ненужное из главного меню*/

  Lampa.Listener.follow('app', function (e) {
     if (e.type == 'ready') {
             setTimeout(function(){
                        //$("[data-action=anime]").eq(0).remove();
                        $("[data-action=relise]").eq(0).remove();
                        $("[data-action=mytorrents]").eq(0).remove();
                        $("[data-action=about]").eq(0).remove();
                        $("[data-action=console]").eq(0).remove();
                        $("[data-action=feed]").eq(0).remove();
                        $("[data-action=timetable]").eq(0).remove();
                        $("[data-action=subscribes]").eq(0).remove();
                        //$("[data-action=settings]").eq(0).remove();
             },10);
     }
  });
        
        if (!Lampa.Storage.get('player_def')) {
            Lampa.Storage.set('player','inner');
            Lampa.Storage.set('player_iptv','inner');
        if (Lampa.Platform.is('apple')) {
            Lampa.Storage.set('player_iptv','inner');
            Lampa.Storage.set('player','inner');
        } 
            Lampa.Storage.set('player_def', true);
        }
        
        
        Lampa.Storage.set('jackett_url','redapi.cfhttp.top');
        Lampa.Storage.set('jackett_key','1');
        Lampa.Storage.set('parser_torrent_type','jackett');
        Lampa.Storage.set('skazonline2_view', 'false');
		
        var unic_id = Lampa.Storage.get('lampac_unic_id', '');

        if (!unic_id) {
			unic_id = Lampa.Utils.uid(8).toLowerCase();
			Lampa.Storage.set('lampac_unic_id', unic_id);
        }

        var plugins = Lampa.Plugins.get();

        var plugins_add = [
			{"url": "kinopoisk.js","status": 1,"name": "KP","author": "lampac"},{"url": "cub_off.js","status": 1,"name": "cub_off.js","author": "lampac"},{"url": "https://lam.maxvol.pro/tmdbproxy.js","status": 1,"name": "TMDB Proxy","author": "lampac"},{"url": "https://lam.maxvol.pro/online.js","status": 1,"name": "Онлайн","author": "lampac"},{"url": "https://lam.maxvol.pro/sisi.js","status": 1,"name": "Клубничка","author": "lampac"},{"url": "otzyv.js","status": 1,"name": "отзывы","author": "lampac"},{"url": "https://lam.maxvol.pro/startpage.js","status": 1,"name": "start","author": "lampac"}
        ];

        var plugins_push = []

        plugins_add.forEach(function(plugin){
            if(!plugins.find(function(a){ return a.url == plugin.url})){
                Lampa.Plugins.add(plugin);
                Lampa.Plugins.save();

                plugins_push.push(plugin.url)
            }
        });

        if(plugins_push.length) Lampa.Utils.putScript(plugins_push,function(){},function(){},function(){},true);

        /*
        setTimeout(function(){
            Lampa.Noty.show('Плагины установлены, перезагрузка через 5 секунд.',{time: 5000})
        },5000)
        
