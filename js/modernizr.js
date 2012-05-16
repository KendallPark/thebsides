/* Modernizr 2.5.3 (Custom Build) | MIT & BSD
 * Build: http://www.modernizr.com/download/#-fontface-backgroundsize-borderimage-borderradius-boxshadow-flexbox-flexbox_legacy-hsla-multiplebgs-opacity-rgba-textshadow-cssanimations-csscolumns-generatedcontent-cssgradients-cssreflections-csstransforms-csstransforms3d-csstransitions-applicationcache-canvas-canvastext-draganddrop-hashchange-history-audio-video-indexeddb-input-inputtypes-localstorage-postmessage-sessionstorage-websockets-websqldatabase-webworkers-geolocation-inlinesvg-smil-svg-svgclippaths-touch-webgl-printshiv-mq-cssclasses-addtest-prefixed-teststyles-testprop-testallprops-hasevent-prefixes-domprefixes-a_download-audio_audiodata_api-audio_webaudio_api-battery_api-battery_level-canvas_todataurl_type-contenteditable-contextmenu-cookies-cors-css_backgroundcliptext-css_backgroundrepeat-css_backgroundsizecover-css_boxsizing-css_cubicbezierrange-css_displayrunin-css_displaytable-css_hyphens-css_mask-css_mediaqueries-css_overflow_scrolling-css_pointerevents-css_remunit-css_resize-css_scrollbars-css_userselect-custom_protocol_handler-dataview_api-dom_classlist-dom_createElement_attrs-dom_dataset-dom_microdata-elem_datalist-elem_details-elem_output-elem_progress_meter-elem_ruby-elem_time-elem_track-emoji-es5_strictmode-event_deviceorientation_motion-file_api-file_filesystem-forms_placeholder-forms_speechinput-forms_validation-fullscreen_api-gamepad-getusermedia-ie8compat-img_apng-img_webp-json-lists_reversed-mathml-network_connection-network_eventsource-notification-performance-quota_management_api-requestanimationframe-script_async-script_defer-unicode-url_data_uri-userdata-web_intents-webgl_extensions-websockets_binary-window_framed-workers_blobworkers-workers_dataworkers-workers_sharedworkers-load
 */
