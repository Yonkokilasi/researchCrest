/**
 * Visit js
 */
(function() {
    var host = '//api.visits.essayprofit.com/index.php';
    var cidVariable = 'epcid';
    var ep_source  = 'ep_source';
    var vidVariable = 'vid';
	var promoVariable = 'promoid';
    var keyVariable = 'key';
    var hostVariable = 'host';
    window.urlVars = getUrlVars();
    if(window.location.hash){
        window.location.hash = '';
    }

    var tid = setInterval(function() {
		if (document.readyState !== 'complete') return;
		clearInterval(tid);
		init();
    }, 100);

    function init() {

		if (!window.jQuery) {
		    var jq = document.createElement('script');
		    jq.type = 'text/javascript';
		    jq.src = '//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js';
		    document.getElementsByTagName('head')[0].appendChild(jq);
		    jq.addEventListener('load', function(){
				$(document).ready(function() {
				    return init();
				});
		    }, false);
		    return;
		}
		//jQuery.noConflict();
		jQuery(document).ready(function() {
		    var hostname = window.location.hostname;
		    var pathname = window.location.pathname;
		    var referrer = document.referrer;
	        var epSource = window.urlVars[ep_source] || null;
	        var cidFromGet = window.urlVars[cidVariable] || null;
	        var promoFromGet = window.urlVars[promoVariable] || null;
	        var keyFromGet = window.urlVars[keyVariable] || '';
	        var hostFromGet = window.urlVars[hostVariable] || '';
            var epcid = window['epcid'] || undefined;
		    var cidFromCookie = getCookie(cidVariable);

            if (promoFromGet !== null) {
                setCookie(promoVariable, promoFromGet, 360, '/');
            }

            if(epSource !== null){
                setCookie(ep_source, epSource, 360, '/')
            }

            if ((cidFromGet !== null || cidFromCookie !== null || epcid !== undefined) && (!(referrer.indexOf(hostname) + 1))) {
                if(epcid !== undefined){
				    setCookie(cidVariable, epcid, 360, '/');
				    cidFromCookie = epcid;
				}   else if (cidFromGet !== null) {
                    setCookie(cidVariable, cidFromGet, 360, '/');
                    cidFromCookie = cidFromGet;
                }

                var randomInt = getIdInt();
                setCookie(vidVariable, randomInt, true, '/');
                jQuery.ajax({
				    url: host,
				    data: {
						hostname : hostname,
						pathname : pathname,
						referrer : referrer,
						cid : cidFromCookie,
			            vid : randomInt,
			            se_host: decodeURIComponent(hostFromGet),
			            se_key: decodeURIComponent(keyFromGet),
			            action: 'setVisit'
				    },
				    timeout: 5000,
				    dataType: 'jsonp',
				    jsonp: 'callback',
				    error: function(data) {
						//console.log(data);
				    }
				});
		    }
		});
    }

    function getIdInt()	{
		var min = 1;
		var max = 999999999;
		  return Math.floor(Math.random() * (max - min + 1)) + min;
	}

    function getUrlVars() {
	    var params = {},
            query,
            getVar,
            i;
        // used for old sites with epcid in location.search
        if(window.location.search){
            query = window.location.search.substring(1).split('&');
	  	    for (i = 0; i < query.length; i++) {
		        getVar = query[i].split('=');
		        params[getVar[0]] = typeof(getVar[1]) == 'undefined' ? '' : getVar[1];
		    }
        }

        if(window.location.hash){
            query = window.location.hash.substring(1).split('&');
	  	    for (i = 0; i < query.length; i++) {
		        getVar = query[i].split('=');
		        params[getVar[0]] = typeof(getVar[1]) == 'undefined' ? '' : getVar[1];
		    }
        }
	    return params;
    }

    function setCookie(name, value, expireDays, path, domain, secure) {
		var cookieString = name + "=" + encodeURIComponent(value);
		if (expireDays) {
		    var expireDate = new Date();
			expireDate.setDate(expireDate.getDate() + expireDays);
		    cookieString += "; expires=" + expireDate.toUTCString();
		}
		if (path) cookieString += "; path=" + encodeURIComponent(path);
		if (domain) cookieString += "; domain=" + encodeURIComponent(domain);
		if (secure) cookieString += "; secure";
			document.cookie = cookieString;
    }

    function getCookie(cookieName) {
		//noinspection JSCheckFunctionSignatures
        var results = document.cookie.match('(^|;) ?' + cookieName + '=([^;]*)(;|$)');
		return (results) ? (decodeURIComponent(results[2])) : null;
    }
})();
