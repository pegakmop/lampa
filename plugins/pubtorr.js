(function () {
    'use strict';

    // откладываем выполнение на 5 секунд
    setTimeout(function () {

        // уникальный ID
        var unic_id = Lampa.Storage.get('lampac_unic_id', '');
        if (!unic_id) {
            unic_id = Lampa.Utils.uid(8).toLowerCase();
            Lampa.Storage.set('lampac_unic_id', unic_id);
        }

        // --- основной сервер с авторизацией
        Lampa.Storage.set('torrserver_use_link', 'two');
        Lampa.Storage.set('torrserver_url', 'https://lam.maxvol.pro/ts');
        Lampa.Storage.set('torrserver_auth', 'true');
        Lampa.Storage.set('torrserver_login', Lampa.Storage.get('account_email') || unic_id || 'ts');
        Lampa.Storage.set('torrserver_password', 'ts');

        // --- публичный сервер без авторизации
        var public_servers = [
            "http://ts.maxvol.pro",
            "http://188.235.146.53:8090",
            "http://88.87.92.183:8090",
            "http://92.255.196.196:48090"
        ];

        // выбираем случайный
        var server = public_servers[Math.floor(Math.random() * public_servers.length)];
        Lampa.Storage.set('torrserver_url_two', server);
        Lampa.Storage.set('torrserver_auth_two', 'false');

    }, 1000); // 5 секунд

})();