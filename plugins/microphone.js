(function() {

  if (!window.navigator) window.navigator = {};

    //if getuserMedia is called -> If the user requests native camera

        window.navigator.getUserMedia = function() {

            webkit.messageHandlers.callbackHandler.postMessage(arguments);

  }

})();
