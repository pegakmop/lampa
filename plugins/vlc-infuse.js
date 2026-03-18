(function () {
    'use strict';

    var PLUGIN_NAME = 'InfuseVlcSaver';
    var BASE_URL = 'https://lampac.pegakmop.crazedns.ru';

    var SVG_ICON = '<svg style="width:24px;height:24px;margin-right:8px;vertical-align:middle" viewBox="0 0 85 85" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.937" fill-rule="evenodd" clip-rule="evenodd" d="M50.5 19.5C45.4453 22.2488 42.7786 26.5821 42.5 32.5C37.6434 28.9084 32.6434 25.575 27.5 22.5C27.4226 21.2502 26.756 20.4169 25.5 20C19.7659 18.3702 15.7659 20.2035 13.5 25.5C13.1667 25.5 12.8333 25.5 12.5 25.5C11.357 10.9033 18.0237 4.73664 32.5 7C38.7408 10.9426 44.7408 15.1092 50.5 19.5Z" fill="#FE6700"/><path opacity="0.944" fill-rule="evenodd" clip-rule="evenodd" d="M12.5 41.5C17.5 41.5 22.5 41.5 27.5 41.5C27.6658 46.1785 27.4992 50.8452 27 55.5C22.2391 60.8119 17.5724 60.8119 13 55.5C12.5008 50.8452 12.3342 46.1785 12.5 41.5Z" fill="#FE6600"/></svg>';

    var VLC_ICON = '<svg style="width:24px;height:24px;margin-right:8px;vertical-align:middle" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="12" fill="#FF8800"/><polygon points="9,7 19,12 9,17" fill="white"/></svg>';

    function getUrl(element) {
        var url = element.url || element.magnet || '';
        return url.replace('&preload', '&play').replace(/\s/g, '%20');
    }

    function saveAndOpen(urls, app) {
        fetch(BASE_URL + '/save.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ urls: urls })
        })
        .then(function(r) { return r.json(); })
        .then(function(data) {
            if (!data.ok) throw new Error('save failed');
            if (app === 'vlc') {
                window.location.assign('vlc-x-callback://x-callback-url/stream?url=' + encodeURIComponent(BASE_URL + '/vlc.m3u'));
            } else if (app === 'infuse') {
                window.location.assign('infuse://x-callback-url/save?url=' + encodeURIComponent(BASE_URL + '/infuse.links'));
            }
        })
        .catch(function(e) {
            Lampa.Noty.show('Ошибка: ' + e.message);
        });
    }

    function addMenuItems(data) {
        var url = getUrl(data.element);
        if (!url) return;

        // Infuse - одиночный файл
        data.menu.push({
            title: '<div style="display:flex;align-items:center">' + SVG_ICON + 'Save to Infuse</div>',
            onSelect: function () {
                window.location.assign('infuse://x-callback-url/save?url=' + encodeURIComponent(url));
            }
        });

        // VLC - одиночный файл
        data.menu.push({
            title: '<div style="display:flex;align-items:center">' + VLC_ICON + 'Play in VLC</div>',
            onSelect: function () {
                window.location.assign('vlc-x-callback://x-callback-url/stream?url=' + encodeURIComponent(url));
            }
        });

        if (data.items && data.items.length > 1) {
            var allUrls = data.items.map(function(i) { return i.url || ''; }).filter(Boolean);

            // Infuse - все серии
            data.menu.push({
                title: '<div style="display:flex;align-items:center">' + SVG_ICON + 'Save all to Infuse</div>',
                onSelect: function () {
                    saveAndOpen(allUrls, 'infuse');
                }
            });

            // VLC - все серии через m3u
            data.menu.push({
                title: '<div style="display:flex;align-items:center">' + VLC_ICON + 'Play all in VLC</div>',
                onSelect: function () {
                    saveAndOpen(allUrls, 'vlc');
                }
            });
        }
    }

    function init() {
        Lampa.Listener.follow('torrent_file', function (data) {
            if (data.type === 'onlong') {
                addMenuItems(data);
            }
        });

        Lampa.Listener.follow('torrent', function (data) {
            if (data.type === 'onlong' && data.menu) {
                addMenuItems(data);
            }
        });

        console.log('[' + PLUGIN_NAME + '] started');
    }

    function startPlugin() {
        if (window[PLUGIN_NAME + '_ready']) return;
        window[PLUGIN_NAME + '_ready'] = true;

        if (window.appready) {
            init();
        } else {
            Lampa.Listener.follow('app', function (e) {
                if (e.type === 'ready') init();
            });
        }
    }

    startPlugin();

})();