;window.Modernizr=function(a,b,c){function D(a){j.cssText=a}function E(a,b){return D(n.join(a+";")+(b||""))}function F(a,b){return typeof a===b}function G(a,b){return!!~(""+a).indexOf(b)}function H(a,b){for(var d in a)if(j[a[d]]!==c)return b=="pfx"?a[d]:!0;return!1}function I(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:F(f,"function")?f.bind(d||b):f}return!1}function J(a,b,c){var d=a.charAt(0).toUpperCase()+a.substr(1),e=(a+" "+p.join(d+" ")+d).split(" ");return F(b,"string")||F(b,"undefined")?H(e,b):(e=(a+" "+q.join(d+" ")+d).split(" "),I(e,b,c))}function L(){e.input=function(c){for(var d=0,e=c.length;d<e;d++)u[c[d]]=c[d]in k;return u.list&&(u.list=!!b.createElement("datalist")&&!!a.HTMLDataListElement),u}("autocomplete autofocus list placeholder max min multiple pattern required step".split(" ")),e.inputtypes=function(a){for(var d=0,e,f,h,i=a.length;d<i;d++)k.setAttribute("type",f=a[d]),e=k.type!=="text",e&&(k.value=l,k.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(f)&&k.style.WebkitAppearance!==c?(g.appendChild(k),h=b.defaultView,e=h.getComputedStyle&&h.getComputedStyle(k,null).WebkitAppearance!=="textfield"&&k.offsetHeight!==0,g.removeChild(k)):/^(search|tel)$/.test(f)||(/^(url|email)$/.test(f)?e=k.checkValidity&&k.checkValidity()===!1:/^color$/.test(f)?(g.appendChild(k),g.offsetWidth,e=k.value!=l,g.removeChild(k)):e=k.value!=l)),t[a[d]]=!!e;return t}("search tel url email datetime date month week time datetime-local number range color".split(" "))}var d="2.5.3",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k=b.createElement("input"),l=":)",m={}.toString,n=" -webkit- -moz- -o- -ms- ".split(" "),o="Webkit Moz O ms",p=o.split(" "),q=o.toLowerCase().split(" "),r={svg:"http://www.w3.org/2000/svg"},s={},t={},u={},v=[],w=v.slice,x,y=function(a,c,d,e){var f,i,j,k=b.createElement("div"),l=b.body,m=l?l:b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),k.appendChild(j);return f=["&#173;","<style>",a,"</style>"].join(""),k.id=h,(l?k:m).innerHTML+=f,m.appendChild(k),l||(m.style.background="",g.appendChild(m)),i=c(k,a),l?k.parentNode.removeChild(k):m.parentNode.removeChild(m),!!i},z=function(b){var c=a.matchMedia||a.msMatchMedia;if(c)return c(b).matches;var d;return y("@media "+b+" { #"+h+" { position: absolute; } }",function(b){d=(a.getComputedStyle?getComputedStyle(b,null):b.currentStyle)["position"]=="absolute"}),d},A=function(){function d(d,e){e=e||b.createElement(a[d]||"div"),d="on"+d;var f=d in e;return f||(e.setAttribute||(e=b.createElement("div")),e.setAttribute&&e.removeAttribute&&(e.setAttribute(d,""),f=F(e[d],"function"),F(e[d],"undefined")||(e[d]=c),e.removeAttribute(d))),e=null,f}var a={select:"input",change:"input",submit:"form",reset:"form",error:"img",load:"img",abort:"img"};return d}(),B={}.hasOwnProperty,C;!F(B,"undefined")&&!F(B.call,"undefined")?C=function(a,b){return B.call(a,b)}:C=function(a,b){return b in a&&F(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=w.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(w.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(w.call(arguments)))};return e});var K=function(c,d){var f=c.join(""),g=d.length;y(f,function(c,d){var f=b.styleSheets[b.styleSheets.length-1],h=f?f.cssRules&&f.cssRules[0]?f.cssRules[0].cssText:f.cssText||"":"",i=c.childNodes,j={};while(g--)j[i[g].id]=i[g];e.touch="ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch||(j.touch&&j.touch.offsetTop)===9,e.csstransforms3d=(j.csstransforms3d&&j.csstransforms3d.offsetLeft)===9&&j.csstransforms3d.offsetHeight===3,e.generatedcontent=(j.generatedcontent&&j.generatedcontent.offsetHeight)>=1,e.fontface=/src/i.test(h)&&h.indexOf(d.split(" ")[0])===0},g,d)}(['@font-face {font-family:"font";src:url("https://")}',["@media (",n.join("touch-enabled),("),h,")","{#touch{top:9px;position:absolute}}"].join(""),["@media (",n.join("transform-3d),("),h,")","{#csstransforms3d{left:9px;position:absolute;height:3px;}}"].join(""),['#generatedcontent:after{content:"',l,'";visibility:hidden}'].join("")],["fontface","touch","csstransforms3d","generatedcontent"]);s.flexbox=function(){return J("flexOrder")},s["flexbox-legacy"]=function(){return J("boxDirection")},s.canvas=function(){var a=b.createElement("canvas");return!!a.getContext&&!!a.getContext("2d")},s.canvastext=function(){return!!e.canvas&&!!F(b.createElement("canvas").getContext("2d").fillText,"function")},s.webgl=function(){try{var d=b.createElement("canvas"),e;e=!(!a.WebGLRenderingContext||!d.getContext("experimental-webgl")&&!d.getContext("webgl")),d=c}catch(f){e=!1}return e},s.touch=function(){return e.touch},s.geolocation=function(){return!!navigator.geolocation},s.postmessage=function(){return!!a.postMessage},s.websqldatabase=function(){return!!a.openDatabase},s.indexedDB=function(){return!!J("indexedDB",a)},s.hashchange=function(){return A("hashchange",a)&&(b.documentMode===c||b.documentMode>7)},s.history=function(){return!!a.history&&!!history.pushState},s.draganddrop=function(){var a=b.createElement("div");return"draggable"in a||"ondragstart"in a&&"ondrop"in a},s.websockets=function(){for(var b=-1,c=p.length;++b<c;)if(a[p[b]+"WebSocket"])return!0;return"WebSocket"in a},s.rgba=function(){return D("background-color:rgba(150,255,150,.5)"),G(j.backgroundColor,"rgba")},s.hsla=function(){return D("background-color:hsla(120,40%,100%,.5)"),G(j.backgroundColor,"rgba")||G(j.backgroundColor,"hsla")},s.multiplebgs=function(){return D("background:url(https://),url(https://),red url(https://)"),/(url\s*\(.*?){3}/.test(j.background)},s.backgroundsize=function(){return J("backgroundSize")},s.borderimage=function(){return J("borderImage")},s.borderradius=function(){return J("borderRadius")},s.boxshadow=function(){return J("boxShadow")},s.textshadow=function(){return b.createElement("div").style.textShadow===""},s.opacity=function(){return E("opacity:.55"),/^0.55$/.test(j.opacity)},s.cssanimations=function(){return J("animationName")},s.csscolumns=function(){return J("columnCount")},s.cssgradients=function(){var a="background-image:",b="gradient(linear,left top,right bottom,from(#9f9),to(white));",c="linear-gradient(left top,#9f9, white);";return D((a+"-webkit- ".split(" ").join(b+a)+n.join(c+a)).slice(0,-a.length)),G(j.backgroundImage,"gradient")},s.cssreflections=function(){return J("boxReflect")},s.csstransforms=function(){return!!J("transform")},s.csstransforms3d=function(){var a=!!J("perspective");return a&&"webkitPerspective"in g.style&&(a=e.csstransforms3d),a},s.csstransitions=function(){return J("transition")},s.fontface=function(){return e.fontface},s.generatedcontent=function(){return e.generatedcontent},s.video=function(){var a=b.createElement("video"),c=!1;try{if(c=!!a.canPlayType)c=new Boolean(c),c.ogg=a.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),c.h264=a.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),c.webm=a.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,"")}catch(d){}return c},s.audio=function(){var a=b.createElement("audio"),c=!1;try{if(c=!!a.canPlayType)c=new Boolean(c),c.ogg=a.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),c.mp3=a.canPlayType("audio/mpeg;").replace(/^no$/,""),c.wav=a.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),c.m4a=(a.canPlayType("audio/x-m4a;")||a.canPlayType("audio/aac;")).replace(/^no$/,"")}catch(d){}return c},s.localstorage=function(){try{return localStorage.setItem(h,h),localStorage.removeItem(h),!0}catch(a){return!1}},s.sessionstorage=function(){try{return sessionStorage.setItem(h,h),sessionStorage.removeItem(h),!0}catch(a){return!1}},s.webworkers=function(){return!!a.Worker},s.applicationcache=function(){return!!a.applicationCache},s.svg=function(){return!!b.createElementNS&&!!b.createElementNS(r.svg,"svg").createSVGRect},s.inlinesvg=function(){var a=b.createElement("div");return a.innerHTML="<svg/>",(a.firstChild&&a.firstChild.namespaceURI)==r.svg},s.smil=function(){return!!b.createElementNS&&/SVGAnimate/.test(m.call(b.createElementNS(r.svg,"animate")))},s.svgclippaths=function(){return!!b.createElementNS&&/SVGClipPath/.test(m.call(b.createElementNS(r.svg,"clipPath")))};for(var M in s)C(s,M)&&(x=M.toLowerCase(),e[x]=s[M](),v.push((e[x]?"":"no-")+x));return e.input||L(),e.addTest=function(a,b){if(typeof a=="object")for(var d in a)C(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,g.className+=" "+(b?"":"no-")+a,e[a]=b}return e},D(""),i=k=null,e._version=d,e._prefixes=n,e._domPrefixes=q,e._cssomPrefixes=p,e.mq=z,e.hasEvent=A,e.testProp=function(a){return H([a])},e.testAllProps=J,e.testStyles=y,e.prefixed=function(a,b,c){return b?J(a,b,c):J(a,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+v.join(" "):""),e}(this,this.document),function(a,b){function g(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function h(){var a=k.elements;return typeof a=="string"?a.split(" "):a}function i(a){var b={},c=a.createElement,e=a.createDocumentFragment,f=e();a.createElement=function(a){var e=(b[a]||(b[a]=c(a))).cloneNode();return k.shivMethods&&e.canHaveChildren&&!d.test(a)?f.appendChild(e):e},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+h().join().replace(/\w+/g,function(a){return b[a]=c(a),f.createElement(a),'c("'+a+'")'})+");return n}")(k,f)}function j(a){var b;return a.documentShived?a:(k.shivCSS&&!e&&(b=!!g(a,"article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}audio{display:none}canvas,video{display:inline-block;*display:inline;*zoom:1}[hidden]{display:none}audio[controls]{display:inline-block;*display:inline;*zoom:1}mark{background:#FF0;color:#000}")),f||(b=!i(a)),b&&(a.documentShived=b),a)}function o(a){var b,c=a.getElementsByTagName("*"),d=c.length,e=RegExp("^(?:"+h().join("|")+")$","i"),f=[];while(d--)b=c[d],e.test(b.nodeName)&&f.push(b.applyElement(p(b)));return f}function p(a){var b,c=a.attributes,d=c.length,e=a.ownerDocument.createElement(m+":"+a.nodeName);while(d--)b=c[d],b.specified&&e.setAttribute(b.nodeName,b.nodeValue);return e.style.cssText=a.style.cssText,e}function q(a){var b,c=a.split("{"),d=c.length,e=RegExp("(^|[\\s,>+~])("+h().join("|")+")(?=[[\\s,>+~#.:]|$)","gi"),f="$1"+m+"\\:$2";while(d--)b=c[d]=c[d].split("}"),b[b.length-1]=b[b.length-1].replace(e,f),c[d]=b.join("}");return c.join("{")}function r(a){var b=a.length;while(b--)a[b].removeNode()}function s(a){var b,c,d=a.namespaces,e=a.parentWindow;return!n||a.printShived?a:(typeof d[m]=="undefined"&&d.add(m),e.attachEvent("onbeforeprint",function(){var d,e,f,h=a.styleSheets,i=[],j=h.length,k=Array(j);while(j--)k[j]=h[j];while(f=k.pop())if(!f.disabled&&l.test(f.media)){for(d=f.imports,j=0,e=d.length;j<e;j++)k.push(d[j]);try{i.push(f.cssText)}catch(m){}}i=q(i.reverse().join("")),c=o(a),b=g(a,i)}),e.attachEvent("onafterprint",function(){r(c),b.removeNode(!0)}),a.printShived=!0,a)}var c=a.html5||{},d=/^<|^(?:button|form|map|select|textarea)$/i,e,f;(function(){var a=b.createElement("a");a.innerHTML="<xyz></xyz>",e="hidden"in a,f=a.childNodes.length==1||function(){try{b.createElement("a")}catch(a){return!0}var c=b.createDocumentFragment();return typeof c.cloneNode=="undefined"||typeof c.createDocumentFragment=="undefined"||typeof c.createElement=="undefined"}()})();var k={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:j};a.html5=k,j(b);var l=/^$|\b(?:all|print)\b/,m="html5shiv",n=!f&&function(){var c=b.documentElement;return typeof b.namespaces!="undefined"&&typeof b.parentWindow!="undefined"&&typeof c.applyElement!="undefined"&&typeof c.removeNode!="undefined"&&typeof a.attachEvent!="undefined"}();k.type+=" print",k.shivPrint=s,s(b)}(this,document),function(a,b,c){function d(a){return o.call(a)=="[object Function]"}function e(a){return typeof a=="string"}function f(){}function g(a){return!a||a=="loaded"||a=="complete"||a=="uninitialized"}function h(){var a=p.shift();q=1,a?a.t?m(function(){(a.t=="c"?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){a!="img"&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l={},o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};y[c]===1&&(r=1,y[c]=[],l=b.createElement(a)),a=="object"?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),a!="img"&&(r||y[c]===2?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i(b=="c"?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),p.length==1&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&o.call(a.opera)=="[object Opera]",l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return o.call(a)=="[object Array]"},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,i){var j=b(a),l=j.autoCallback;j.url.split(".").pop().split("?").shift(),j.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]||h),j.instead?j.instead(a,e,f,g,i):(y[j.url]?j.noexec=!0:y[j.url]=1,f.load(j.url,j.forceCSS||!j.forceJS&&"css"==j.url.split(".").pop().split("?").shift()?"c":c,j.noexec,j.attrs,j.timeout),(d(e)||d(l))&&f.load(function(){k(),e&&e(j.origUrl,i,g),l&&l(j.origUrl,i,g),y[j.url]=2})))}function i(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var j,l,m=this.yepnope.loader;if(e(a))g(a,0,m,0);else if(w(a))for(j=0;j<a.length;j++)l=a[j],e(l)?g(l,0,m,0):w(l)?B(l):Object(l)===l&&i(l,m);else Object(a)===a&&i(a,m)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,b.readyState==null&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))},Modernizr.addTest("adownload","download"in document.createElement("a")),Modernizr.addTest("audiodata",!!window.Audio),Modernizr.addTest("webaudio",!!window.webkitAudioContext||!!window.AudioContext),Modernizr.addTest("battery",!!Modernizr.prefixed("battery",navigator)),function(){if(!Modernizr.canvas)return!1;var a=new Image,b=document.createElement("canvas"),c=b.getContext("2d");a.onload=function(){c.drawImage(a,0,0),Modernizr.addTest("todataurljpeg",function(){return b.toDataURL("image/jpeg").indexOf("data:image/jpeg")===0}),Modernizr.addTest("todataurlwebp",function(){return b.toDataURL("image/webp").indexOf("data:image/webp")===0})},a.src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAACklEQVR4nGMAAQAABQABDQottAAAAABJRU5ErkJggg=="}(),Modernizr.addTest("lowbattery",function(){var a=.2,b=Modernizr.prefixed("battery",navigator);return!!(b&&!b.charging&&b.level<=a)}),Modernizr.addTest("contenteditable","isContentEditable"in document.documentElement),Modernizr.addTest("contextmenu","contextMenu"in document.body&&"HTMLMenuItemElement"in window),Modernizr.addTest("cookies",function(){if(navigator.cookieEnabled)return!0;document.cookie="cookietest=1";var a=document.cookie.indexOf("cookietest=")!=-1;return document.cookie="cookietest=1; expires=Thu, 01-Jan-1970 00:00:01 GMT",a}),Modernizr.addTest("cors","withCredentials"in new XMLHttpRequest),Modernizr.addTest("backgroundcliptext",function(){var a=document.createElement("div");return a.style.cssText=Modernizr._prefixes.join("background-clip:text;"),!!a.style.cssText.replace(/\s/g,"").length}),function(){function a(a){return window.getComputedStyle?getComputedStyle(a,null).getPropertyValue("background"):a.currentStyle.background}Modernizr.testStyles(" #modernizr { background-repeat: round; } ",function(b,c){Modernizr.addTest("bgrepeatround",a(b)=="round")}),Modernizr.testStyles(" #modernizr { background-repeat: space; } ",function(b,c){Modernizr.addTest("bgrepeatspace",a(b)=="space")})}(),Modernizr.addTest("boxsizing",function(){return Modernizr.testAllProps("boxSizing")&&(document.documentMode===undefined||document.documentMode>7)}),Modernizr.testStyles(" #modernizr { background-size: cover; } ",function(a,b){var c=(window.getComputedStyle?getComputedStyle(a,null):a.currentStyle)["background-size"]=="cover";Modernizr.addTest("bgsizecover",c)}),Modernizr.addTest("cubicbezierrange",function(){return el=document.createElement("div"),el.style.cssText=Modernizr._prefixes.join("transition-timing-function:cubic-bezier(1,0,0,1.1); "),!!el.style.length}),Modernizr.testStyles(" #modernizr { display: run-in; } ",function(a,b){var c=window.getComputedStyle?getComputedStyle(a,null).getPropertyValue("display"):a.currentStyle.display;Modernizr.addTest("display-runin",c=="run-in")}),Modernizr.addTest("display-table",function(){var a=window.document,b=a.documentElement,c=a.createElement("div"),d=a.createElement("div"),e=a.createElement("div"),f;return c.style.cssText="display: table",d.style.cssText=e.style.cssText="display: table-cell; padding: 10px",c.appendChild(d),c.appendChild(e),b.insertBefore(c,b.firstChild),f=d.offsetLeft<e.offsetLeft,b.removeChild(c),f}),function(){function a(){try{var a=document.createElement("div"),b=document.createElement("span"),c=a.style,d=0,e=0,f=!1,g=!1,h=!1,i=document.body.firstElementChild||document.body.firstChild;return a.appendChild(b),b.innerHTML="Bacon ipsum dolor sit amet jerky velit in culpa hamburger et. Laborum dolor proident, enim dolore duis commodo et strip steak. Salami anim et, veniam consectetur dolore qui tenderloin jowl velit sirloin. Et ad culpa, fatback cillum jowl ball tip ham hock nulla short ribs pariatur aute. Pig pancetta ham bresaola, ut boudin nostrud commodo flank esse cow tongue culpa. Pork belly bresaola enim pig, ea consectetur nisi. Fugiat officia turkey, ea cow jowl pariatur ullamco proident do laborum velit sausage. Magna biltong sint tri-tip commodo sed bacon, esse proident aliquip. Ullamco ham sint fugiat, velit in enim sed mollit nulla cow ut adipisicing nostrud consectetur. Proident dolore beef ribs, laborum nostrud meatball ea laboris rump cupidatat labore culpa. Shankle minim beef, velit sint cupidatat fugiat tenderloin pig et ball tip. Ut cow fatback salami, bacon ball tip et in shank strip steak bresaola. In ut pork belly sed mollit tri-tip magna culpa veniam, short ribs qui in andouille ham consequat. Dolore bacon t-bone, velit short ribs enim strip steak nulla. Voluptate labore ut, biltong swine irure jerky. Cupidatat excepteur aliquip salami dolore. Ball tip strip steak in pork dolor. Ad in esse biltong. Dolore tenderloin exercitation ad pork loin t-bone, dolore in chicken ball tip qui pig. Ut culpa tongue, sint ribeye dolore ex shank voluptate hamburger. Jowl et tempor, boudin pork chop labore ham hock drumstick consectetur tri-tip elit swine meatball chicken ground round. Proident shankle mollit dolore. Shoulder ut duis t-bone quis reprehenderit. Meatloaf dolore minim strip steak, laboris ea aute bacon beef ribs elit shank in veniam drumstick qui. Ex laboris meatball cow tongue pork belly. Ea ball tip reprehenderit pig, sed fatback boudin dolore flank aliquip laboris eu quis. Beef ribs duis beef, cow corned beef adipisicing commodo nisi deserunt exercitation. Cillum dolor t-bone spare ribs, ham hock est sirloin. Brisket irure meatloaf in, boudin pork belly sirloin ball tip. Sirloin sint irure nisi nostrud aliqua. Nostrud nulla aute, enim officia culpa ham hock. Aliqua reprehenderit dolore sunt nostrud sausage, ea boudin pork loin ut t-bone ham tempor. Tri-tip et pancetta drumstick laborum. Ham hock magna do nostrud in proident. Ex ground round fatback, venison non ribeye in.",document.body.insertBefore(a,i),c.cssText="position:absolute;top:0;left:0;width:5em;text-align:justify;text-justification:newspaper;",d=b.offsetHeight,e=b.offsetWidth,c.cssText="position:absolute;top:0;left:0;width:5em;text-align:justify;text-justification:newspaper;"+Modernizr._prefixes.join("hyphens:auto; "),f=b.offsetHeight!=d||b.offsetWidth!=e,document.body.removeChild(a),a.removeChild(b),f}catch(j){return!1}}function b(a,b){try{var c=document.createElement("div"),d=document.createElement("span"),e=c.style,f=0,g=!1,h=!1,i=!1,j=document.body.firstElementChild||document.body.firstChild;return e.cssText="position:absolute;top:0;left:0;overflow:visible;width:1.25em;",c.appendChild(d),document.body.insertBefore(c,j),d.innerHTML="mm",f=d.offsetHeight,d.innerHTML="m"+a+"m",h=d.offsetHeight>f,b?(d.innerHTML="m<br />m",f=d.offsetWidth,d.innerHTML="m"+a+"m",i=d.offsetWidth>f):i=!0,h===!0&&i===!0&&(g=!0),document.body.removeChild(c),c.removeChild(d),g}catch(k){return!1}}function c(a){try{var b=document.createElement("input"),c=document.createElement("div"),d="lebowski",e=!1,f,g=document.body.firstElementChild||document.body.firstChild;c.innerHTML=d+a+d,document.body.insertBefore(c,g),document.body.insertBefore(b,g),b.setSelectionRange?(b.focus(),b.setSelectionRange(0,0)):b.createTextRange&&(f=b.createTextRange(),f.collapse(!0),f.moveEnd("character",0),f.moveStart("character",0),f.select());if(window.find)e=window.find(d+d);else try{f=self.document.body.createTextRange(),e=f.findText(d+d)}catch(h){e=!1}return document.body.removeChild(c),document.body.removeChild(b),e}catch(h){return!1}}if(!document.body){window.console&&console.warn("document.body doesn't exist. Modernizr hyphens test needs it.");return}Modernizr.addTest("csshyphens",function(){if(!Modernizr.testAllProps("hyphens"))return!1;try{return a()}catch(b){return!1}}),Modernizr.addTest("softhyphens",function(){try{return b("&#173;",!0)&&b("&#8203;",!1)}catch(a){return!1}}),Modernizr.addTest("softhyphensfind",function(){try{return c("&#173;")&&c("&#8203;")}catch(a){return!1}})}(),Modernizr.addTest("cssmask",Modernizr.testAllProps("mask")),Modernizr.addTest("mediaqueries",Modernizr.mq("only all")),Modernizr.addTest("pointerevents",function(){var a=document.createElement("x"),b=document.documentElement,c=window.getComputedStyle,d;return"pointerEvents"in a.style?(a.style.pointerEvents="auto",a.style.pointerEvents="x",b.appendChild(a),d=c&&c(a,"").pointerEvents==="auto",b.removeChild(a),!!d):!1}),Modernizr.addTest("overflowscrolling",function(){return Modernizr.testAllProps("overflowScrolling")}),Modernizr.addTest("cssremunit",function(){var a=document.createElement("div");try{a.style.fontSize="3rem"}catch(b){}return/rem/.test(a.style.fontSize)}),Modernizr.addTest("cssresize",Modernizr.testAllProps("resize")),Modernizr.addTest("cssscrollbar",function(){var a,b="#modernizr{overflow: scroll; width: 40px }#"+Modernizr._prefixes.join("scrollbar{width:0px} #modernizr::").split("#").slice(1).join("#")+"scrollbar{width:0px}";return Modernizr.testStyles(b,function(b){a="scrollWidth"in b&&b.scrollWidth==40}),a}),Modernizr.addTest("userselect",function(){return Modernizr.testAllProps("user-select")}),Modernizr.addTest("customprotocolhandler",function(){return!!navigator.registerProtocolHandler}),Modernizr.addTest("dataview",typeof DataView!="undefined"&&"getFloat64"in DataView.prototype),Modernizr.addTest("classlist","classList"in document.documentElement),Modernizr.addTest("createelement-attrs",function(){try{return document.createElement("<input name='test' />").getAttribute("name")=="test"}catch(a){return!1}}),Modernizr.addTest("dataset",function(){var a=document.createElement("div");return a.setAttribute("data-a-b","c"),!!a.dataset&&a.dataset.aB==="c"}),Modernizr.addTest("microdata",!!document.getItems),Modernizr.addTest("datalistelem",Modernizr.input.list),Modernizr.addTest("details",function(){var a=document,b=a.createElement("details"),c,d,e;return"open"in b?(d=a.body||function(){var b=a.documentElement;return c=!0,b.insertBefore(a.createElement("body"),b.firstElementChild||b.firstChild)}(),b.innerHTML="<summary>a</summary>b",b.style.display="block",d.appendChild(b),e=b.offsetHeight,b.open=!0,e=e!=b.offsetHeight,d.removeChild(b),c&&d.parentNode.removeChild(d),e):!1}),Modernizr.addTest("outputelem","value"in document.createElement("output")),Modernizr.addTest("progressbar",function(){return document.createElement("progress").max!=undefined}),Modernizr.addTest("meter",function(){return document.createElement("meter").max!=undefined}),Modernizr.addTest("ruby",function(){function g(a,b){var c;return window.getComputedStyle?c=document.defaultView.getComputedStyle(a,null).getPropertyValue(b):a.currentStyle&&(c=a.currentStyle[b]),c}function h(){d.removeChild(a),a=null,b=null,c=null}var a=document.createElement("ruby"),b=document.createElement("rt"),c=document.createElement("rp"),d=document.documentElement,e="display",f="fontSize";return a.appendChild(c),a.appendChild(b),d.appendChild(a),g(c,e)=="none"||g(a,e)=="ruby"&&g(b,e)=="ruby-text"||g(c,f)=="6pt"&&g(b,f)=="6pt"?(h(),!0):(h(),!1)}),Modernizr.addTest("track",typeof document.createElement("video").addTextTrack=="function"),Modernizr.addTest("time","valueAsDate"in document.createElement("time")),Modernizr.addTest("emoji",function(){if(!Modernizr.canvastext)return!1;var a=document.createElement("canvas"),b=a.getContext("2d");return b.textBaseline="top",b.font="32px Arial",b.fillText("😃",0,0),b.getImageData(16,16,1,1).data[0]!=0}),Modernizr.addTest("strictmode",function(){return function(){return"use strict",!this}()}),Modernizr.addTest("devicemotion","DeviceMotionEvent"in window),Modernizr.addTest("deviceorientation","DeviceOrientationEvent"in window),Modernizr.addTest("filereader",function(){return!!(window.File&&window.FileList&&window.FileReader)}),Modernizr.addTest("filesystem",function(){var a=Modernizr._domPrefixes;for(var b=-1,c=a.length;++b<c;)if(window[a[b]+"RequestFileSystem"])return!0;return"requestFileSystem"in window}),Modernizr.addTest("placeholder",function(){return"placeholder"in(Modernizr.input||document.createElement("input"))&&"placeholder"in(Modernizr.textarea||document.createElement("textarea"))}),Modernizr.addTest("speechinput",function(){var a=document.createElement("input");return"speech"in a||"onwebkitspeechchange"in a}),function(a,b){b.formvalidationapi=!1,b.formvalidationmessage=!1,b.buggyinteractivevalidation=!1,b.addTest("formvalidation",function(){var c=a.createElement("form");if("checkValidity"in c){var d=a.body,e=a.documentElement,f=!1,g=!1,h;return b.formvalidationapi=!0,c.onsubmit=function(a){window.opera||a.preventDefault(),a.stopPropagation(),b.buggyinteractivevalidation=!0},c.innerHTML='<input name="modTest" required><button></button>',c.style.position="absolute",c.style.top="-99999em",d||(f=!0,d=a.createElement("body"),d.style.background="",e.appendChild(d)),d.appendChild(c),h=c.getElementsByTagName("input")[0],h.oninvalid=function(a){g=!0,a.preventDefault(),a.stopPropagation()},b.formvalidationmessage=!!h.validationMessage,c.getElementsByTagName("button")[0].click(),d.removeChild(c),f&&e.removeChild(d),g}return!1})}(document,window.Modernizr),Modernizr.addTest("fullscreen",function(){for(var a=0;a<Modernizr._domPrefixes.length;a++)if(document[Modernizr._domPrefixes[a].toLowerCase()+"CancelFullScreen"])return!0;return!!document.cancelFullScreen||!1}),Modernizr.addTest("gamepad","gamepads"in navigator),Modernizr.addTest("getusermedia","getUserMedia"in navigator),Modernizr.addTest("ie8compat",function(){return!window.addEventListener&&document.documentMode&&document.documentMode===7}),function(){if(!Modernizr.canvas)return!1;var a=new Image,b=document.createElement("canvas"),c=b.getContext("2d");a.onload=function(){Modernizr.addTest("apng",function(){return typeof b.getContext=="undefined"?!1:(c.drawImage(a,0,0),c.getImageData(0,0,1,1).data[3]===0)})},a.src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAACGFjVEwAAAABAAAAAcMq2TYAAAANSURBVAiZY2BgYPgPAAEEAQB9ssjfAAAAGmZjVEwAAAAAAAAAAQAAAAEAAAAAAAAAAAD6A+gBAbNU+2sAAAARZmRBVAAAAAEImWNgYGBgAAAABQAB6MzFdgAAAABJRU5ErkJggg=="}(),function(){var a=new Image;a.onerror=function(){Modernizr.addTest("webp",!1)},a.onload=function(){Modernizr.addTest("webp",function(){return a.width==1})},a.src="data:image/webp;base64,UklGRiwAAABXRUJQVlA4ICAAAAAUAgCdASoBAAEAL/3+/3+CAB/AAAFzrNsAAP5QAAAAAA=="}(),Modernizr.addTest("json",!!window.JSON&&!!JSON.parse),Modernizr.addTest("olreversed","reversed"in document.createElement("ol")),Modernizr.addTest("mathml",function(){var a=!1;if(document.createElementNS){var b="http://www.w3.org/1998/Math/MathML",c=document.createElement("div");c.style.position="absolute";var d=c.appendChild(document.createElementNS(b,"math")).appendChild(document.createElementNS(b,"mfrac"));d.appendChild(document.createElementNS(b,"mi")).appendChild(document.createTextNode("xx")),d.appendChild(document.createElementNS(b,"mi")).appendChild(document.createTextNode("yy")),document.body.appendChild(c),a=c.offsetHeight>c.offsetWidth}return a}),Modernizr.addTest("lowbandwidth",function(){var a=navigator.connection||{type:0};return a.type==3||a.type==4||/^[23]g$/.test(a.type)}),Modernizr.addTest("eventsource",!!window.EventSource),Modernizr.addTest("notification",!!Modernizr.prefixed("Notifications",window)),Modernizr.addTest("performance",!!Modernizr.prefixed("performance",window)),Modernizr.addTest("quotamanagement",function(){var a=Modernizr.prefixed("StorageInfo",window);return!!(a&&"TEMPORARY"in a&&"PERSISTENT"in a)}),Modernizr.addTest("raf",!!Modernizr.prefixed("requestAnimationFrame",window)),Modernizr.addTest("scriptasync","async"in document.createElement("script")),Modernizr.addTest("unicode",function(){var a,b=document.createElement("span"),c=document.createElement("span");return Modernizr.testStyles("#modernizr{font-family:Arial,sans;font-size:300em;}",function(d){b.innerHTML="&#5987",c.innerHTML="&#9734",d.appendChild(b),d.appendChild(c),a="offsetWidth"in b&&b.offsetWidth!==c.offsetWidth}),a}),function(){var a=new Image;a.onerror=function(){Modernizr.addTest("datauri",function(){return!1})},a.onload=function(){Modernizr.addTest("datauri",function(){return a.width==1&&a.height==1})},a.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="}(),Modernizr.addTest("scriptdefer","defer"in document.createElement("script")),Modernizr.addTest("userdata",function(){return!!document.createElement("div").addBehavior}),Modernizr.addTest("webintents",function(){return!!navigator.startActivity}),function(){if(!Modernizr.webgl)return;var a,b,c;try{a=document.createElement("canvas"),b=a.getContext("webgl")||a.getContext("experimental-webgl"),c=b.getSupportedExtensions()}catch(d){return}b===undefined?Modernizr.webgl=new Boolean(!1):Modernizr.webgl=new Boolean(!0);for(var e=-1,f=c.length;++
e<f;)Modernizr.webgl[c[e]]=!0;window.TEST&&TEST.audvid&&TEST.audvid.push("webgl"),a=undefined}(),Modernizr.addTest("websocketsbinary",!!window.WebSocket&&!!(new WebSocket("ws://.")).binaryType),function(){try{var a=window.MozBlobBuilder||window.WebKitBlobBuilder||window.MSBlobBuilder||window.OBlobBuilder||window.BlobBuilder,b=window.MozURL||window.webkitURL||window.MSURL||window.OURL||window.URL,c="Modernizr",d=new a;d.append("this.onmessage=function(e){postMessage(e.data)}");var e=b.createObjectURL(d.getBlob());worker=new Worker(e),d=null,worker.onmessage=function(a){worker.terminate(),b.revokeObjectURL(e),Modernizr.addTest("blobworkers",c===a.data),worker=null},worker.onerror=function(){Modernizr.addTest("blobworkers",!1),worker=null},setTimeout(function(){Modernizr.addTest("blobworkers",!1)},200),worker.postMessage(c)}catch(f){Modernizr.addTest("blobworkers",!1)}}(),Modernizr.addTest("framed",function(){return window.location!=top.location}),function(){try{var a="Modernizr",b=new Worker("data:text/javascript;base64,dGhpcy5vbm1lc3NhZ2U9ZnVuY3Rpb24oZSl7cG9zdE1lc3NhZ2UoZS5kYXRhKX0=");b.onmessage=function(c){b.terminate(),Modernizr.addTest("dataworkers",a===c.data),b=null},b.onerror=function(){Modernizr.addTest("dataworkers",!1),b=null},setTimeout(function(){Modernizr.addTest("dataworkers",!1)},200),b.postMessage(a)}catch(c){Modernizr.addTest("dataworkers",!1)}}(),Modernizr.addTest("sharedworkers",function(){return!!window.SharedWorker});